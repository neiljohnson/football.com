<?php
  class EDatabaseException extends Exception {};
  class ENoDatabaseConnection extends EDatabaseException {};
  class EDuplicateKey extends EDatabaseException {};

  interface DFData
  {
    function Close();
    function StartTransaction();
    function CommitTransaction();
    function RollbackTransaction();

    function FetchRow($sql);
    function FetchRowAssoc($sql);
    function FetchSingleObj($sql);
    function FetchObj($sql);
    function FetchClass($sql, $className);
    function FetchSingleClass($sql, $className);
    function ExecuteSQL($sql);

    function GetConnectionObject();

    function Reset();
  }

  abstract class DF_DataObject implements DFData
  {
    protected $LastSQL = null;
    protected $Query = null;

    protected abstract function __construct($host, $database, $user, $password);

    public static function PDOInstance($username, $password, $database, $servername = 'localhost')
    {
      return new DF_PDO($servername, $database, $username, $password);
    }

    public static function MySQLiInstance($username, $password, $database, $servername = 'localhost')
    {
      return new DF_MySQLi($servername, $database, $username, $password);
    }
  }

  class DF_PDO extends DF_DataObject
  {
    private $PDO;
    private $ParamTypes = array("i" => PDO::PARAM_INT, "d" => PDO::PARAM_STR, "s" => PDO::PARAM_STR, "b" => PDO::PARAM_LOB);

    public function GetConnectionObject()
    {
      return $this->PDO;
    }

    public function Close()
    {
      unset($this->Query);
    }

    public function Reset()
    {
      $this->Query = null;
      $this->LastSQL = '';
    }

    public function __destruct()
    {
      $this->Query = null;
    }

    protected function __construct($host, $database, $user, $password)
    {
      define('ERROR_DUPLICATE_KEY', 23000);

      $this->PDO = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
      $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->PDO->exec('SET NAMES \'utf8\' COLLATE \'utf8_unicode_ci\'');
    }

    public function StartTransaction()
    {
      $this->Query = null;
      $this->PDO->beginTransaction();
    }

    public function CommitTransaction()
    {
      $this->Query = null;
      $this->PDO->commit();
    }

    public function RollbackTransaction()
    {
      $this->Query = null;
      $this->PDO->rollBack();
    }

    private function BindParams($args)
    {
      if (count($args) > 1)
      {
        $types = str_split(array_shift($args));
        if (count($types) !== count($args))
          throw new EDatabaseException("Number of parameters does not equal number of parameter types");

        for ($paramIndex = 0; $paramIndex < count($args); $paramIndex++)
          $this->Query->bindParam(1 + $paramIndex, $args[$paramIndex], $this->ParamTypes[$types[$paramIndex]]);
      }
    }

    public function FetchObj($sql)
    {
      if (!isset($this->Query) || ($this->LastSQL != $sql))
      {
        $this->Query = null;
        $this->LastSQL = $sql;
        $this->Query = $this->PDO->prepare($sql);
        $args = func_get_args();
        array_shift($args);
        $this->BindParams($args);
        $this->Query->execute();
      }

      $obj = $this->Query->fetch(PDO::FETCH_OBJ);
      if ($obj === false)
        $this->Query = null;

      return $obj;
    }

    public function FetchClass($sql, $className)
    {
      if (!isset($this->Query) || ($this->LastSQL != $sql))
      {
        $this->Query = null;
        $this->LastSQL = $sql;
        $this->Query = $this->PDO->prepare($sql);
        $args = func_get_args();
        array_shift($args); // pop "$sql" from the start of the list
        array_shift($args);  // pop "$className" from the start of the list
        $this->BindParams($args);
        $this->Query->execute();
        $this->Query->setFetchMode(PDO::FETCH_CLASS, $className);
      }

      $obj = $this->Query->fetch();
      if ($obj === false)
        $this->Query = null;

      return $obj;
    }

    public function FetchSingleClass($sql, $className)
    {
      $this->Query = null;
      $this->Query = $this->PDO->prepare($sql);
      $args = func_get_args();
      array_shift($args); // pop "$sql" from the start of the list
      array_shift($args);  // pop "$className" from the start of the list
      $this->BindParams($args);
      $this->Query->execute();
      $this->Query->setFetchMode(PDO::FETCH_CLASS, $className);
      return $this->Query->fetch();
    }

    public function FetchRow($sql)
    {
      $this->Query = null;
      $this->Query = $this->PDO->prepare($sql);
      $args = func_get_args();
      array_shift($args);
      $this->BindParams($args);
      $this->Query->execute();

      $result = $this->Query->fetch(PDO::FETCH_NUM);
      return (count($result) == 1)?$result[0]:$result;
    }

    public function FetchRowAssoc($sql)
    {
      $this->Query = null;
      $this->Query = $this->prepare($sql);
      $args = func_get_args();
      array_shift($args);
      $this->BindParams($args);
      $this->Query->execute();
      return $this->Query->fetch(PDO::FETCH_ASSOC);
    }

    public function FetchSingleObj($sql)
    {
      $this->Query = null;
      $this->Query = $this->PDO->prepare($sql);
      $args = func_get_args();
      array_shift($args);
      $this->BindParams($args);
      $this->Query->execute();
      return $this->Query->fetch(PDO::FETCH_OBJ);
    }

    public function ExecuteSQL($sql)
    {
      if (!isset($this->Query) || ($this->LastSQL != $sql))
      {
        $this->Query = null;
        $this->LastSQL = $sql;
        $this->Query = $this->PDO->prepare($sql);
      }

      $args = func_get_args();
      array_shift($args);
      $this->BindParams($args);
      try
      {
        $this->Query->execute();
      }
      catch (PDOException $e)
      {
        if ($e->getCode() == ERROR_DUPLICATE_KEY)
          throw new EDuplicateKey($e->getMessage());
        else
          throw $e;
      }

      return ($this->PDO->lastInsertId() > 0)?$this->PDO->lastInsertId():null;
    }
  }

  class DF_MySQLi extends DF_DataObject
  {
    private $MySQLi;
    private $Fields;

    public function GetConnectionObject()
    {
      return $this->MySQLi;
    }

    public function Close()
    {
      $this->CleanUp();
      $this->MySQLi->close();
    }

    public function Reset()
    {
      $this->CleanUp();
    }

    public function StartTransaction()
    {
      $this->CleanUp();
      $this->MySQLi->query('SET autocommit=0');
      $this->MySQLi->query('START TRANSACTION');
    }

    public function CommitTransaction()
    {
      $this->CleanUp();
      $this->MySQLi->query('COMMIT;');
      $this->MySQLi->query('SET autocommit=1;');
    }

    public function RollbackTransaction()
    {
      $this->CleanUp();
      $this->MySQLi->query('ROLLBACK;');
      $this->MySQLi->query('SET autocommit=1;');
    }

    public function prepare($sql)
    {
       if (!$Query = parent::prepare($sql))
        throw new EDatabaseException($this->error);
      return $Query;
    }

    private function LoadFieldInfo($ResultSet)
    {
      $metadata = $ResultSet->result_metadata();
      $fields = $metadata->fetch_fields();
      $metadata->close();
      return $fields;
    }

    protected function __construct($servername, $database, $username, $password)
    {
      define('ERROR_DUPLICATE_KEY', 1062);

      $this->MySQLi = new mysqli($servername, $username, $password, $database);
      if (mysqli_connect_errno())
        throw new EDatabaseException('Unable to connect to the database');

      $this->MySQLi->query('SET NAMES \'utf8\' COLLATE \'utf8_unicode_ci\'');
    }

    public function ExecuteSQL($sql, $paramtypes = null)
    {
      if (!isset($this->Query) || !$this->Query || ($sql != $this->LastSQL))
      {
        $this->CleanUp();
        $this->LastSQL = $sql;
        if (!$this->Query = $this->MySQLi->Prepare($sql))
          throw new EDatabaseException($this->MySQLi->error);
      }


      if (isset($paramtypes))
      {
        $params = array(0 => $paramtypes);
        $paramcount = func_num_args();
        for ($i = 2; $i < $paramcount; $i++)
          $params[] = func_get_arg($i);

        if (!call_user_func_array(array($this->Query, 'bind_param'), $params))
          throw new EDatabaseException('Bind parameters failed');
      }
      $this->Query->execute();
      if ($this->MySQLi->errno != 0)
      {
        if ($this->MySQLi->errno == ERROR_DUPLICATE_KEY)
          throw new EDuplicateKey($this->MySQLi->error);
        else
          throw new EDatabaseException($this->MySQLi->error);
      }

      $result = ($this->Query->insert_id > 0)?$this->Query->insert_id:null;
      return $result;
    }

    public function FetchRow($sql, $paramtypes = null)
    {
      $this->CleanUp();
      $vars = array();
      $bindparams = array();

      if (!$query = $this->MySQLi->prepare($sql))
        throw new EDatabaseException($this->MySQLi->error);

      if (isset($paramtypes))
      {
        $params = array(0 => $paramtypes);
        $paramcount = func_num_args();
        for ($i = 2; $i < $paramcount; $i++)
          $params[] = func_get_arg($i);

        if (!call_user_func_array(array($query, 'bind_param'), $params))
          throw new EDatabaseException('Bind parameters failed');
      }
      $query->execute();

      $query->store_result();

      if ($this->MySQLi->errno != 0) throw new EDatabaseException($this->MySQLi->error);
      $fields = $this->LoadFieldInfo($query);

      foreach ($fields as $idx => $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$idx] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      $result = array();
      $query->fetch();
      $query->free_result();
      $query->close();

      return (count($fields) === 1)?$bindparams[0]:$bindparams;
    }

    public function FetchRowAssoc($sql, $paramtypes = null)
    {
      $this->CleanUp();
      $vars = array();
      $bindparams = array();

      if ($query = $this->MySQLi->prepare($sql))
        throw new EDatabaseException($this->MySQLi->error);

      if (isset($paramtypes))
      {
        $params = array(0 => $paramtypes);
        $paramcount = func_num_args();
        for ($i = 2; $i < $paramcount; $i++)
          $params[] = func_get_arg($i);

        if (!call_user_func_array(array($query, 'bind_param'), $params))
          throw new EDatabaseException('Bind parameters failed');
      }
      $query->execute();

      $query->store_result();

      if ($this->errno != 0) throw new EDatabaseException($this->error);
      $fields = $this->LoadFieldInfo($query);

      foreach ($fields as $idx => $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$fieldname] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      $result = array();
      $query->fetch();
      $query->free_result();
      $query->close();

      return (count($fields) === 1)?reset($bindparams):$bindparams;
    }

    public function FetchObj($sql, $paramtypes = null)
    {
      if ($sql != $this->LastSQL)
      {
        $this->CleanUp();
        $this->LastSQL = $sql;
      }

      if (!isset($this->Query))
      {
        $vars = array();
        $bindparams = array();

        if (!$this->Query = $this->MySQLi->prepare($sql))
          throw new EDatabaseException($this->MySQLi->error);

        if (isset($paramtypes) && ($paramtypes != ''))
        {
          $params = array(0 => $paramtypes);
          $paramcount = func_num_args();
          for ($i = 2; $i < $paramcount; $i++)
            $params[] = func_get_arg($i);

          if (!call_user_func_array(array($this->Query, 'bind_param'), $params))
            throw new EDatabaseException('Bind parameters failed');
        }
        $this->Query->execute();
        if ($this->MySQLi->errno != 0) throw new EDatabaseException($this->MySQLi->error);
        $this->Fields = $this->LoadFieldInfo($this->Query);
      }

      $this->Query->store_result();

      foreach ($this->Fields as $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$fieldname] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($this->Query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      if ($this->Query->fetch() === true)
      {
        $obj = new StdClass();
        foreach ($this->Fields as $field)
        {
          $fieldname = $field->name;
          $obj->$fieldname = $vars[$fieldname];
        }
        return $obj;
      }
      else
      {
        $this->CleanUp();
        return false;
      }

      $this->CleanUp();
      return false;
    }

    public function FetchClass($sql, $className, $paramtypes = null)
    {
      if ($sql != $this->LastSQL)
      {
        $this->CleanUp();
        $this->LastSQL = $sql;
      }

      if (!isset($this->Query))
      {
        $vars = array();
        $bindparams = array();

        if (!$this->Query = $this->MySQLi->prepare($sql))
          throw new EDatabaseException($this->MySQLi->error);

        if (isset($paramtypes) && ($paramtypes != ''))
        {
          $params = array(0 => $paramtypes);
          $paramcount = func_num_args();
          for ($i = 3; $i < $paramcount; $i++)
            $params[] = func_get_arg($i);

          if (!call_user_func_array(array($this->Query, 'bind_param'), $params))
            throw new EDatabaseException('Bind parameters failed');
        }
        $this->Query->execute();
        if ($this->MySQLi->errno != 0) throw new EDatabaseException($this->MySQLi->error);
        $this->Fields = $this->LoadFieldInfo($this->Query);
      }

      $this->Query->store_result();

      foreach ($this->Fields as $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$fieldname] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($this->Query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      if ($this->Query->fetch() === true)
      {
        $obj = new $className();
        foreach ($this->Fields as $field)
        {
          $fieldname = $field->name;
          $obj->$fieldname = $vars[$fieldname];
        }
        return $obj;
      }
      else
      {
        $this->CleanUp();
        return false;
      }

      $this->CleanUp();
      return false;
    }

    public function FetchSingleObj($sql, $paramtypes = null)
    {
      $this->LastSQL = '';
      $this->CleanUp();
      $vars = array();
      $bindparams = array();
      if (!$this->Query = $this->MySQLi->prepare($sql))
        throw new EDatabaseException($this->MySQLi->error);

      if (isset($paramtypes) && ($paramtypes != ''))
      {
        $params = array(0 => $paramtypes);
        $paramcount = func_num_args();
        for ($i = 2; $i < $paramcount; $i++)
          $params[] = func_get_arg($i);

        if (!call_user_func_array(array($this->Query, 'bind_param'), $params))
          throw new EDatabaseException('Bind parameters failed');
      }
      $this->Query->execute();
      if ($this->MySQLi->errno != 0)
        throw new EDatabaseException($this->MySQLi->error);

      $this->Fields = $this->LoadFieldInfo($this->Query);

      foreach ($this->Fields as $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$fieldname] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($this->Query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      if ($this->Query->fetch() === true)
      {
        $obj = new StdClass();
        foreach ($this->Fields as $field)
        {
          $fieldname = $field->name;
          $obj->$fieldname = $vars[$fieldname];
        }
        return $obj;
      }
      else
      {
        $this->CleanUp();
        return false;
      }

      $this->CleanUp();
      return false;
    }

    public function FetchSingleClass($sql, $className, $paramtypes = null)
    {
      $this->LastSQL = '';
      $this->CleanUp();
      $vars = array();
      $bindparams = array();
      if (!$this->Query = $this->MySQLi->prepare($sql))
        throw new EDatabaseException($this->MySQLi->error);

      if (isset($paramtypes) && ($paramtypes != ""))
      {
        $params = array(0 => $paramtypes);
        $paramcount = func_num_args();
        for ($i = 3; $i < $paramcount; $i++)
          $params[] = func_get_arg($i);

        if (!call_user_func_array(array($this->Query, 'bind_param'), $params))
          throw new EDatabaseException('Bind parameters failed');
      }
      $this->Query->execute();
      if ($this->MySQLi->errno != 0)
        throw new EDatabaseException($this->MySQLi->error);

      $this->Fields = $this->LoadFieldInfo($this->Query);

      foreach ($this->Fields as $field)
      {
        $fieldname = $field->name;
        $vars[$fieldname] = null;
        $bindparams[$fieldname] =& $vars[$fieldname];
      }

      if (!call_user_func_array(array($this->Query, 'bind_result'), $bindparams))
        throw new EDatabaseException('Bind parameters failed');

      if ($this->Query->fetch() === true)
      {
        $obj = new $className();
        foreach ($this->Fields as $field)
        {
          $fieldname = $field->name;
          $obj->$fieldname = $vars[$fieldname];
        }
        return $obj;
      }
      else
      {
        $this->CleanUp();
        return false;
      }

      $this->CleanUp();
      return false;
    }

    private function CleanUp()
    {
      if (isset($this->Query) && ($this->Query instanceof mysqli_stmt))
      {

        $this->Query->free_result();
        $this->Query->close();
        unset($this->Query);
      }

      if (isset($this->Fields))
        unset($this->Fields);

      $this->LastQueryHash = null;
    }
  }

//  $db = DF_DataObject::PDOInstance(DB_USER, DB_PASSWORD, DB_NAME, DB_SERVER);
  $db = DF_DataObject::MySQLiInstance(DB_USER, DB_PASSWORD, DB_NAME, DB_SERVER);

?>
