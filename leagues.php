<?php
require_once ("includes/header.php");
?>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container" style="margin-top: 80px;">
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-4">
			<h2>Leagues</h2>
			<form role="form" id="leagueFilter">
				
				<div class="row">
					<div class="col-lg-12">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter League">
							<div class="input-group-btn">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									Filter <span class="caret"></span>
								</button>
								<ul class="dropdown-menu pull-right">
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
							
						</div><!-- /input-group -->
						<p class="help-block">Start typing the name of the league, then select "Filter."</p>
					</div><!-- /.col-lg-6 -->
				</div><!-- /.row -->
			</form>
			<!-- /.col-lg-4 -->
		</div><!-- /.row -->
		<div class="row" id="tableRow">
			
		</div>
		<?php
		require_once ("includes/footer.php");
		?>
