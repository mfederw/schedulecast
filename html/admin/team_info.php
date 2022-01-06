<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<?php
echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Back</a>";
?>
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

list($teamid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

// Get the Team Names
$teamquery = mysqli_query($dbconnect, "SELECT * FROM Teams WHERE ID = " . $teamid)
   or die (mysqli_error($dbconnect));

$teaminfo = mysqli_fetch_array($teamquery);

$memberquery = mysqli_query($dbconnect, "SELECT * FROM TeamMembership WHERE Team = " . $teamid)
   or die (mysqli_error($dbconnect));

$first = true;
$members = array();
$emails = array();
while ($performerlist = mysqli_fetch_array($memberquery)) {

	$performerQ = mysqli_query($dbconnect, "SELECT * FROM Performers WHERE ID = " . $performerlist['Performer'])
	  or die (mysqli_error($dbconnect));

	$performerInfo = mysqli_fetch_array($performerQ);

	array_push($members, $performerInfo['NameFirst'] . " " . $performerInfo['NameLast']);
	array_push($emails, $performerInfo['Email'] );
}
echo "<h1>" . $teaminfo['Name'] . " </h1>\n";

echo "<h2>Members</h2>\n";
echo "<ol>\n";
foreach ($members as $member) {
	echo "<li>" . $member . "</li>\n";
}
echo "</ol>\n";

echo "<h2>Email List</h2>\n";
echo "<ul><li>\n";
foreach ($emails as $email) {
	if ($first) {
		$first = false;
	} else {
		echo ", ";
	}
	echo $email;
}
echo "</li></ul>\n";

echo "<h2>Shows</h2>";
$showQuery = mysqli_query($dbconnect, "SELECT * FROM Shows WHERE Team = " . $teamid . " ORDER BY Date")
   or die (mysqli_error($dbconnect));

$first = true;
echo "<ul>\n";
while ($showInfo = mysqli_fetch_array($showQuery)) {
	echo "  <li>" . $showInfo['Date'] . " " . $showInfo['Description'] . "</li>\n";
}
echo "</ul>\n";


$dbconnect->close();
?>

</body>
</html>
