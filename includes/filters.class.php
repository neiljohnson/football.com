<?php
require_once ("db.php");

$option = "";

if (isset($_GET['options']) && $_GET['options'] != null && $_GET['options'] != "") {
	$option = $_GET['options'];
	echo $option;
}

$con = new DB();
$mysqliCon = $con -> getLink();

switch ($option) {
	case "Leagues" :
		/////////////////////
		$res = $mysqliCon -> query("SELECT * FROM leagues");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>League ID</th><th>Name</th><th>Level</th><th>Year</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['leagueID'] . "</td>" . "<td>" . $row['leagueName'] . "</td>" . "<td>" . $row['leagueLevel'] . "</td>" . "<td>" . $row['leagueYear'] . "</td>" . "</tr>";
		}
		echo "</table></div>";

		break;

	case "Conferences" :
		//////////////////
		$res = $mysqliCon -> query("SELECT * FROM conferences");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Conference ID</th><th>Name</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['conferenceID'] . "</td>" . "<td>" . $row['conferenceName'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
		break;

	case 'Seasons' :
		/////////////////////////
		$res = $mysqliCon -> query("SELECT * FROM seasons");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Season ID</th><th>Year</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['seasonID'] . "</td>" . "<td>" . $row['seasonYear'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
		break;

	case 'Teams' :
		/////////////////////
		$res = $mysqliCon -> query("SELECT * FROM `teams`");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Team ID</th><th>School</th><th>Acro.</th><th>State</th><th>City</th><th>Mascot</th><th>Conference</th></tr>";
		while ($row = $res -> fetch_assoc()) {
			echo "<tr> " . "<td>" . $row['teamID'] . "</td>" . "<td><a href='#" . $row['teamSchoolAcro'] . "'>" . $row['teamSchool'] . "</a></td>" . "<td>" . $row['teamSchoolAcro'] . "</td>" . "<td>" . $row['teamState'] . "</td>" . "<td>" . $row['teamCity'] . "</td>" . "<td>" . $row['teamMascot'] . "</td>" . "<td>" . $row['conferenceID'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
		break;
	case 'Players' :
		/////////////////
		$res = $mysqliCon -> query("SELECT * FROM players");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Player ID</th><th>#</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Height</th><th>Weight</th><th>Experience</th><th>Redshirting</th><th>Previous School</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['playerID'] . "</td>" . "<td>" . $row['playerNumber'] . "</td>" . "<td>" . $row['playerFirstName'] . "</td>" . "<td>" . $row['playerLastName'] . "</td>" . "<td>" . $row['playerPosition'] . "</td>" . "<td>" . $row['playerHeight'] . "</td>" . "<td>" . $row['playerWeight'] . "</td>" . "<td>" . $row['playerYear'] . "</td>" . "<td>" . $row['isRedshirt'] . "</td>" . "<td>" . $row['playerPreviousSchool'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
		break;
	case 'Games' :
		/////////////////
		$mysqliCon -> query("
		CREATE TEMPORARY TABLE IF NOT EXISTS temp1 AS
		(SELECT matchups.matchupID, matchups.homeTeamID, matchups.awayTeamID, games.gameKickofftime  
		FROM games 
		INNER JOIN matchups 
		ON games.gameID = matchups.gameID);");

		$mysqliCon -> query("CREATE TEMPORARY TABLE IF NOT EXISTS temp2 AS
		(SELECT t.matchupID, t.homeTeamID, t.awayTeamID, t.gameKickofftime, teams.teamSchoolAcro 
        FROM temp1 t
        LEFT JOIN teams ON t.homeTeamID = teams.teamID);");

		$res = $mysqliCon -> query("SELECT t2.matchupID, t2.homeTeamID, t2.awayTeamID, t2.gameKickofftime, t2.teamSchoolAcro AS homeTeam, teams.teamSchoolAcro AS awayTeam
        FROM temp2 t2
        LEFT JOIN teams ON t2.awayTeamID = teams.teamID;");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Game ID</th><th>Game</th><th>Kickoff Time</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			//format the date to be more user friendly
			$date = date_create($row['gameKickofftime']);
			$formattedDate = date_format($date, 'd/m/Y @ g:i A');
			echo "<tr>" . "<td>" . $row['matchupID'] . "</td>" . "<td>" . $row['awayTeam'] . " @ " . $row['homeTeam'] . "</td>" . "<td>" . $formattedDate . "</td>" . "</tr>";
		}
		echo "</table></div>";
		break;

	case 'Downs' :
		////////////////
		$res = $mysqliCon -> query("SELECT # FROM downs");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Game ID</th><th>Home Team</th><th>Away Team</th><th>Kickoff Time</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>";
		}
		break;

	case 'sheets' :
		///////////////
		break;

	default :
		/////////////////
		//
		break;
}

class filterTest {

	public function __construct(DB $con) {
		$this -> mysqli = $con -> getLink();
	}

	public function fetchTeam() {

		$res = $this -> mysqli -> query("SELECT * FROM `teams`");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Team ID</th><th>School</th><th>Acro.</th><th>State</th><th>City</th><th>Mascot</th><th>Conference</th></tr>";
		while ($row = $res -> fetch_assoc()) {
			echo "<tr> " . "<td>" . $row['teamID'] . "</td>" . "<td><a href='#" . $row['teamSchoolAcro'] . "'>" . $row['teamSchool'] . "</a></td>" . "<td>" . $row['teamSchoolAcro'] . "</td>" . "<td>" . $row['teamState'] . "</td>" . "<td>" . $row['teamCity'] . "</td>" . "<td>" . $row['teamMascot'] . "</td>" . "<td>" . $row['conferenceID'] . "</td>" . "</tr>";
		}
		echo "</table></div>";

	}

	function fetchLeague() {
		$res = $this -> mysqli -> query("SELECT * FROM leagues");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>League ID</th><th>Name</th><th>Level</th><th>Year</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['leagueID'] . "</td>" . "<td>" . $row['leagueName'] . "</td>" . "<td>" . $row['leagueLevel'] . "</td>" . "<td>" . $row['leagueYear'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
	}

	function fetchConference() {
		$res = $this -> mysqli -> query("SELECT * FROM conferences");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Conference ID</th><th>Name</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['conferenceID'] . "</td>" . "<td>" . $row['conferenceName'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
	}

	function fetchSeason() {
		$res = $this -> mysqli -> query("SELECT * FROM seasons");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Season ID</th><th>Year</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['seasonID'] . "</td>" . "<td>" . $row['seasonYear'] . "</td>" . "</tr>";
		}
		echo "</table></div>";

	}

	function fetchPlayer() {
		$res = $this -> mysqli -> query("SELECT * FROM players");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Player ID</th><th>#</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Height</th><th>Weight</th><th>Experience</th><th>Redshirting</th><th>Previous School</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['playerID'] . "</td>" . "<td>" . $row['playerNumber'] . "</td>" . "<td>" . $row['playerFirstName'] . "</td>" . "<td>" . $row['playerLastName'] . "</td>" . "<td>" . $row['playerPosition'] . "</td>" . "<td>" . $row['playerHeight'] . "</td>" . "<td>" . $row['playerWeight'] . "</td>" . "<td>" . $row['playerYear'] . "</td>" . "<td>" . $row['isRedshirt'] . "</td>" . "<td>" . $row['playerPreviousSchool'] . "</td>" . "</tr>";
		}
		echo "</table></div>";
	}

	function fetchGame() {
		//need to return the name of the teams, not the IDs

		$this -> mysqli -> query("
		CREATE TEMPORARY TABLE IF NOT EXISTS temp1 AS
		(SELECT matchups.matchupID, matchups.homeTeamID, matchups.awayTeamID, games.gameKickofftime  
		FROM games 
		INNER JOIN matchups 
		ON games.gameID = matchups.gameID);");

		$this -> mysqli -> query("CREATE TEMPORARY TABLE IF NOT EXISTS temp2 AS
		(SELECT t.matchupID, t.homeTeamID, t.awayTeamID, t.gameKickofftime, teams.teamSchoolAcro 
        FROM temp1 t
        LEFT JOIN teams ON t.homeTeamID = teams.teamID);");

		$res = $this -> mysqli -> query("SELECT t2.matchupID, t2.homeTeamID, t2.awayTeamID, t2.gameKickofftime, t2.teamSchoolAcro AS homeTeam, teams.teamSchoolAcro AS awayTeam
        FROM temp2 t2
        LEFT JOIN teams ON t2.awayTeamID = teams.teamID;");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Game ID</th><th>Game</th><th>Kickoff Time</th></tr>";

		while ($row = $res -> fetch_assoc()) {
			//format the date to be more user friendly
			$date = date_create($row['gameKickofftime']);
			$formattedDate = date_format($date, 'd/m/Y @ g:i A');
			echo "<tr>" . "<td>" . $row['matchupID'] . "</td>" . "<td>" . $row['awayTeam'] . " @ " . $row['homeTeam'] . "</td>" . "<td>" . $formattedDate . "</td>" . "</tr>";
		}
		echo "</table></div>";
	}

	function fetchDown() {
		$res = $this -> mysqli -> query("SELECT # FROM downs");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Game ID</th><th>Home Team</th><th>Away Team</th><th>Kickoff Time</th></tr>";

		while ($row = $re -> fetch_assoc()) {
			echo "<tr>";
		}
	}

	function fetchSheet() {
		$res = $this -> mysqli -> query("SELECT * FROM everythingfootballsheets");

		echo "<div class='table-responsive'><table class='table table-striped table-hover'>";
		echo "<tr><th>Sheet ID</th><th>Player of the Game</th><th>Player That Drove me Crazy</th><th>Play of the Game</th><th>Play That Angered me</th><th>Best Momment</th><th>Result of the Game</th><th>Feelings</th></tr>";
		while ($row = $res -> fetch_assoc()) {
			echo "<tr>" . "<td>" . $row['sheetID'] . "</td>" . "<td>" . $row['playerOfGame'] . "</td>" . "<td>" . $row['playerDroveCrazy'] . "</td>" . "<td>" . $row['playOfGame'] . "</td>" . "<td>" . $row['playThatAngered'] . "</td>" . "<td>" . $row['bestMoment'] . "</td>" . "<td>" . $row['result'] . "</td>" . "<td>" . $row['feelings'] . "</td>" . "</tr>";
		}

		echo "</table></div>";
	}

}
?>