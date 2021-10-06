<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<a href="admin.php">Back</a><br>
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

$query = mysqli_query($dbconnect, "SELECT * FROM Shows WHERE Date > '" . date("Y-m-d H:i:s") . "'")
   or die (mysqli_error($dbconnect));

echo "<h1>Upcoming Shows</h1>\n";
echo "<table width='50%'>\n";
echo "  <tr>\n";
echo "    <td align=center colspan=2></td>\n";
echo "    <td align=center><b>Description</b></td>\n";
echo "    <td align=center><b>Date</b></td>\n";
echo "    <td align=center><b>Team</b></td>\n";
echo "  <tr>\n";
while ($showrow = mysqli_fetch_array($query)) {
	echo "  <tr>\n";
	echo "    <td>\n";
	echo "      <a href='cast_show.php?id=" . $showrow['ID'] . "'>Cast Show</a>\n";
	echo "    </td>\n";
	echo "    <td>\n";
	echo "      <a href='edit_show.php?id=" . $showrow['ID'] . "'>Edit Show Details</a>\n";
	echo "    </td>\n";
	echo "    <td align=center>" . $showrow['Description'] . "</td>\n";
	echo "    <td align=center>" . $showrow['Date'] . "</td>\n";
	echo "    <td align=center>" . $team[$showrow['Team']] . "</td>\n";
	echo "    <td>\n";
	echo "      <a href='show_delete_rest.php?id=" . $showrow['ID'] . "'>Delete</a>\n";
	echo "    </td>\n";
	echo "  <tr>\n";
}
echo "</table>\n";
$dbconnect->close();

?>
</body>
</html>
