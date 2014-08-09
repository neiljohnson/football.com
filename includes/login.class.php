<?php
	require_once "db.php";
	
class Login{
	
	//string hash( string $algo, string $data [, bool $raw_output = false])
	//$algo name of selected hashing algorithm
	//$data message to be hashed
	//$raw_output when set to true, outputs raw binary data.  False outputs lowercase hexits
	private $_id;
	private $_username;
	private $_password;
	private $_encryptedPassword;
	
	private $_errors;
	private $_hasAccess;
	private $_isLoggedIn;
	
	public function __construct(){
		
	}
	
	public function isLoggedIn(){
		
	}
}

class User{
	public function __construct(DB $con){
		$this->mysqli = $con->getLink();
	}
	
	public function addUser($name, $username, $email, $pwd){
		$query = "";
		$res = $this->myslie->query($query);
		return $res;
	}
}

?>
