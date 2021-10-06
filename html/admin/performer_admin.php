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

list($performerid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

$query = mysqli_query($dbconnect, "SELECT * FROM Performers WHERE ID = " . $performerid)
   or die (mysqli_error($dbconnect));

$performerinfo = mysqli_fetch_array($query);

if ( $performerinfo['Admin'] == 1 ) {
	$sql = "UPDATE Performers SET Admin = 0 WHERE ID = " . $performerid ;
} else {
	$sql = "UPDATE Performers SET Admin = 1 WHERE ID = " . $performerid ;
}

$query = mysqli_query($dbconnect, $sql)
   or die (mysqli_error($dbconnect));

$dbconnect->close();
?>

<meta http-equiv='refresh' content='0; performers.php'/>
</body>
</html>
