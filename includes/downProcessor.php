<?php

require_once ("db.php");

class downProcessor {
	private $query = "";
	private $downNum = "";
	private $setField = "";
	public $resultString = "";
	private $JSONArray = array();

	public function __construct(DB $con) {
		$this -> mysqli = $con -> getLink();
	}

	public function fieldSet($field) {
		$setField = $field;
		if (isset($_GET[$setField]) && $_GET[$setField] != "") {
			$this -> JSONArray[$field] = $_GET[$setField];
			//$this -> resultString += print_r($this->JSONArray[$field]);
			//$this->JSONArray = array($setField=>$_GET[$setField]);
			return TRUE;
		} else {
			//unset($this -> JSONArray);
			//$this -> JSONArray = array();
			return FALSE;
		}
		$this -> resultString += "<br />" . $setField;
	}

	public function value($isSet) {
		return $_GET[$isSet];
	}

	public function getDown() {
		return $_GET['downNum'];
	}

	public function insertValues($actionType, $entityID, $actionYards) {
		//$query = $this _> mysqli _> real_escape_string("INSERT INTO actions VALUES(NULL, " . $actionType . ", " . $entityID . ", " . $actionYards . ", " . $this -> downNum . ")");
		if (isset($_GET["downID"]) && $_GET["downID"] != "") {
			$downID = $_GET['downID'];

			//echo $downID . " is the down value";
			$query = "INSERT INTO `football`.`actions` (`actionID`, `actionType`, `entityID`, `actionYards`, `downID`) 
		VALUES (NULL, '" . $actionType . "', '" . $entityID . "', '" . $actionYards . "', '" . $downID . "')";
			if ($this -> mysqli -> query($query)) {
				$this -> resultString += $this -> mysqli -> affected_rows . " Row(s) inserted into the ACTIONS table:" . "<br />";
				$this -> resultString += "<br />" . "\"" . $query . ";\"" . "<br />";
			} else {
				$this -> resultString += "There was an error while inserting data into the database.  Please try again.";
			}
		}

	}

	public function insertDownQuery($startingQueryString) {
		if ($this -> mysqli -> query($startingQueryString)) {
			$this -> resultString += $startingQueryString;
		} else {

		}
	}

	public function getResultString() {
		return $this -> resultString;
	}

	public function getJSONArray() {
		return "[" . json_encode($this -> JSONArray) . "]";
		//return print_r($this -> JSONArray);
	}

}

$db = new DB();
$dp = new downProcessor($db);
$mysqli = new mysqli("localhost", "root", "", "football");
if ($mysqli -> connect_errno) {
	printf("Connect failed: %s\n", $mysqli -> connect_error);
	exit();
}

