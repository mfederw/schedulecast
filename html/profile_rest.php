<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: login.php");
}

$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Performers SET ";
$sql = $sql . "ID = " . $_SESSION['user_num'] . ", ";
$sql = $sql . "NameFirst = '" . $_POST['FirstName'] . "', ";
$sql = $sql . "NameLast  = '" . $_POST['LastName'] . "', ";
$sql = $sql . "Email  = '" . $_POST['Email'] . "', ";
$sql = $sql . "UserName  = '" . $_POST['UserName'] . "' ";

if ( $_POST['Password'] != "" ) {
	$pw_hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
	$sql = $sql . ", Password  = '" . $pw_hash . "' ";
}
$sql = $sql . " WHERE ID = " .  $_SESSION['user_num'];

echo $sql . "<br>\n";

if ($conn->query($sql) != TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<meta http-equiv=\"refresh\" content=\"15; index.php\"/>";
}

echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";

$conn->close();
?>
