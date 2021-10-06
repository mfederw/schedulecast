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

$teamquery = mysqli_query($dbconnect, "SELECT * FROM Teams")
   or die (mysqli_error($dbconnect));

while ($teamrow = mysqli_fetch_array($teamquery)) {
	$team[$teamrow['ID']] = $teamrow['Name'];
}

?>

<table border="1" cellspacing="0" cellpadding=5>
<tr>
  <td></td>
  <td align=center colspan=2><b>Name</b></td>
  <td align=center><b>Email Address</b></td>
  <td align=center><b>User Name</b></td>
  <td align=center><b>Teams</b></td>
  <td align=center><b>Admin</b></td>
  <td colspan=3></td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT * FROM Performers ORDER BY NameLast")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td align=center><a href='performer_edit.php?id=" . $row['ID'] . "'>View/Edit</a></td>\n
    <td align=center>{$row['NameFirst']}</td>\n
    <td align=center>{$row['NameLast']}</td>\n
    <td align=center>{$row['Email']}</td>\n
    <td align=center>{$row['UserName']}</td>\n
    <td align=center>\n";

    $teammemberquery = mysqli_query($dbconnect, "SELECT * FROM TeamMembership where Performer = " . $row['ID'])
   	or die (mysqli_error($dbconnect));

    while ($teammemberrow = mysqli_fetch_array($teammemberquery)) {
	echo $team[$teammemberrow['Team']] . "<br>";
    }

    echo "</td>";
    $val = "No";
    if ($row['Admin'] == 1) {
    	$val = "Yes";
    }
    echo "<td align=center><a href='performer_admin.php?id=" . $row['ID'] . "'>" . $val . "</a></td>\n";
    echo "<td align=center><a href='performer_pwreset.php?id=" . $row['ID'] . "'>Password Reset</a></td>\n";
    echo "<td align=center><a href='performer_delete.php?id=" . $row['ID'] . "'>Delete</a></td>\n";
    echo "</tr>\n";
}
?>

</table>

</body>
</html>
