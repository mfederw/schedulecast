<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style>
th, td {
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 10px;
  padding-right: 10px;
}
</style>
</head>
<body>
<?php
session_start();

if ( $_SESSION['admin'] != 1 ) {
    // Redirect them to the login page
    header("Location: ../login.php");
}

?>
<a href="../user_home.php">Done</a><br>
<img src="../images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">
<h1>Performers</h1>
  <p><a href="performers.php">View/Edit Performers</a></p>

<?php

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

//$advanced = true;
$advanced = false;

$startdate = date_create();
$startdate->sub(new DateInterval('P1D'));

if ( $advanced == true ) {
	$query = mysqli_query($dbconnect, "SELECT * FROM Shows ORDER BY Date")
	  or die (mysqli_error($dbconnect));
} else {
	$query = mysqli_query($dbconnect, "SELECT * FROM Shows WHERE Date > '" . date_format($startdate, "Y-m-d H:i:s") . "' ORDER BY Date")
	   or die (mysqli_error($dbconnect));
}

echo "<h1>Shows</h1>\n";
echo "<table width='50%'>\n";
echo "  <tr>\n";
echo "    <td align=center colspan=2></td>\n";
echo "    <td align=center><b>Description</b></td>\n";
echo "    <td align=center><b>Date</b></td>\n";
echo "    <td align=center><b>Team</b></td>\n";
echo "  <tr>\n";
while ($showrow = mysqli_fetch_array($query)) {
	$showdate = new DateTime($showrow['Date']);
	$datef =  $showdate->format("M j, Y g:i A");

	echo "  <tr>\n";
	echo "    <td>\n";
	echo "      <a href='cast_show.php?id=" . $showrow['ID'] . "'>Cast Show</a>\n";
	echo "    </td>\n";
	echo "    <td>\n";
	echo "      <a href='edit_show.php?id=" . $showrow['ID'] . "'>Edit Show Details</a>\n";
	echo "    </td>\n";
	echo "    <td align=center>" . $showrow['Description'] . "</td>\n";
	echo "    <td align=center>" . $datef . "</td>\n";
	echo "    <td align=center>" . $team[$showrow['Team']] . "</td>\n";
	echo "    <td>\n";
	echo "      <a href='show_delete_rest.php?id=" . $showrow['ID'] . "'>Delete</a>\n";
	echo "    </td>\n";
	echo "  <tr>\n";
}
echo "</table>\n";
echo "<br>\n";
echo "<a href='show_add_ui.php'>Add New Show</a>\n";

echo "<h1>Teams</h1>\n";

$query = mysqli_query($dbconnect, "SELECT * FROM Teams ORDER BY Name")
  or die (mysqli_error($dbconnect));

echo "<table width=50%>\n";
echo "<tr><th>Team</th><th>Team Email Addresses</th></tr>\n";
while ($teamrow = mysqli_fetch_array($query)) {
	echo "<tr>\n";

	echo "<td align=center valign=top width=30%><a href='team_info.php?id=" . $teamrow['ID'] . "'>" . $teamrow['Name'] .  "</a></td>\n";
	$perfquery = mysqli_query($dbconnect, "SELECT * FROM TeamMembership WHERE Team = " . $teamrow['ID'])
  	  or die (mysqli_error($dbconnect));

	echo "<td>\n";
	$first = true;
	while ($perfrow = mysqli_fetch_array($perfquery)) {
		$emailquery = mysqli_query($dbconnect, "SELECT * FROM Performers WHERE ID = " . $perfrow['Performer'])
  	  	  or die (mysqli_error($dbconnect));

		while ($emailrow = mysqli_fetch_array($emailquery)) {
			if ($first == true) {
				$first = false;
			} else {
				echo ", ";
			}
			echo $emailrow['Email'];
		}
	}
	echo "</td>\n";
	echo "</tr>\n";
}
echo "</table>\n";

echo "<br>\n";
echo "<form name='newteam' action='new_team_rest.php' method='post'>\n";
echo "    <input type='text' name='name' size=30>\n";
echo "    <input type='submit' value='Create New Team'>\n";
echo "</form>\n";

$dbconnect->close();

?>
</body>
</html>
