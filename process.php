<?php
session_start();
session_regenerate_id(TRUE);
$mysqli = new mysqli("localhost", "root", "", "webtransform") or die();


if (isset($_POST['username'])) {
	$_SESSION['username'] = $mysqli -> real_escape_string(trim($_POST['username']));
	$username = $_SESSION['username'];
	if (isset($_POST['password'])) {
		$_SESSION['password'] = trim(hash('sha256', $_POST['password']));
		$password = $_SESSION['password'];
		if (isset($_POST['email'])) {
			$_SESSION['email'] = $mysqli -> real_escape_string(trim($_POST['email']));
			$email = $_SESSION['email'];
			if (isset($_POST['role'])) {
				$_SESSION['role'] = $mysqli -> real_escape_string(trim($_POST['role']));
				$role = $_SESSION['role'];
				$_SESSION['token1'] = md5(mt_rand(1, 10000));
				$token1 = $_SESSION['token1'];
				$_SESSION['token2' ] = md5(mt_rand(1, 10000));
				$token2 = $_SESSION['token2'];
				
				echo "Welcome, {$username}! \r\n 
					You recently created an account on our site.  Please click the following link to confirm this action: \r\n
					<a href='http://localhost/webTransform/process.php?token1={$token1}&token2={$token2}'>Confirm</a>";
				/*mail($email, 'Confirm New Account',
				 "Welcome, {$username} \n
				 
				 You recently created an account on our site.  Please click the following link to confirm this action:\n\n
				 
				 <a href='http://localhost/webTransform/process.php?token1={$token1}&token2={$token2}'>Confirm</a>");
				echo "An email was sent to your email account.  Please open the email and confirm to finish creating your account.";*/
			}
		}
	}
}


if(isset($_GET['token1']) && isset($_GET['token2'])){
	if(isset($_SESSION['token1']) && isset($_SESSION['token2'])){
		if($_GET['token1'] == $_SESSION['token1'] && $_GET['token2'] == $_SESSION['token2']){
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			$email = $_SESSION['email'];
			$role = $_SESSION['role'];
			$query = "INSERT INTO `webtransform`.`users` (`userID`, `username`, `password`, `email`, `role`) VALUES (NULL, '{$username}', '{$password}', '$email', '{$role}')";
			echo $query;
			$mysqli -> query($query);
		}
	}
}

$mysqli -> close();
?>