//Information before the start of the play
if ($dp -> fieldSet('matchupID')) {
	if ($dp -> fieldSet('downNum')) {
		if ($dp -> fieldSet('teamPossession')) {
			if ($dp -> fieldSet('sideOfField')) {
				if ($dp -> fieldSet('ballOn')) {
					if ($dp -> fieldSet('toGo')) {
						if ($dp -> fieldSet('startTime')) {
							if ($dp -> fieldSet('quarter')) {
								if ($dp -> fieldSet('endTime')) {
									$string = "INSERT INTO `football`.`downs` (`downID`, `downQuarter`, `downNumber`, `teamWithBall`, `sideOfField`, `ballOn`, `yardsToGo`, `startTime`, `endTime`, `matchupID`)
VALUES (NULL, '" . $dp -> value("quarter") . "', '" . $dp -> value("downNum") . "', '" . $dp -> value("teamPossession") . "', '" . $dp -> value("sideOfField") . "', '
" . $dp -> value("ballOn") . "', '" . $dp -> value("toGo") . "', '" . $dp -> value("startTime") . "', '" . $dp -> value("endTime") . "', '" . $dp -> value("matchupID") . "')";
									$mysqli -> query($string);
									//echo "<br />" . $string;
									/*Optional -- probably won't need to check the type of play*/
									if ($dp -> fieldSet("plays")) {
										if ($dp -> fieldSet("ballCarrier")) {
											if ($dp -> fieldSet("carrierYards")) {
												$dp -> insertValues($dp -> value("plays"), $dp -> value("ballCarrier"), $dp -> value("carrierYards"));
											}
										}

										if ($dp -> fieldSet("passer")) {
											if ($dp -> fieldSet("receiver")) {
												if ($dp -> fieldSet("passingYards")) {
													$dp -> insertValues($dp -> value("plays"), $dp -> value("receiver"), $dp -> value("passingYards"));
													$dp -> insertValues($dp -> value("plays"), $dp -> value("passer"), $dp -> value("passingYards"));
												}
											} else
												$dp -> insertValues($dp -> value("plays"), NULL, $dp -> value("passingYards"));
											// not a complete pass

										}
										//Play type = kick
										if ($dp -> fieldSet("kicks")) {
											if ($dp -> fieldSet("kicker")) {
												if ($_GET['kicks'] == "kickoff") {
													if ($dp -> fieldSet("kickerYards")) {
														$dp -> insertValues("kickoff", $dp -> value("kicker"), $dp -> value("kickerYards"));
														//PAT was successful, and score
													} else {
														$dp -> insertValues("kickoff", $dp -> value("kicker"), NULL);
														//PAT was blocked or unsuccessful so no score
													}
												}
												if ($_GET['kicks'] == "fieldgoal") {
													if ($dp -> fieldSet("kickerYards")) {
														$dp -> insertValues("fieldgoal", $dp -> value("kicker"), $dp -> value("kickerYards"));
														//fieldgoal was successful, and score
													} else {
														$dp -> insertValues("fieldgoal", $dp -> value("kicker"), NULL);
														//fieldgoal was blocked or unsuccessful so no score
													}
												}
												if ($_GET['kicks'] == "PAT") {
													if ($dp -> fieldSet("kickerYards")) {
														$dp -> insertValues("PAT", $dp -> value("kicker"), $dp -> value("kickerYards"));
														//PAT was successful, and score
													} else {
														$dp -> insertValues("PAT", $dp -> value("kicker"), NULL);
														//PAT was blocked or unsuccessful so no score
													}
												}
												if ($_GET['kicks'] == "punt") {
													if ($dp -> fieldSet("kickerYards")) {
														$dp -> insertValues("punt", $dp -> value("kicker"), $dp -> value("kickerYards"));
														//PAT was successful, and score
													} else {
														$dp -> insertValues("punt", $dp -> value("kicker"), NULL);
														//PAT was blocked or unsuccessful so no score
													}
												}
												/*if ($dp -> fieldSet("kickerYards")) {
												 $dp -> insertValues($dp -> value("kicks"), $dp -> value("kicker"), $dp -> value("kickerYards"));
												 } else {
												 $dp -> insertValues($dp -> value("kicks"), $dp -> value("kicker"), NULL);
												 //no successful kick
												 }*/
											}
											if ($dp -> fieldSet("returner")) {
												if ($dp -> fieldSet("returnYards")) {
													$dp -> insertValues("return", $dp -> value("returner"), $dp -> value("returnYards"));
												}
											}
										}
									}

									//Result of the play section
									if ($dp -> fieldSet("results")) {
										if ($dp -> fieldSet("scores")) {
											if ($dp -> fieldSet("passer"))
												$dp -> insertValues($dp -> value("scores"), $dp -> value("passer"), NULL);

											if ($dp -> fieldSet("ballCarrier"))
												$dp -> insertValues($dp -> value("scores"), $dp -> value("ballCarrier"), NULL);

											if ($dp -> fieldSet("kicker"))
												$dp -> insertValues($dp -> value("scores"), $dp -> value("kicker"), NULL);

										}
										//Stopped group
										if ($dp -> fieldSet("stops")) {
											if ($dp -> fieldSet("stoppedBy")) {
												$dp -> insertValues($dp -> value("stops"), $dp -> value("stoppedBy"), NULL);
											}
											if ($dp -> fieldSet("assistTackle")) {
												$dp -> insertValues($dp -> value("stops"), $dp -> value("assistTackle"), NULL);
											}
										}
										//Turnover group
										if ($dp -> fieldSet("turnover")) {
											if ($dp -> fieldSet("returner-defense")) {
												if ($dp -> fieldSet("returnYards-defense")) {
													$dp -> insertValues($dp -> value("turnover"), $dp -> value("returner-defense"), $dp -> value("returnYards-defense"));
												}
											}
										}
										//Penalty Result Offense
										if ($dp -> fieldSet("penaltyType-result-offense")) {
											$dp -> insertValues($dp -> value("penaltyType-result-offense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-offense"));
											//No penalty yards for a penalty = penalty not accepted

											if ($dp -> fieldSet("penaltyYards-result-offense")) {
												if ($dp -> fieldSet("lossDown-result-offense")) {
													if ($dp -> fieldSet("firstDown-result-offense")) {
														if ($dp -> fieldSet("other-result-offense")) {
															if ($dp -> fieldSet("accepted-result-offense")) {
																$dp -> insertValues($dp -> value("penaltyType-result-offense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-offense"));
																//No penalty yards for a penalty = penalty not accepted
															}
														}
													}
												}
											}
										}
									}

									//Defense result of the play group
									if ($dp -> fieldSet("results-defense")) {
										//Score section
										if ($dp -> fieldSet("scores-defense")) {
											if ($dp -> fieldSet("returner-defense")) {
												$dp -> insertValues($dp -> value("scores-defense"), $dp -> value("returner-defense"), NULL);
											}
										}
										if ($dp -> fieldSet("stops-defense")) {
											$dp -> insertValues($dp -> value("stops-defense"), $dp -> value("returner-defense"), NULL);
											if ($dp -> fieldSet("stoppedBy-defense")) {
												$dp -> insertValues($dp -> value("stops-defense"), $dp -> value("stoppedBy-defense"), NULL);
											}
											if ($dp -> fieldSet("assistTackle-defense")) {
												$dp -> insertValues($dp -> value("stops-defense"), $dp -> value("assistTackle-defense"), NULL);
											}
										}
										//Turnover group=====================================================================================fix
										if ($dp -> fieldSet("turns-defense")) {
											if ($dp -> fieldSet("returner-defense")) {
												if ($dp -> fieldSet("returnerYards-defense")) {
													$dp -> insertValues($dp -> value("turns"), $dp -> value("returner-defense"), $dp -> value("returnYards-defense"));
												}
											}
										}
										//Penalty Result Defense
										if ($dp -> fieldSet("penaltyType-result-defense")) {
											$dp -> insertValues($dp -> value("penaltyType-result-defense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
											if ($dp -> fieldSet("penaltyYards-result-defense")) {
												if ($dp -> fieldSet("lossDown-result-defense")) {
													if ($dp -> fieldSet("firstDown-result-defense")) {
														if ($dp -> fieldSet("other-result-defense")) {
															if ($dp -> fieldSet("accepted-result-defense")) {
																$dp -> insertValues($dp -> value("penaltyType-result-defense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
															}
														}
													}
												}
											}
										}
									}
									//Defense Stopped group
									if ($dp -> fieldSet("stops-defense")) {
										//Defense Stopped section
										if ($dp -> fieldSet('stoppedBy-defense')) {
											$dp -> insertValues("stops-defense", "stoppedBy-defense", NULL);
										}
										if ($dp -> fieldSet("assistTackle-defense")) {
											$dp -> insertValues("stops-defense", "assistTackle-defense", NULL);
										}
										//Defense Turnover group
										if ($dp -> fieldSet("turns-defense")) {
											//Returner section
											if ($dp -> fieldSet('returnYards-defense')) {
												if ($dp -> fieldSet('returner-defense')) {
													$dp -> insertValues("turns-defense", 'returner-defense', 'returnYards-defense');
												}
											}
										}

									}
									//Penalty End Defense
									if ($dp -> fieldSet("penaltyType-end-defense")) {
										$dp -> insertValues($dp -> value("penaltyType-end-defense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
										if ($dp -> fieldSet("penaltyYards-end-defense")) {
											if ($dp -> fieldSet("lossDown-end-defense")) {
												if ($dp -> fieldSet("firstDown-end-defense")) {
													if ($dp -> fieldSet("other-end-defense")) {
														if ($dp -> fieldSet("accepted-end-defense")) {
															$dp -> insertValues($dp -> value("penaltyType-end-defense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
														}
													}
												}
											}
										}
									}

									//Penalty Result Defense
									if ($dp -> fieldSet("penaltyType-end-offense")) {
										$dp -> insertValues($dp -> value("penaltyType-end-offense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
										if ($dp -> fieldSet("penaltyYards-end-offense")) {
											if ($dp -> fieldSet("lossDown-end-offense")) {
												if ($dp -> fieldSet("firstDown-end-offense")) {
													if ($dp -> fieldSet("other-end-offense")) {
														if ($dp -> fieldSet("accepted-end-offense")) {
															$dp -> insertValues($dp -> value("penaltyType-end-offense"), $dp -> value("teamPossession"), $dp -> value("penaltyYards-result-defense"));
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

//echo $dp->getResultString();
echo $dp -> getJSONArray();
