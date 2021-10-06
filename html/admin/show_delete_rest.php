<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
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

list($showid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

$query = mysqli_query($dbconnect, "DELETE FROM Availability WHERE ShowID = " . $showid)
   or die (mysqli_error($dbconnect));

$query = mysqli_query($dbconnect, "DELETE FROM Casts WHERE ShowID = " . $showid)
   or die (mysqli_error($dbconnect));

$query = mysqli_query($dbconnect, "DELETE FROM Shows WHERE ID = " . $showid)
   or die (mysqli_error($dbconnect));

$dbconnect->close();
echo "<meta http-equiv='refresh' content='0; admin.php'/>";

?>

</body>
</html>
