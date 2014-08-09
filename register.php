<?php
require_once ("includes/db.php");
require_once ("includes/header.php");
?>
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container" style="margin-top: 100px">

	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-4">
			<form role="form" id="registerForm">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Enter username">
				</div>
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
						Remember me at signin</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox">
						Send me occasional news and offers</label>
				</div>
				<button type="submit" class="btn btn-primary">
					Register
				</button>
			</form>
		</div>
		<div class="col-lg-8">
			<h3>What can you do with a Football Stats Tracker account?</h3>
			<p>

    <a class="btn btn-default" role="button" href="index.php">

        Learn more »

    </a>

</p>
		</div>
	</div>
		
		
<br />
<?php
require_once ("includes/footer.php");
?>