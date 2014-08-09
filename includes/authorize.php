<?php

$mysqli = new mysqli("localhost", "root", "Wzjn32PALeFmrfbV", "football") or die(mysqli_error());

if(isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != ""){
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];
	
	//encrypt password to compare to database
	$crypPassword = hash("sha256", $password);
	
	//verify username and password match database
	$query = "SELECT * FROM users WHERE username=?";
	
	if($stmt = $mysqli->prepare($query)){
		//bing parameters
		$stmt->bind_param("s", $username);
		
		//execute it
		$stmt->execute();
		
		//bind results
		$stmt->bind_result($result);
		
		//fetch the value
		$stmt->fetch();
		
		echo $result;
		
		$stmt->close();
	}
}

else{
	echo "Username and Password must not be empty.";
}

//close the connection when finshed
$mysqli->close();

?>