<?php
require_once ("includes/header.php");
//require_once ("includes/carousel.php");
?>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container" style="margin-top: 80px;">
	<div class="row">
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="downNum"><span class="glyphicon glyphicon-arrow-down"></span></span>
				<select class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="Poss"><span class="glyphicon glyphicon-user"></span></span>
				<select class="form-control">
					<option>Team 1</option>
					<option>Team 2</option>
				</select>
			</div><!-- /input-group -->
		</div>
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="ballOn"><img src="favicon.ico.png" width="14"/></span>
				<input type="text" class="form-control" placeholder="Ball On">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="toGo"><span class="glyphicon glyphicon-ok"></span></span>
				<input type="text" class="form-control" placeholder="To Go">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="startTime"><span class="glyphicon glyphicon-time"></span></span>
				<input type="text" class="form-control" placeholder="Start Time">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon" id="quarter"> 4 </span>
				<select class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>OT</option>
				</select>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
	</div>
	<hr />
	<div class="row">
		<div class="col-lg-6">
			<h3>Offense</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">

			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						Action <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">Separated link</a>
						</li>
					</ul>
				</div><!-- /btn-group -->
				<input type="text" class="form-control" placeholder="Player (Jersey # or Name)">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
		<div class="col-lg-3">
			<div class="input-group">
				<span class="input-group-addon"> <span class="glyphicon glyphicon-ok"></span> Yards </span>
				<input type="text" class="form-control" placeholder="Yards gained (or lost)">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->

	</div>
	<br />
	<div class="row">
		<div class="col-lg-4">
			<div class="input-group">

				<button class="btn btn-success">
					<span class="glyphicon glyphicon-plus"></span> Action
				</button>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-6">
			<h3>Defense</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">

			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						Action <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">Separated link</a>
						</li>
					</ul>
				</div><!-- /btn-group -->
				<input type="text" class="form-control" placeholder="Player">
			</div><!-- /input-group -->
		</div>
	</div>

	<?php
	require_once ("includes/footer.php");
	?>
	<!--/div-->
