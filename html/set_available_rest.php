<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
if ( isset( $_SESSION['user_num'] ) ) {
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

foreach ($_REQUEST as $key => $value) {
	//echo "Available: " . $key . " Value: " . $value . "<br>\n";
	list($show) = sscanf($key, "availability%d");
	//echo "Performer: " . $_SESSION['user_num'] . " Show: " . $show . " Available: " . $value . "<br>\n";
	
	// get current value
	$sql = "SELECT * FROM Availability WHERE Performer = " . $_SESSION['user_num'] . " AND ShowID = " . $show ;
	// echo $sql . "<br>\n";
	$checkquery = mysqli_query($conn, $sql)
		or die (mysqli_error($conn));

	if ($availrow = mysqli_fetch_array($checkquery)) {
		$indb = true;
		$status = $availrow['Available'];
	} else {
		$indb = false;
		$status = 0;
	}
	if ( $indb && ($status != $value) ) {
		$sql = "DELETE FROM Availability WHERE Performer = " . $_SESSION['user_num'] . " AND ShowID = " . $show ;
		if ($conn->query($sql) != TRUE) {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		  echo "<meta http-equiv=\"refresh\" content=\"15; user_home.php\"/>";
		}
	}
	if ( ( $indb == false) || ($status != $value)) {
		$sql = "INSERT INTO Availability (Performer, ShowID, Available) VALUES (" . $_SESSION['user_num'] . ", " . $show . ", $value)";
		//echo "SQL: " . $sql . "\n";
		if ($conn->query($sql) != TRUE) {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		  echo "<meta http-equiv=\"refresh\" content=\"15; user_home.php\"/>";
		}
	}
}

$conn->close();
echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";
?>
