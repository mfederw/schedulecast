<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<a href="performers.php">Back</a>
<br>
<img src="../images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">
<?php
session_start();

if ( $_SESSION['admin'] != 1 ) {
    // Redirect them to the login page
    header("Location: ../login.php");
}

$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

// Populate the Team Names
$teamquery = mysqli_query($dbconnect, "SELECT * FROM Teams")
   or die (mysqli_error($dbconnect));

while ($teamrow = mysqli_fetch_array($teamquery)) {
	$team[$teamrow['ID']] = $teamrow['Name'];
	$ismember[$teamrow['ID']] = false;
}

list($performerid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

$query = mysqli_query($dbconnect, "SELECT * FROM Performers WHERE ID = " . $performerid . " LIMIT 1")
   or die (mysqli_error($dbconnect));

$performerinfo = mysqli_fetch_array($query);

echo "<h1>" . $performerinfo['UserName'] . " Details</h1>\n";
echo "<table>
    <tr>
    <td align=center><b>First</b></td>
    <td align=center><b>Last</b></td>
    <td align=center><b>Email</b></td>
    <td align=center><b>UserName</b></td>
    <td align=center><b>Admin</b></td>
    <td align=center><b>Registered</b></td>
    </tr>
    <tr>
    <td align=center>{$performerinfo['NameFirst']}</td>
    <td align=center>{$performerinfo['NameLast']}</td>
    <td align=center>{$performerinfo['Email']}</td>
    <td align=center>{$performerinfo['UserName']}</td>
    <td align=center>{$performerinfo['Admin']}</td>
    <td align=center>{$performerinfo['RegisterDate']}</td>
    <tr>
    </table>\n";

echo "<h1>Team Membership for " . $performerinfo['UserName'] . "</h1>\n";

$myteamsquery = mysqli_query($dbconnect, "SELECT * FROM TeamMembership where Performer = " . $performerinfo['ID'])
  or die (mysqli_error($dbconnect));

$first = false;
while ($teammemberrow = mysqli_fetch_array($myteamsquery)) {
	if ($first == false) {
		echo "<h2>Member of the following teams:</h2>\n";
    		echo "<ul>\n";
		$first = true;
	}
	$ismember[$teammemberrow['Team']] = true;
	echo "<li>" . $team[$teammemberrow['Team']] . "</li>\n";
}
if ($first == true) {
	echo "</ul>\n";
}

echo "<h2>Change team membership for " . $performerinfo['UserName'] . "</h2>\n";

$inteams = false;
$notinteams = false;
foreach ($team as $id => $name) { 
	if ( $ismember[$id] == true) {
		$inteams = true;
	} else {
		$notinteams = true;
	}
}

if ($notinteams) {
	echo "<table><tr>\n";
	echo "<form name='memberchange' action='team_rest.php' method='post'>\n";
	echo "  <input type='hidden' name='performerid' value='" . $performerid . "'>";
	echo "  <input type='hidden' name='todo' value='add'>";
	echo "  <td valign=top><input type='submit' value='Add To'></td>\n";
	echo "  <td><select id='team' name='team'>\n";
	foreach ($team as $id => $name) { 
		if ( $ismember[$id] != true) {
			echo "    <option name='teamid' value='" . $id . "'>". $team[$id] . "</option>\n";
		}
	}
	echo "  </select>\n</form>\n</td>\n";
	echo "</tr>\n</table>\n";
}
if ($inteams) {
	echo "<table><tr>\n";
	echo "<form name='memberchange' action='team_rest.php' method='post'>\n";
	echo "  <input type='hidden' name='performerid' value='" . $performerid . "'>";
	echo "  <input type='hidden' name='todo' value='remove'>";
	echo "  <td valign=top><input type='submit' value='Remove From'></td>\n";
	echo "  <td><select id='team' name='team'>\n";
	foreach ($team as $id => $name) { 
		if ( $ismember[$id] == true) {
			echo "    <option name='teamid' value='" . $id . "'>". $team[$id] . "</option>\n";
		}
	}
	echo "  </select>\n</form>\n</td>\n";
	echo "</tr>\n</table>\n";
}

$startdate = date_create();
$startdate->sub(new DateInterval('P1D'));

echo "<h1>" . $performerinfo['UserName'] . " has entered availability for the following upcoming shows</h1>\n";
$showquery = mysqli_query($dbconnect, "SELECT * FROM Shows WHERE Date > '" . date_format($startdate, "Y-m-d H:i:s") . "' ORDER BY Date")
  or die (mysqli_error($dbconnect));

$first = true;
while ($showrow = mysqli_fetch_array($showquery)) {
	$availquery = mysqli_query($dbconnect, "SELECT * FROM Availability where Performer = " . $performerinfo['ID'] . " AND ShowID = " . $showrow['ID'])
	  or die (mysqli_error($dbconnect));

	while ($availrow = mysqli_fetch_array($availquery)) {
		if ( $first == true ) {
			echo "<table cellpadding=5>";
			$first = false;
		}
		if ( $availrow['Available'] == 1 ) {
			$available = "Available";
		} else {
			$available = "Not Available";
		}
		echo "  <td>" . $showrow['Description'] . "</td><td> " . $showrow['Date'] . "</td><td>" . $available . "<td>\n";
	}
	echo "<tr>\n";
}
if ( $first != true) {
	echo "</table>\n";
} else {
	echo "No Availability Specified<br";
}

$dbconnect->close();

?>

</body>
</html>
