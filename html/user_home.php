<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>

<html>

<?php

echo "<table width='50%'><tr>";
echo "<td>User: " . $_SESSION['user_id'] . "</td>\n";
if ( $_SESSION['admin'] == 1 ) {
	echo "<td><a href=\"admin/admin.php\">Admin</a></td>\n";
}
echo "<td><a href=\"profile.php\">Edit Profile</a></td>";
echo "<td><a href=\"logout.php\">Log out</a></td>";
echo "</tr></table>";
echo "<img src='images/AIT_logo_no_bg.png' alt='AIT: American Improv Theatre'><br>\n";

$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Casts WHERE Performer = " . $_SESSION['user_num'];
// AND DATE >= TODAY

$query = mysqli_query($conn, $sql)
   or die (mysqli_error($conn));

$sql = "SELECT * FROM Shows WHERE Date > '" . date("Y-m-d H:i:s") . "' ORDER BY Date";
$sql = "SELECT * FROM Shows";

$showquery = mysqli_query($conn, $sql)
   or die (mysqli_error($conn));

$first = 1;

while ($showrow = mysqli_fetch_array($showquery)) {
	$sql2 = "SELECT * FROM Casts WHERE ShowID = " . $showrow['ID'] . " AND Performer = " . $_SESSION['user_num'];
	$query2 = mysqli_query($conn, $sql2)
   		or die (mysqli_error($conn));
	while ($castrow = mysqli_fetch_array($query2)) {
		if ($first == 1) {
			echo "<h1>You are cast in the following shows</h1>";
			echo "<table cellpadding=5>\n";
			echo "<tr><td align=center><b>Show</b></td><td align=center><b>Date</b></td><td align=center><b>Practice Zoom Link</b></td><td align=center><b>Show Zoom Link</b></td></tr>\n";
			$first = 0;
		}
		echo "<tr><td align=center>" . $showrow['Description'] . "</td><td align=center>" . $showrow['Date'] . "</td>\n";
		if ( $showrow['PracticeZoomLink'] != 'None' ) {
			echo "<td align=center><a href='" . $showrow['PracticeZoomLink'] . "' target='_blank'>Practice</a></td>\n";
		} else {
			echo "<td align=center>Not Provided</td>\n";
		}
		if ( $showrow['ShowZoomLink'] != 'None' ) {
			echo "<td align=center><a href='" . $showrow['ShowZoomLink'] . "' target='_blank'>Show</a></td></td>\n";
		} else {
			echo "<td align=center>Not Provided</td>\n";
		}
		echo "</tr>\n";
	}
}
if ($first == 0) {
	echo "</table>\n";
}

$sql = "SELECT * FROM TeamMembership WHERE Performer = " . $_SESSION['user_num'];

$query = mysqli_query($conn, $sql)
   or die (mysqli_error($conn));

$sql2 = "";
while ($row = mysqli_fetch_array($query)) {
	if ($sql2 == "") {
		$sql2 = "SELECT * FROM Shows WHERE Date > '" . date("Y-m-d H:i:s") . "' AND Team = " . $row['Team'];
	} else {
		$sql2 = $sql2 . " OR Team = " . $row['Team'];
	}
}

if ($sql2 != "") {
	$sql2 = $sql2 . " ORDER BY DATE";
	$query2 = mysqli_query($conn, $sql2)
   		or die (mysqli_error($conn));
	$first = 1;
	while ($showrow = mysqli_fetch_array($query2)) {
		if ($first == 1) {
			echo "<h1>Verify availability for the following shows</h1>\n";
			echo "<table border = 0 cellpadding=7>\n";
			echo "<tr align=center><td><b>Show</b></td><td><b>Date</b></td><td><b>Availability</b></td><td></td></tr>\n";
			echo "<form name='available' action='set_available_rest.php' method='post'>\n";
			$first = 0;
		}
//		$sql3 = "SELECT Available FROM Availability WHERE Performer = " . $_SESSION['user_num'] ;
		$sql3 = "SELECT * FROM Availability WHERE Performer = " . $_SESSION['user_num']	. " AND ShowID = " . $showrow['ID'];
//		echo $sql3 . "<br>\n";
		$query3 = mysqli_query($conn, $sql3)
			or die (mysqli_error($conn));

		$value = "Unavailable";
		if ($availrow = mysqli_fetch_array($query3)) {
			$status = $availrow['Available'];
			if ($status == 0) {
				$value = "Unavailible";
			} else {
				$value = "Available";
			}
			$note = "";
		} else {
			$value = "Unavailable";
			$note = "New";
		}

		$shownum = $showrow['ID'];

		echo "<tr align=center><td align=center>" . $showrow['Description'] . "</td><td>" . $showrow['Date'] . "</td>\n<td>\n";
		echo "  <hidden name='shownum" . $shownum . "' value='" . $showrow['ID'] . "'>\n";
		echo "  <select id='show" . $shownum . "' name='availability" . $shownum . "'>\n";
		if ($value == "Unavailable") {
			echo "    <option value=0 selected>Unavailable</option>\n";
		} else {
			echo "    <option value=0>Unavailable</option>\n";
		}
		if ($value == "Available") {
			echo "    <option value=1 selected>Available</option>\n";
		} else {
			echo "    <option value=1>Available</option>\n";
		}
		echo "  </select>\n";
		echo "</td><td><font color='red'>$note</font></td></tr>\n";
	}
	if ($first == 0) {
		echo "<tr><td></td><td></td><td><input type='submit' value='Update Availabilty'></td></tr>\n";
		echo "</form>\n";
		echo "</table>\n";
	}
}
$conn->close();

//$date = date_create();
//$date->sub(new DateInterval('P2D'));
//echo date_format($date, "Y-m-d H:i:s") . "\n";

?>
	<p>This website runs completely on Mike's Private machine.  None of this
	data will be seen by anyone other than Mike.</p>
</html>
