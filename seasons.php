<?php
require_once ("includes/header.php");
?>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container" style="">
	<div class="row">
		<div class="col-lg-3" id="filterDiv">

			<div class="panel-group" id="accordion">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#filters">Toggle Filters<span class="caret"></span></a></h4>
					</div>
					<div id="filters" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="">

								<form name="filterForm" role="form" id="filterForm">
									<div class="input-group">
										<div class="form-group">
											<span class="glyphicon glyphicon-home"> </span>
											<label class="radio-inline">
												<input type="radio" name="league" id="FCS" value="FCS" checked />
												FCS </label>
											<label class="radio-inline">
												<input type="radio" name="league" id="FBS" value="FBS" />
												FBS </label>
										</div>
										<div class="form-group">

											<select multiple="multiple" class="form-control" id="conferenceSelect" >
												<optgroup>
													<option>-Conference-</option>
												</optgroup>
												<option>Big Sky</option>
											</select>
										</div>
										<div class="form-group">
											<select multiple="multiple" name="seasonSelect" class="form-control" id="seasonSelect">
												<optgroup>
													<option>-Season Year-</option>
												</optgroup>
												<option>2013</option>
												<option>2014</option>
											</select>
										</div>
										<div class="form-group">
											<select multiple="multiple" class="form-control" id="gameSelect">
												<optgroup>
													<option>-Game (a @ h)-</option>
												</optgroup>
												<option>SUU @ Cal Poly</option>
											</select>
										</div>
										<div class="form-group">
											<select multiple class="form-control" id="teamSelect">
												<optgroup>
													<option>-Team-</option>
												</optgroup>
												<option>NAU</option>
											</select>
										</div>
										<div class="form-group">
											<select multiple="multiple" class="form-control" id="playerSelect">
												<optgroup>
													<option selected>-Player-</option>
												</optgroup>
												<option>Aaron Cantu</option>
											</select>
										</div>

										<p class="help-block">

										</p>
									</div><!-- /.col-lg-6 -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-3 -->
		<div class="col-lg-9" >

			<div class="btn-toolbar" role="toolbar" id="buttonToolbar">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-success">
						<input type="radio" name="options" id="Leagues" value="Leagues" onclick="getValue()">
						<span class="glyphicon glyphicon-home"></span> Leagues </label>
					<label class="btn btn-success">
						<input type="radio" name="options" id="Conferences" value="Conferences">
						<span class="glyphicon glyphicon-bullhorn"></span> Conferences </label>
					<label class="btn btn-success">
						<input type="radio" name="options" id="Seasons" value="Seasons">
						<span class="glyphicon glyphicon-calendar"></span> Seasons </label>

					<label class="btn btn-success active">
						<input type="radio" name="options" class="Teams" id="Teams" value="Teams" checked>
						<span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Teams </label>
					<label class="btn btn-success">
						<input type="radio" name="options" id="Players" value="Players">
						<span class="glyphicon glyphicon-user"></span> Players </label>

					<label class="btn btn-success">
						<input type="radio" name="options" id="Games" value="Games">
						<span class="glyphicon glyphicon-check"></span> Games </label><label class="btn btn-success">
						<input type="radio" name="options" id="Downs" value="Downs">
						<span class="glyphicon glyphicon-book"></span> Downs </label>
					<label class="btn btn-success">
						<input type="radio" name="options" id="sheets" value="sheets">
						<span class="glyphicon glyphicon-pencil"></span> Football sheets </label>
				</div>
			</div>

			<div class="panel-group" id="accordion">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Filtered Table</a></h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body" id="filteredTable">
							<div id="loadImg"><img src="resources/loader.gif" width="50px" />
							</div>
							<?php
							require_once ("includes/filters.class.php");
							$db = new DB();
							$f = new filterTest($db);
							//$f -> fetchPlayer();
							?>

							<?php ?>
						</div>
					</div>
				</div>

				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Results Table</a></h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="panel-body" id="resultsTable">

						</div>
					</div>
				</div>
			</div>

		</div>
		</div-->

		<a id="play-by-play-section"></a><!-- ///////////////////////////////////////////////////////////////////.row -->
		<div class="" style="background-color: 000; background-repeat: repeat-x; ">
			<div class="row">

				<div class="col-lg-12" id="filterDiv">

					<h2>Play-by-Play</h2>
					<br />
					<form class="" id="downForm" action="includes/downprocessor.php" method="GET" role="form">
						<div class="row">
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="matchupID"><!--span class="glyphicon glyphicon-time"></span-->MID</span>
									<input type="number" class="form-control" placeholder="Matchup ID" name="matchupID">
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="downID"><!--span class="glyphicon glyphicon-time"></span-->DID</span>
									<input type="number" class="form-control" placeholder="Down ID" name="downID">
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-3">
								<h4>Home Team Name</h4>
							</div><!-- /.col-lg-6 -->

							<div class="col-lg-3">
								<h4>Away Team Name</h4>
							</div><!-- /.col-lg-6 -->
						</div>
						<div class="row">
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="downNum"><span class="glyphicon glyphicon-arrow-down"></span></span>
									<select name="downNum" class="form-control">
										<option disabled selected>-Down #-</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="teamPossession"><span class="glyphicon glyphicon-user"></span></span>
									<select class="form-control" name="teamPossession">
										<option disabled selected>-Poss.-</option>

										<option>1</option>
										<option>2</option>
									</select>
								</div><!-- /input-group -->
							</div>
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="sideOfField">></span>
									<select class="form-control" name="sideOfField">
										<option disabled selected>Field Side</option>

										<option>1</option>
										<option>2</option>

									</select>
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="ballOn"><img src="favicon.ico.png" width="14" /></span>
									<input type="number" class="form-control" placeholder="Ball On" name="ballOn">
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->

							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="toGo"><span class="glyphicon glyphicon-ok"></span></span>
									<input type="number" class="form-control" placeholder="To Go" name="toGo">
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="startTime"><span class="glyphicon glyphicon-time"></span></span>
									<input type="text" class="form-control" placeholder="Start Time" name="startTime">
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
						</div>
						<div class="row">
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon" id="quarter">QT</span>
									<select class="form-control" name="quarter">
										<option disabled selected>-Quarter-</option>

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
						<div class="alert fade in" id="processedDownResults" style="margin-top:20px;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							<div></div>
						</div>
						<h3>Offense</h3>
						<div class="form-group" id="playGroup">
							<label class="">Play type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success">
										<input type="radio" name="plays" id="rush" value="rush" >
										<span class=" -home"></span> Rush </label>
									<label class="btn btn-success">
										<input type="radio" name="plays" id="pass" value="pass">
										<span class=" -bullhorn"></span> Pass </label>
									<label class="btn btn-success">
										<input type="radio" name="plays" id="kick" value="kick">
										<span class=" -calendar"></span> Kicks </label>
								</div> </label>
						</div>

						<div class="form-group" id="rushGroup" data-id="rush">

							<div class="form-group">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="rush">Ball Carrier</label>
											<select name="ballCarrier" class="form-control" id="ballCarrier" placeholder="Player">
												<option disabled selected>Player (Jersey # or Name)</option>
												<option value="1">1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="carrierYards">Carrier Yards</label>
											<input type="number" name="carrierYards" class="form-control" id="carrierYards" placeholder="Carrier Yards" />

										</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
								</div>
							</div>

						</div>

						<div class="form-group" data-id="kick" id="kickGroup">
							<!------------------------------------------------------------->
							<label class="">Kick type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="kicks" id="kickoff" value="kickoff" >
										<span class=" -home"></span> Kickoff </label>
									<label class="btn btn-default">
										<input type="radio" name="kicks" id="fieldgoal" value="fieldgoal">
										<span class=" -bullhorn"></span> Fieldgoal </label>

									<label class="btn btn-default">
										<input type="radio" name="kicks" id="PAT" value="PAT">
										<span class=" -bullhorn"></span> PAT </label>

									<label class="btn btn-default">
										<input type="radio" name="kicks" id="punt" value="punt">
										<span class=" -calendar"></span> Punt </label>
								</div> </label>

						</div>
						<div class="form-group" id="kickerGroup" >
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="kicker">Kicker</label>
										<select name="kicker" class="form-control" id="kicker">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-4">
									<div class="form-group">
										<label for="kickerYards">Kicker Yards</label>
										<input type="number" name="kickerYards" class="form-control" id="kickerYards" placeholder="Kicker Yards" />

									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
						</div>
						<div class="form-group" data-id="pass" id="passGroup">
							<!------------------------------------------------------------->
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label for="passer">Passer</label>
										<select name="passer" class="form-control" id="passer">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-3">
									<div class="form-group">
										<label for="receiver">Receiver</label>
										<select name="receiver" class="form-control" id="receiver">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-3">
									<div class="form-group">

										<label for="passingYards">Passing Yards</label>
										<input type="number" name="passingYards" class="form-control" placeholder="Enter - amount for a loss" id="passingYards">

									</div><!-- /form-group -->

								</div>
							</div>

						</div>

						<div class="form-group" id="returnGroup" data-id3="return">
							<div class="row">
								<!------------------------------------------>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="returner">Returner</label>
										<select name="returner" class="form-control" id="returner">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-4">
									<div class="form-group">
										<label for="returnYards">Return Yards</label>
										<input type="number" name="returnYards" class="form-control" id="returnYards" placeholder="Enter - amount for a loss" value="NULL">

									</div><!-- /input-group -->
								</div>
							</div>
						</div>
						<div class="form-group" id="resultGroup" >
							<!------------------------------------------------------------->
							<label class=""> Result of Play
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="results" id="score" value="score" >
										<span class=" -home"></span> Score </label>
									<label class="btn btn-default">
										<input type="radio" name="results" id="stop" value="stop">
										<span class=" -bullhorn"></span> Stop </label>
									<label class="btn btn-default">
										<input type="radio" name="results" id="turnover" value="turnover">
										<span class=" -calendar"></span> Turnover </label>

									<label class="btn btn-default">
										<input type="radio" name="results" id="penalty" value="penaltyResult">
										<span class=" -calendar"></span> Penalty </label>
								</div> </label>
						</div>

						<div class="form-group" id="scoreGroup" data-id2="score">
							<!------------------------------------------------------------->
							<label class=""> Score Type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="scores" id="touchdown" value="touchdown" >
										<span class=" -home"></span> Touchdown </label>

									<label class="btn btn-default">
										<input type="radio" name="scores" id="twopoint" value="twopoint">
										<span class=" -calendar"></span> 2 Point Conversion </label>
								</div> </label>
						</div>

						<div class="form-group" id="stopGroup" data-id2="stop">
							<!------------------------------------------------------------->
							<label class=""> Stop Type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="stops" id="tackle" value="tackle" >
										<span class=" -home"></span> Tackled </label>

									<label class="btn btn-default">
										<input type="radio" name="stops" id="noTackle" value="noTackle">
										<span class=" -calendar"></span> No Tackle </label>
									<label class="btn btn-default">
										<input type="radio" name="stops" id="outBounds" value="outBounds">
										<span class=" -bullhorn"></span> Ran out of Bounds </label>
									<label class="btn btn-default">
										<input type="radio" name="stops" id="block" value="tackle">
										<span class=" -calendar"></span> Blocked </label>
									<label class="btn btn-default">
										<input type="radio" name="stops" id="fumbleRec" value="fumbleRec">
										<span class=" -bullhorn"></span> Fumble Recovered </label>
								</div> </label>
						</div>

						<div class="form-group" id="tackleGroup" data-id2="tackled">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="stoppedBy">Stopped By</label>
										<select name="stoppedBy" id="stoppedBy" class="form-control">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->

								<div class="col-lg-4">
									<div class="form-group">
										<label for="assistTackle">Assisted Tackle</label>
										<select name="assistTackle" class="form-control" id="assistTackle">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
						</div>
						<div class="form-group" id="turnoverGroup" data-id2="turnover">
							<label class=""> Turnover Type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="turns" id="interception" value="interception" >
										<span class=" -home"></span> Interception </label>

									<label class="btn btn-default">
										<input type="radio" name="turns" id="fumbleLost" value="fumbleLost">
										<span class=" -calendar"></span> Fumble Lost </label>
									<label class="btn btn-default">
										<input type="radio" name="turns" id="blockRec" value="blockRec">
										<span class=" -calendar"></span> Block &amp; Rec. Field Goal </label>
									<label class="btn btn-default">
										<input type="radio" name="turns" id="safety" value="safety">
										<span class=" -calendar"></span> Safety </label>
								</div> </label>
						</div>

						<div class="form-group" id="penaltyGroup-result-offense" data-id2="penalty">
							<!------------------------------------------>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="button" class="btn btn-primary" name="penaltyGroupButton-result-offense" id="penaltyGroupButton-result-offense" value="Add Penalty" size="3" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="penaltyType-result-offense">Penalty Type - Result of Play - Offense </label>
										<select name="penaltyType-result-offense" id="penaltyType-result-offense" class="form-control">
											<option disabled selected>Penalty Type</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-4">
									<div class="form-group">
										<label for="penaltyYards-result-offense">Penalty Yards - Result of Play - Offense</label>
										<input type="number" name="penaltyYards-result-offense" id="penaltyYards-result-offense" class="form-control" placeholder="Yards"/>

									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
							<label class=""> Effect - Result of Play - Offense
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="checkbox" name="lossDown-result-offense" id="" value="lossDown">
										<span class=" -calendar"></span> Loss of Down </label>
									<label class="btn btn-default">
										<input type="checkbox" name="firstDown-result-offense" id="" value="firstDown">
										<span class=" -calendar"></span> First Down </label>
									<label class="btn btn-default">
										<input type="checkbox" name="other-result-offense" id="" value="other">
										<span class=" -calendar"></span> Other </label>
									<label class="btn btn-warning">
										<input type="checkbox" name="accepted-result-offense" id="" value="accepted">
										<span class=" -calendar"></span> Accepted </label>
								</div> </label>
						</div>

						<div class="form-group" id="penaltyGroup-end-offense">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="button" class="btn btn-primary" name="penaltyGroupButton-end-offense" id="penaltyGroupButton-end-offense" value="Add Penalty After Play" />
									</div>
								</div>
							</div>
						</div>
						<hr />
						<h3>Defense</h3>
						<div class="form-group" id="returnGroup-defense" data-id3="return-defense">
							<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
							<div class="row">
								<!------------------------------------------>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="returner-defense">Returner</label>
										<select name="returner-defense" class="form-control" id="returner-defense">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-4">
									<div class="form-group">
										<label for="returnYards-defense">Return Yards</label>
										<input name="returnYards-defense" class="form-control" id="returnYards-defense" placeholder="Enter - amount for a loss">

									</div><!-- /input-group -->
								</div>
							</div>
						</div>
						<!----------------------------------------------------------------------------------------------------------->
						<div class="form-group" id="resultGroup-defense" >
							<label class=""> Result of Play
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="results-defense" id="score-defense" value="score" >
										<span class=" -home"></span> Score </label>
									<label class="btn btn-default">
										<input type="radio" name="results-defense" id="stop-defense" value="stop">
										<span class=" -bullhorn"></span> Stop </label>
									<label class="btn btn-default">
										<input type="radio" name="results-defense" id="turnover-defense" value="turnover">
										<span class=" -calendar"></span> Turnover </label>

									<label class="btn btn-default">
										<input type="radio" name="results-defense" id="penalty-defense" value="penaltyResult-defense">
										<span class=" -calendar"></span> Penalty </label>
								</div> </label>
						</div>

						<div class="form-group" id="scoreGroup-defense" data-id2-defense="score">
							<!------------------------------------------------------------->
							<label class=""> Score Type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="scores-defense" id="touchdown-defense" value="touchdown" >
										<span class=" -home"></span> Touchdown </label>

									<label class="btn btn-default">
										<input type="radio" name="scores-defense" id="twopoint-defense" value="twopoint">
										<span class=" -calendar"></span> 2 Point Conversion </label>
								</div> </label>
						</div>

						<div class="form-group" id="stopGroup-defense" data-id2-defense="stop">
							<!------------------------------------------------------------->
							<label class=""> Stop Type
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="radio" name="stops-defense" id="tackle-defense" value="tackle" >
										<span class=" -home"></span> Tackled </label>

									<label class="btn btn-default">
										<input type="radio" name="stops-defense" id="noTackle-defense" value="noTackle">
										<span class=" -calendar"></span> No Tackle </label>
									<label class="btn btn-default">
										<input type="radio" name="stops-defense" id="outBounds-defense" value="outBounds">
										<span class=" -bullhorn"></span> Ran out of Bounds </label>
									<label class="btn btn-default">
										<input type="radio" name="stops-defense" id="block-defense" value="block">
										<span class=" -calendar"></span> Blocked </label>
									<label class="btn btn-default">
										<input type="radio" name="stops-defense" id="fumbleRec-defense" value="fumbleRec">
										<span class=" -bullhorn"></span> Fumble Recovered </label>
								</div> </label>
						</div>

						<div class="form-group" id="tackleGroup-defense" data-id2="tackled-defense">

							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="stoppedBy-defense">Stopped By</label>
										<select name="stoppedBy-defense" id="stoppedBy-defense" class="form-control">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->

								<div class="col-lg-4">
									<div class="form-group">
										<label for="assistTackle-defense">Assisted Tackle</label>
										<select name="assistTackle-defense" class="form-control" id="assistTackle-defense">
											<option disabled selected>Player (Jersey # or Name)</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
						</div>

						<div class="form-group" id="turnoverGroup-defense" data-id2-defense="turnover">
							<label class=""> Turnover Type
								<div class="btn-group" data-toggle="buttons">

									<label class="btn btn-default">
										<input type="radio" name="turns-defense" id="fumbleLost-defense" value="fumbleLost">
										<span class=" -calendar"></span> Fumble Lost </label>

									<label class="btn btn-default">
										<input type="radio" name="turns-defense" id="safety-defense" value="safety">
										<span class=" -calendar"></span> Safety </label>
								</div> </label>
						</div>

						<div class="form-group" id="penaltyGroup-result-defense" data-id2-defense="penalty">
							<!------------------------------------------>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="button" class="btn btn-primary" name="penaltyGroupButton-result-defense" id="penaltyGroupButton-result-defense" value="Add Penalty" size="3" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="penaltyType-result-defense">Penalty Type - Result of Play - Defense </label>
										<select name="penaltyType-result-defense" id="penaltyType-result-defense" class="form-control">
											<option disabled selected>Penalty Type</option>
											<option value="1">1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-4">
									<div class="form-group">
										<label for="penaltyYards-result-defense">Penalty Yards - Result of Play - Defense</label>
										<input name="penaltyYards-result-defense" id="penaltyYards-result-defense" class="form-control" placeholder="Yards"/>

									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
							<label class=""> Effect - Result of Play - Defense
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										<input type="checkbox" name="lossDown-result-defense" id="" value="lossDown">
										<span class=" -calendar"></span> Loss of Down </label>
									<label class="btn btn-default">
										<input type="checkbox" name="firstDown-result-defense" id="" value="firstDown">
										<span class=" -calendar"></span> First Down </label>
									<label class="btn btn-default">
										<input type="checkbox" name="other-result-defense" id="" value="other">
										<span class=" -calendar"></span> Other </label>
									<label class="btn btn-warning">
										<input type="checkbox" name="accepted-result-defense" id="" value="accepted">
										<span class=" -calendar"></span> Accepted </label>
								</div> </label>

						</div>

						<div class="form-group" id="penaltyGroup-end-defense">
							<!------------------------------------------>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="button" class="btn btn-primary" name="penaltyGroupButton-end-defense" id="penaltyGroupButton-end-defense" value="Add Penalty After Play" size="3" >
									</div>
								</div>
							</div>
							<div id="penaltyGroup-end-defense-1">
								<div class="row" >
									<div class="col-lg-4">
										<div class="form-group">
											<label for="penaltyType-end-defense">Penalty Type - end of Play - Defense </label>
											<select name="penaltyType-end-defense" id="penaltyType-end-defense" class="form-control">
												<option disabled selected>Penalty Type</option>
												<option value="1">1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
									<div class="col-lg-4">
										<div class="form-group">
											<label for="penaltyYards-end-defense">Penalty Yards - end of Play - Defense</label>
											<input name="penaltyYards-end-defense" id="penaltyYards-end-defense" class="form-control" placeholder="Yards"/>

										</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
								</div>
								<label class=""> Effect - end of Play - Defense
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-default">
											<input type="checkbox" name="lossDown-end-defense" id="" value="lossDown">
											<span class=" -calendar"></span> Loss of Down </label>
										<label class="btn btn-default">
											<input type="checkbox" name="firstDown-end-defense" id="" value="firstDown">
											<span class=" -calendar"></span> First Down </label>
										<label class="btn btn-default">
											<input type="checkbox" name="other-end-defense" id="" value="other">
											<span class=" -calendar"></span> Other </label>
										<label class="btn btn-warning">
											<input type="checkbox" name="accepted-end-defense" id="" value="accepted">
											<span class=" -calendar"></span> Accepted </label>
									</div> </label>

							</div>
						</div>
						<hr />
						<div class="form-group" id="endtimeGroup">
							<div class="row">
								<div class="col-lg-2">
									<div class="input-group">
										<span class="input-group-addon" id="endTime"><span class="glyphicon glyphicon-time"></span></span>
										<input type="text" class="form-control" name="endTime" id="endTime" max="15" placeholder="End Time" title="End time"/>
										<!--input type="text" class="form-control" placeholder="End Time" name="endTime"-->
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
							<div class="form-group" id="submitButton">
								<input class="btn btn-danger" type="submit" name="submitButton" value="Submit" />
								<input class="btn btn-warning" id="resetButton" type="reset" name="resetButton" value="Reset" />
							</div>
					</form>
				</div>
			</div>
		</div>
		<!--img src="images/800px-American_Football_field_(NFL).png" class="well" /-->
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<?php
		require_once ("includes/footer.php");
		?>

		<!--script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>

		<script>
		var myControl = {
		create : function(tp_inst, obj, unit, val, min, max, step) {
		$('<input class="ui-timepicker-input" value="' + val + '" style="width:50%">').appendTo(obj).spinner({
		min : min,
		max : max,
		step : step,
		change : function(e, ui) {// key events
		// don't call if api was used and not key press
		if (e.originalEvent !== undefined)
		tp_inst._onTimeChange();
		tp_inst._onSelectHandler();
		},
		spin : function(e, ui) {// spin events
		tp_inst.control.value(tp_inst, obj, unit, ui.value);
		tp_inst._onTimeChange();
		tp_inst._onSelectHandler();
		}
		});
		return obj;
		},
		options : function(tp_inst, obj, unit, opts, val) {
		if ( typeof (opts) == 'string' && val !== undefined)
		return obj.find('.ui-timepicker-input').spinner(opts, val);
		return obj.find('.ui-timepicker-input').spinner(opts);
		},
		value : function(tp_inst, obj, unit, val) {
		if (val !== undefined)
		return obj.find('.ui-timepicker-input').spinner('value', val);
		return obj.find('.ui-timepicker-input').spinner('value');
		}
		};

		$('#slider_example_5').datetimepicker({
		controlType : myControl
		});
		</script-->
		<script>
			$(document).ready(function() {
				//$(':input[type="number"]').val(1);
				//$(':input[type="text"]').val("12:00:00");>

				$("#loadImg, #downForm [data-id],[data-id2],[data-id3],[data-id4], [data-id-defense],[data-id2-defense],[data-id3-defense],[data-id4-defense], #resultGroup, #kickerGroup, #resultGroup-defense, #penaltyGroup-end-defense-1, #processedDownResults").hide();
				var values;
				var count = 1;
				$("#downForm #playGroup input[type='radio']").change(function() {
					$("#downForm > [data-id]").hide();
					values = $(this).val();
					$("#downForm > #returnGroup").hide();
					$("#downForm [data-id=" + values + "]").fadeIn();
					$("#downForm > #resultGroup").fadeIn();
					$("#downForm > #yardsGroup").fadeIn();
					$('#downForm > #kickerGroup').hide();
				});
				$("#downForm #kickGroup input[type='radio']").change(function() {

					$("#downForm #kickerGroup").fadeIn();
					values = $(this).val();
					$("#downForm > #returnGroup").fadeIn();
					$("#downForm > #yardsGroup").fadeIn();
				});
				$("#downForm #resultGroup input[type='radio']").change(function() {
					$("#downForm > [data-id2]").hide();
					var kickValue;
					kickValue = $("#downForm #kickGroup input[type='radio']:checked").val();
					values = $(this).val();
					if (values == "score") {
						if (kickValue == "fieldgoal" || kickValue == "PAT") {
							$("#downForm [data-id2=" + values + "]").hide();
						} else {
							$("#downForm [data-id2=" + values + "]").fadeIn();

						}
					}
					if (values == "score") {
						if (kickValue == "fieldgoal" || kickValue == "PAT") {
							$("#downForm [data-id2=" + values + "]").hide();
						} else {
							$("#downForm [data-id2=" + values + "]").fadeIn();

						}
					} else {
						$("#downForm [data-id2=" + values + "]").fadeIn();
					}
					if (values == "penaltyResult") {
						$("#downForm > #penaltyGroup-result-offense").fadeIn();
					}
					if (values != "penaltyResult") {
						$("#downForm > #penaltyGroup-result-offense").hide();
					}

				});
				$("#downForm #scoreGroup input[type='radio']").change(function() {

					$("#downForm > [data-id3]").hide();
					values = $(this).val();

					$("#downForm [data-id3=" + values + "]").fadeIn();
					$("#downForm [data-id3='return']").hide();
				});

				$("#downForm #turnoverGroup input[type='radio']").change(function() {

					$("#downForm #resultGroup-defense").fadeIn();
					$("#downForm [data-id3='return-defense']").fadeIn();

				});

				$("#downForm #stopGroup input[type='radio']").change(function() {
					$("#downForm > [data-id3]").hide();
					values = $(this).val();
					if (values != "outBounds" && values != "noTackle")
						$("#downForm > #tackleGroup").fadeIn();
					if (values == "outBounds" || values == "noTackle")
						$("#downForm > #tackleGroup").hide();
				});

				$("#downForm #addPenaltyGroup input[type='checkbox']").change(function() {
					alert($(this).val());
				});
				$("#penaltyGroupButton-end-offense").click(function() {//add more penalties to the form
					count++;
					var string = "<hr /><div class='row'><div class='col-lg-4'></div></div><div class='row'><div class='col-lg-4'><div class='form-group'><label for='penaltyType'>Penalty Type " + count + " </label><select name='penaltyType' id='penaltyType-" + count + "' class='form-control'><option disabled selected>Penalty Type</option><option>1</option><option>2</option><option>3</option><option>4</option></select></div><!-- /input-group --></div><!-- /.col-lg-6 --><div class='col-lg-4'><div class='form-group'><label for='penaltyYards'>Penalty Yards</label><input name='penaltyYards' id='penaltyYards-" + count + "' class='form-control' placeholder='Yards'/></div><!-- /input-group --></div><!-- /.col-lg-6 --></div><label class=''> Effect <div class='btn-group' data-toggle='buttons'><label class='btn btn-default'><input type='checkbox' name='lossDown' id='' value='lossDown'><span class='glyphicon glyphicon-calendar'></span> Loss of Down </label><label class='btn btn-default'><input type='checkbox' name='firstDown' id='' value='firstDown'><span class='glyphicon glyphicon-calendar'></span> First Down </label><label class='btn btn-default'><input type='checkbox' name='other' id='' value='other'><span class='glyphicon glyphicon-calendar'></span> Other </label><label class='btn btn-warning'><input type='checkbox' name='accepted' id='' value='accepted'><span class='glyphicon glyphicon-calendar'></span> Accepted </label></div> </label>"
					$("#penaltyGroup").fadeIn();
					$(string).appendTo($("#penaltyGroup-end-offense"));

				});
				$("#penaltyGroupButton-result-offense").click(function() {//add more penalties to the form
					count++;
					var string = "<hr /><div class='row'><div class='col-lg-4'></div></div><div class='row'><div class='col-lg-4'><div class='form-group'><label for='penaltyType'>Penalty Type " + count + " </label><select name='penaltyType' id='penaltyType-" + count + "' class='form-control'><option disabled selected>Penalty Type</option><option>1</option><option>2</option><option>3</option><option>4</option></select></div><!-- /input-group --></div><!-- /.col-lg-6 --><div class='col-lg-4'><div class='form-group'><label for='penaltyYards'>Penalty Yards</label><input name='penaltyYards' id='penaltyYards-" + count + "' class='form-control' placeholder='Yards'/></div><!-- /input-group --></div><!-- /.col-lg-6 --></div><label class=''> Effect <div class='btn-group' data-toggle='buttons'><label class='btn btn-default'><input type='checkbox' name='lossDown' id='' value='lossDown'><span class='glyphicon glyphicon-calendar'></span> Loss of Down </label><label class='btn btn-default'><input type='checkbox' name='firstDown' id='' value='firstDown'><span class='glyphicon glyphicon-calendar'></span> First Down </label><label class='btn btn-default'><input type='checkbox' name='other' id='' value='other'><span class='glyphicon glyphicon-calendar'></span> Other </label><label class='btn btn-warning'><input type='checkbox' name='accepted' id='' value='accepted'><span class='glyphicon glyphicon-calendar'></span> Accepted </label></div> </label>"
					$("#penaltyGroup-end-offense").fadeIn();
					$(string).appendTo($("#penaltyGroup-result-offense"));

				});
				$("#downForm .btn").change(function() {
					//alert($('#downForm .form-group input[type=radio]:checked').val());
				});
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$("#downForm #resultGroup-defense input[type='radio']").change(function() {
					$("#downForm > [data-id2-defense]").hide();
					values = $(this).val();
					$("#downForm [data-id2-defense=" + values + "]").fadeIn();
					if (values == "penaltyResult-defense") {
						$("#downForm > #penaltyGroup-result-defense").fadeIn();
					}
					if (values != "penaltyResult-defense") {
						$("#downForm > #penaltyGroup-result-defense").hide();
					}
				});
				$("#downForm #scoreGroup-defense input[type='radio']").change(function() {

					$("#downForm > [data-id3-defense]").hide();
					values = $(this).val();

					$("#downForm [data-id3-defense=" + values + "]").fadeIn();
					$("#downForm [data-id3-defense='return']").hide();
				});

				$("#downForm #turnoverGroup-defense input[type='radio']").change(function() {

					values = $(this).val();
					if (values != "safety") {
						$("#downForm [data-id3-defense='return-defense']").fadeIn();
						$("#downForm #resultGroup-defense").fadeIn();
					}
					if (values == "safety") {
						$("#downForm [data-id3-defense='return-defense']").hide();
						$("#downForm #resultGroup-defense").hide();
					}
				});

				$("#downForm #stopGroup-defense input[type='radio']").change(function() {
					$("#downForm > [data-id3-defense]").hide();
					values = $(this).val();
					if (values != "outBounds" && values != "noTackle")
						$("#downForm > #tackleGroup-defense").fadeIn();
					if (values == "outBounds" || values == "noTackle")
						$("#downForm > #tackleGroup-defense").hide();
				});
				$("#penaltyGroupButton-result-defense").click(function() {//add more penalties to the form
					var string = "<hr /><div class='row'><div class='col-lg-4'></div></div><div class='row'><div class='col-lg-4'><div class='form-group'><label for='penaltyType'>Penalty Type " + count + " </label><select name='penaltyType' id='penaltyType-" + count + "' class='form-control'><option disabled selected>Penalty Type</option><option>1</option><option>2</option><option>3</option><option>4</option></select></div><!-- /input-group --></div><!-- /.col-lg-6 --><div class='col-lg-4'><div class='form-group'><label for='penaltyYards'>Penalty Yards</label><input name='penaltyYards' id='penaltyYards-" + count + "' class='form-control' placeholder='Yards'/></div><!-- /input-group --></div><!-- /.col-lg-6 --></div><label class=''> Effect <div class='btn-group' data-toggle='buttons'><label class='btn btn-default'><input type='checkbox' name='lossDown' id='' value='lossDown'><span class='glyphicon glyphicon-calendar'></span> Loss of Down </label><label class='btn btn-default'><input type='checkbox' name='firstDown' id='' value='firstDown'><span class='glyphicon glyphicon-calendar'></span> First Down </label><label class='btn btn-default'><input type='checkbox' name='other' id='' value='other'><span class='glyphicon glyphicon-calendar'></span> Other </label><label class='btn btn-warning'><input type='checkbox' name='accepted' id='' value='accepted'><span class='glyphicon glyphicon-calendar'></span> Accepted </label></div> </label>"
					$("#penaltyGroup-defense").fadeIn();
					$(string).appendTo($("#penaltyGroup-result-defense"));
				});
				$("#penaltyGroupButton-end-defense").click(function() {//add more penalties to the form
					count++;

					var string = "<hr /><div class='row'><div class='col-lg-4'></div></div><div class='row'><div class='col-lg-4'><div class='form-group'><label for='penaltyType'>Penalty Type " + count + " </label><select name='penaltyType' id='penaltyType-" + count + "' class='form-control'><option disabled selected>Penalty Type</option><option>1</option><option>2</option><option>3</option><option>4</option></select></div><!-- /input-group --></div><!-- /.col-lg-6 --><div class='col-lg-4'><div class='form-group'><label for='penaltyYards'>Penalty Yards</label><input name='penaltyYards' id='penaltyYards-" + count + "' class='form-control' placeholder='Yards'/></div><!-- /input-group --></div><!-- /.col-lg-6 --></div><label class=''> Effect <div class='btn-group' data-toggle='buttons'><label class='btn btn-default'><input type='checkbox' name='lossDown' id='' value='lossDown'><span class='glyphicon glyphicon-calendar'></span> Loss of Down </label><label class='btn btn-default'><input type='checkbox' name='firstDown' id='' value='firstDown'><span class='glyphicon glyphicon-calendar'></span> First Down </label><label class='btn btn-default'><input type='checkbox' name='other' id='' value='other'><span class='glyphicon glyphicon-calendar'></span> Other </label><label class='btn btn-warning'><input type='checkbox' name='accepted' id='' value='accepted'><span class='glyphicon glyphicon-calendar'></span> Accepted </label></div> </label>"
					$("#penaltyGroup-end-defense").fadeIn();
					$(string).appendTo($("#penaltyGroup-end-defense"));

				});

				$('input[name=options]').change(function() {//fires when a new radio button is selected
					$("#loadImg").fadeIn();
					$.get('includes/filters.class.php', {
						options : $('input[name=options]:checked').val(),		//retreive the right data according to which radio button is selected
					}, function(data, status) {
						$("#loadImg").hide();
						if (data.length > 0) {
							$('#filteredTable').html(data);
						} else {
							$('#filteredTable').html("There was an error loading data from the database.  Please try again.");
						}
						//insert the data from the database into the filterTable div
					});
				});

				$('#downForm').submit(function(event) {
					$('#processedDownResults').hide();
					event.preventDefault();
					var values = $(this).serialize();
					$.ajax({
						/*beforeSend : function(){
						 $('#processedDownResults').html("src='resources/loader.gif' />"
						 )},*/
						url : "includes/downProcessor.php",
						type : "get",
						dataType : "json",
						data : values,
						success : function(data) {
							//$('#myModal').html(data).modal('toggle');
							//alert(data);
							$('#processedDownResults').removeClass("alert-success").removeClass("alert-danger");
							alert("Start time is: " + data[0].startTime);

							//clear the classes on the div
							if (data.length > 0) {
								$('#processedDownResults').addClass("alert-success").fadeIn();
								$('#processedDownResults > div').html("<strong>SUCCESS!</strong><br />" + data);
							} else {
								$('#processedDownResults').addClass("alert-danger").fadeIn();
								$('#processedDownResults > div').html("<strong>Error!</strong><br /> An error occured while inserting the data into the database.  Please try again.");
							}
						},
					});
					//$('#resetButton').click();
					//reset the form after it is submitted
				});
			});

			/*
			var checked = "";
			var checked = $('input[name=options]:checked').val();
			if (checked == "Games") {
			alert(checked);

			}
			$.ajax({url: 'includes/filters.class.php'
			data: {'options=' + checked},
			type: 'get',
			success: function(html){
			//fill the filterTable div with php output
			$('#filteredTable').html(html);
			}
			});
			function getValue() {

			//returns radio values

			var checked = $('input[name=options]:checked').val();
			if (checked == "Games") {
			alert(checked);

			}

			}

			function testR() {
			var x = document.getElementsByName('r')
			for (var k = 0; k < x.length; k++)
			if (x[k].checked) {
			alert('Option selected: ' + x[k].value)
			}

			}

			$("input:radio[name=options]").click(function getRadio() {
			var value = $(this).val();
			alert(value);
			});

			/*$("select").change(function() {
			var str = "";
			$("select option:selected").each(function() {
			str += $(this).text() + " ";
			});
			$("#resultsTable").text(str);
			}).trigger("change");*/

			//selectors that work
			//$('select option:selected')
			//$('input[name=options]:checked').val()
			//$('select option:selected').css('outline','3px solid red');*/

		</script>

		<!--</div> container-->
