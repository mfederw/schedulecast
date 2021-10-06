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

echo "Setting Password to " . $performerinfo['UserName'] . "<br>\n";

$pw_hash = password_hash($performerinfo['UserName'], PASSWORD_DEFAULT);

$sql = "UPDATE Performers SET Password  = '" . $pw_hash . "' WHERE ID = " .  $performerid;

if ($dbconnect->query($sql) != TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<meta http-equiv=\"refresh\" content=\"15; performers.php\"/>";
} else {
  echo "<meta http-equiv=\"refresh\" content=\"3; performers.php\"/>";
}

$dbconnect->close();
?>

</body>
</html>
