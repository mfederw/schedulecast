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
<table width='50%'>
  <tr>
    <td><a href='user_home.php'>Back</a></td>
  </tr>
</table>

<img src="images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">

<?php
echo "<h1>User: " . $_SESSION['user_id'] . "</h1>\n";


$hostname = "db";
$username = "your_mysql_username";
$password = "your_mysql_password";
$db = "schedulecast";

$conn=mysqli_connect($hostname,$username,$password,$db);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Performers WHERE ID = " . $_SESSION['user_num'] . " LIMIT 1";
$query = mysqli_query($conn, $sql)
   or die (mysqli_error($conn));

$row = mysqli_fetch_array($query);
	$conn->close();

echo "<form name='register' action='profile_rest.php' method='post'>\n";
echo "<table>\n";
echo "  <tr>\n";
echo "    <td>Username:</td>";
echo "    <td><input type='text' name='UserName' value='" . $row['UserName'] . "'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Password:</td><td><input type='password' name='Password'><br>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>First Name:</td><td><input type='text' value='" . $row['NameFirst'] . "' name='FirstName'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Last Name:</td><td><input type='text' value='" . $row['NameLast'] . "' name='LastName'><br></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td>Email Address:</td><td><input type='text' value='" . $row['Email'] . "' name='Email'></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td></td>\n";
echo "    <td align=center><input type='submit' value='Submit Changes'></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "</form>\n";
?>
	<p>This website runs completely on Mike's Private machine.  None of this
	data will be seen by anyone other than Mike.</p>
</html>
