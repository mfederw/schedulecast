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

if ( $_POST['todo'] == "add" ) {
	$sql = "INSERT into TeamMembership VALUES( " . $_POST['performerid'] . ", " . $_POST['team'] ." )";
	if ($conn->query($sql) != TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "<meta http-equiv='refresh' content='15; performer_edit.php?id=" . $_POST['performerid'] . ".php'/>";
	}
}

if ( $_POST['todo'] == "remove" ) {
	echo "REMOVE " . $_POST['todo'] . " " . $_POST['performerid'] . " " . $_POST['team'];
	$sql = "DELETE FROM TeamMembership WHERE Performer = " . $_POST['performerid'] . " AND Team = " . $_POST['team'];
	if ($conn->query($sql) != TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "<meta http-equiv='refresh' content='15; performer_edit.php?id=" . $_POST['performerid'] . ".php'/>";
	}
}

$conn->close();
echo "<meta http-equiv='refresh' content='0; performer_edit.php?id=" . $_POST['performerid'] . "'/>";
?>
