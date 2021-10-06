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
		for ($i = 2021; $i < 2025 ; $i++) {
			echo "<option value='" . $i . "'>" . $i . "</option>";
		}
?>
		</select>
    <select id="months" name="month">
		<option value='01'>Jan</option>
		<option value='02'>Feb</option>
		<option value='03'>Mar</option>
		<option value='04'>Apr</option>
		<option value='05'>May</option>
		<option value='06'>Jun</option>
		<option value='07'>Jul</option>
		<option value='08'>Aug</option>
		<option value='09'>Sep</option>
		<option value='10'>Oct</option>
		<option value='11'>Nov</option>
		<option value='12'>Dec</option>
		</select>
		<select id="days" name="day">
<?php
		for ($i = 1; $i < 32 ; $i++) {
			echo "<option value='" . $i . "'>" . $i . "</option>";
		}
?>
		</select></td>
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
