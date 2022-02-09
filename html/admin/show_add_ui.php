<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
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

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

$date = getdate();

?>

<a href="admin.php">Cancel</a><br>
<img src="../images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">
<h1>Add a new show</h1>
<form name='register' action='show_add_rest.php' method='post'>
<table>
  <tr>
    <td>Show Name:</td>
    <td><input type='text' name='Name'></td>
  </tr>
  <tr>
    <td>Show Date:</td><td><select id="years" name="year">
<?php
		for ($i = $date['year']; $i < $date['year'] + 3 ; $i++) {
			echo "<option value='" . $i . "'>" . $i . "</option>";
		}
?>
		</select>
    <select id="months" name="month">
<?php
$months = array("", "Janurary", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

for ($i = 1 ; $i < 13 ; $i++) {
	if ($date['mon'] == $i) {
		echo "<option selected=true value='". $i . "'>" . $date['month'] . "</option>";
	} else {
		echo "<option value='". $i . "'>" . $months[$i] . "</option>";
	}
}
echo "</select>\n";
echo "<select id='days' name='day'>\n";

for ($i = 1; $i < 32 ; $i++) {
	if ( $date['mday'] == $i) {
		echo "<option selected=true value='" . $i . "'>" . $i . "</option>";
	} else {
		echo "<option value='" . $i . "'>" . $i . "</option>";
	}
}
echo "</select>\n";
echo "</td>\n";
echo "<td><tr>\n";
echo "<td>Hour (Military Time):</td>\n";
echo "<td>\n";
echo "<select id='hours' name='hour'>\n";
for ($i = 0; $i < 25 ; $i++) {
	if ( $i == 20 ) {
		echo "<option selected=true value='" . $i . "'>" . $i . "</option>";
	} else {
		echo "<option value='" . $i . "'>" . $i . "</option>";
	}
}
echo "</select>\n";
echo ":";

echo "<select id='minutes' name='minute'>\n";
for ($i = 0; $i < 60 ; $i += 15) {
	printf("<option value=%d>%02d</option>\n", $i, $i);
}
echo "</select>\n";

echo "</td>\n";
echo "</tr>\n";
echo "<tr>\n";
?>
    </td>
  </tr>
  <tr>
    <td>Practice Zoom Link:</td><td><input type='text' size=90 name='zoompractice' value='None'></td>
  </tr>
  <tr>
    <td>Show Zoom Link:</td><td><input type='text' size=90 name='zoomshow' value='None'></td>
  </tr>
  <tr>
    <td>Team:</td>
    <td><select id="team" name="team">

<?php
$query = mysqli_query($dbconnect, "SELECT * FROM Teams")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo "<option value='" . $row['ID'] . "'>". $row['Name'] . "</option>\n";
}
?>
    </select></td>
  </tr>
  <tr>
    <td colspan=2 align=center><input type='submit' value='Add'></td>
  </tr>
</table>
</form>
</html>
