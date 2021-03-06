<?php
session_start();
if ( $_SESSION['admin'] != 1 ) {
    // Redirect them to the login page
    header("Location: ../login.php");
}

?>

<html>
<table width='50%'>
  <tr>
    <td><a href="admin.php">Back</a></td>
  </tr>
</table>

<img src="../images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">

<?php

$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

list($showid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

$sql = "SELECT * FROM Shows WHERE ID = " . $showid;
$query = mysqli_query($conn, $sql)
   or die (mysqli_error($conn));

$row = mysqli_fetch_array($query);

$showdate = new DateTime($row['Date']);
$datef =  $showdate->format("M j, Y g:i A");

echo "<hr>\n";
echo "<h1>Show: " . $row['Description'] . "</h1>";
echo "<b><font size='+1'>" . $datef . "</font></b><br>\n<br>";

echo "<form name='register' action='edit_show_rest.php' method='post'>\n";
echo "  <input type='hidden' name='showid' value='" . $row['ID'] . "'>\n";
echo "<table>\n";
echo "  <tr>\n";
echo "    <td>Date:</td>";
echo "    <td><input type='text' name='date' value='" . $row['Date'] . "'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Description:</td>";
echo "    <td><input type='text' name='description' value='" . $row['Description'] . "'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Practice Zoom Link:</td>";
echo "    <td><input type='text' name='practicezoomlink' size=90 value='" . $row['PracticeZoomLink'] . "'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Show Zoom Link:</td>";
echo "    <td><input type='text' name='showzoomlink' size=90 value='" . $row['ShowZoomLink'] . "'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Team:</td>";
echo "    <td><select id='team' name='team'>";

$teamquery = mysqli_query($conn, "SELECT * FROM Teams")
   or die (mysqli_error($conn));

while ($teamrow = mysqli_fetch_array($teamquery)) {
  if ($teamrow['ID'] == $row['Team']) {
    echo "<option selected=true value='" . $teamrow['ID'] . "'>". $teamrow['Name'] . "</option>\n";
  } else {
    echo "<option value='" . $teamrow['ID'] . "'>". $teamrow['Name'] . "</option>\n";
  }
}

$conn->close();

echo "    </select></td>";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td></td>\n";
echo "    <td></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td></td>\n";
echo "    <td align=left><input type='submit' value='Submit Changes'></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "</form>\n";
?>
</html>
