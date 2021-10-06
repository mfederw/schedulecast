<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	// Already Logged in
	echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";
}

$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

$username = strtolower($_POST['UserName']);

// Check to see if the userid already exists
// $sql = "SELECT * FROM  Performers Where Username = '" .  $username . "'";

// $showrow = mysqli_fetch_array($showquery);

$pw_hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO Performers (NameFirst, NameLast, Email, Username, Password)
VALUES ('" . $_POST['FirstName'] . "', '" . $_POST['LastName'] . "', '" . $_POST['Email'] . "', '" . $username . "', '" . $pw_hash . "')";

if ($conn->query($sql) === TRUE) {
  echo "<meta http-equiv=\"refresh\" content=\"0; login.php\"/>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<meta http-equiv=\"refresh\" content=\"15; index.php\"/>";
}

$conn->close();
?>
