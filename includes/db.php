<?php
class DB{
	protected $mysqli;
	private $dbHost="localhost";
	private $dbUserName="root";
	private $dbPassword="";//Wzjn32PALeFmrfbV
	private $dbDatabase="football";
	
	public function __construct(){
		$this->mysqli = new mysqli($this->dbHost, $this->dbUserName, $this->dbPassword, $this->dbDatabase) or die($this->mysqli->error);
		return $this->mysqli;
	}
	
	public function query($query){
		return $this->mysqli->query($query);
	}
	
	public function realEscapeString($string){
		return $this->mysqli->real_escape_string();
	}
	
	function __destruct(){
		//close the connection
		$this->mysqli->close();
	}
	
	function getLink(){
		return $this->mysqli;
	}
}
//$mysqli = new mysqli("localhost", "root", "Wzjn32PALeFmrfbV", "football") or die(mysqli_error());
?>