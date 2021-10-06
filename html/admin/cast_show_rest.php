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
	// First Remove if it exists
	$sql = "DELETE FROM Casts WHERE Performer = " . $_POST['performerid'] . " AND ShowID = " . $_POST['showid'];
	if ($conn->query($sql) != TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "<meta http-equiv='refresh' content='15; shows.php'/>";
	}

	$sql = "INSERT INTO Casts (ShowID, Performer) VALUES (" . $_POST['showid'] . ", " . $_POST['performerid'] . ")";
	if ($conn->query($sql) != TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "<meta http-equiv='refresh' content='15; shows.php'/>";
	}
}

if ( $_POST['todo'] == "remove" ) {
	$sql = "DELETE FROM Casts WHERE Performer = " . $_POST['performerid'] . " AND ShowID = " . $_POST['showid'];
	if ($conn->query($sql) != TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "<meta http-equiv='refresh' content='15; shows.php'/>";
	}
}

$conn->close();
echo "<meta http-equiv='refresh' content='0; cast_show.php?id=" . $_POST['showid'] . "'/>";
?>
