<?php
require_once ("includes/db.php");
require_once ("includes/header.php");
?>
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container" style="margin-top: 100px">

	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-4">
			<form id="loginForm" role="form">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
				
				<div class="checkbox">
					<label>
						<input type="checkbox">
						Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h3>Don't have an account?</h3>
			<p><a href="register.php">Register Now!</a></p>
		
		</div>
	</div>
		
		
<br />
<?php
require_once ("includes/footer.php");
?>