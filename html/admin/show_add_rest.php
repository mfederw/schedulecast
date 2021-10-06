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

$showdate = $_POST['year'] . "-" .  $_POST['month'] . "-" .  $_POST['day'] . " 20:00:00";

$sql = "INSERT INTO Shows (Date, Description, PracticeZoomlink, ShowZoomLink, Team) VALUES ('" . $showdate . "', '" . $_POST['Name'] . "', '" . $_POST['zoompractice'] . "', '" . $_POST['zoomshow'] . "', '" . $_POST['team'] . "')";

// echo $sql . "<br>\n";

if ($conn->query($sql) == TRUE) {
  echo "<meta http-equiv=\"refresh\" content=\"0; admin.php\"/>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<meta http-equiv=\"refresh\" content=\"15; admin.php\"/>";
}

$conn->close();
?>
