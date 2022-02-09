<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Shows SET ";
$sql = $sql . "Date = '" . $_POST['date'] . "', ";
$sql = $sql . "Description  = '" . $_POST['description'] . "', ";
$sql = $sql . "PracticeZoomLink  = '" . $_POST['practicezoomlink'] . "', ";
$sql = $sql . "ShowZoomLink  = '" . $_POST['showzoomlink'] . "', ";
$sql = $sql . "Team  = '" . $_POST['team'] . "' ";

$sql = $sql . " WHERE ID = " .  $_POST['showid'];

echo $sql . "<br>\n";

if ($conn->query($sql) != TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<meta http-equiv=\"refresh\" content=\"15; admin.php\"/>";
}

echo "<meta http-equiv=\"refresh\" content=\"0; admin.php\"/>";

$conn->close();
?>
