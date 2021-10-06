<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
if ( $_SESSION['admin'] != 1 ) {
    // Redirect them to the login page
    header("Location: ../login.php");
}

if ( $_POST['name'] == "" ) {
	echo "<meta http-equiv=\"refresh\" content=\"0; admin.php\"/>";
} else {
	$hostname = "db";
	$username = "your_mysql_username";
	$password = "your_mysql_password";
	$db = "schedulecast";

	$conn=mysqli_connect($hostname,$username,$password,$db);

	if ($conn->connect_error) {
	  die("Database connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO Teams (Name) VALUES( '" . $_POST['name'] . "')";

	if ($conn->query($sql) == TRUE) {
		echo "<meta http-equiv=\"refresh\" content=\"0; admin.php\"/>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<meta http-equiv=\"refresh\" content=\"15; admin.php\"/>";
	}

	$conn->close();
}
?>
