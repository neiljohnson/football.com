<?php
/*require_once("includes/db.php");
 $_SESSION['isLoggedIn'] = false;
 if($_SESSION['isLoggedIn']  == false){
 header("Location: login.php");
 } */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="favicon.ico.png">

		<title>Football Stats Tracker</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
		<link href="css/boot-theme.mini.css" rel="stylesheet">
		<script src="js/jquery-ui-timepicker-addon.js"></script>
		

	</head>
	<!-- NAVBAR
	================================================== -->
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Football Stats Tracker</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<!--ul class="nav navbar-nav">
					<li>
						<a href="leagues.php"><span class="glyphicon glyphicon-home"></span> Leagues</a>
					</li>
					<li>
						<a href="conferences.php"><span class="glyphicon glyphicon-bullhorn"></span> Conferences</a>
					</li>
					<li>
						<a href="seasons.php"><span class="glyphicon glyphicon-calendar"></span> Seasons</a>
					</li>
					<li>
						<a href="games.php"><span class="glyphicon glyphicon-ok"></span> Games</a>
					</li>
					<li>
						<a href="teams.php"><span class="glyphicon glyphicon-user"></span> <span class="glyphicon glyphicon-user"></span> Teams</a>
					</li>
					<li>
						<a href="players.php"><span class="glyphicon glyphicon-user"></span> Players</a>
					</li>
					<li>
						<a href="downs.php"><span class="glyphicon glyphicon-book"></span> Downs</a>
					</li>
					<li>
						<a href="sheets.php"><span class="glyphicon glyphicon-pencil"></span> Football Sheets</a>
					</li>

				</ul-->
				<!--form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<!--button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form-->
				<ul class="nav navbar-nav navbar-left">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Account <b class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li>
								<a href="login.php">Login in</a>
							</li>
							<li>
								<a href="register.php">Register</a>
							</li>
							<li>
								<a href="#">Account settings</a>
							</li>
							<li>
								<a href="#">Switch user</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>