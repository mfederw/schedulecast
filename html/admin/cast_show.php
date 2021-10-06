<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<a href="admin.php">Back</a><br>
<img src="../images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">
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

// Populate the Team Names
$teamquery = mysqli_query($dbconnect, "SELECT * FROM Teams")
   or die (mysqli_error($dbconnect));

while ($teamrow = mysqli_fetch_array($teamquery)) {
        $team[$teamrow['ID']] = $teamrow['Name'];
        $ismember[$teamrow['ID']] = false;
}

// Populate the Performer Names
$perfquery = mysqli_query($dbconnect, "SELECT * FROM Performers")
   or die (mysqli_error($dbconnect));

while ($perfrow = mysqli_fetch_array($perfquery)) {
        $performer[$perfrow['ID']] = $perfrow['NameFirst'] . " " . $perfrow['NameLast'];
}
list($showid) = sscanf($_SERVER['QUERY_STRING'], "id=%d");

$query = mysqli_query($dbconnect, "SELECT * FROM Shows WHERE ID = " . $showid)
   or die (mysqli_error($dbconnect));

while ($showrow = mysqli_fetch_array($query)) {

	// Get the Cast for this show
	$castsql = "SELECT * FROM Casts WHERE ShowID = " . $showrow['ID'] ;
	$castquery = mysqli_query($dbconnect, $castsql)
	    or die (mysqli_error($dbconnect));

	$cast = array();
	while ($castrow = mysqli_fetch_array($castquery)) {
		array_push($cast, $castrow['Performer']);
	}

	  echo "<hr>\n";
	  echo "<h2 id='show" . $showrow['ID'] . "'><b>" . $showrow['Description'] . "</b> ";
	  echo "<b>" . $showrow['Date'] . "</b> ";
	  echo "<b>" . $team[$showrow['Team']] . "</b></h2>\n";

	  $sql = "SELECT * FROM Availability WHERE ShowID = " . $showrow['ID'] . " AND Available = 1";

	  $query2 = mysqli_query($dbconnect, $sql)
	    or die (mysqli_error($dbconnect));


	  echo "<h3>Available Performers</h3>\n";
	  echo "<table>\n";
	  while ($availrow = mysqli_fetch_array($query2)) {
	    echo "<tr>\n";
	    echo "<td valign=top>" . $performer[$availrow['Performer']] . "</td>\n";
	    echo "<td valign=top>\n";

	    if ( in_array($availrow['Performer'], $cast) ) {
	    	echo "";
	    } else {
		echo "<form name='castchange' action='cast_show_rest.php' method='post'>\n";
		echo "  <input type='hidden' name='showid' value='" . $showid . "'>";
		echo "  <input type='hidden' name='performerid' value='" . $availrow['Performer'] . "'>";
		echo "  <input type='hidden' name='todo' value='add'>";
		echo "  <input type='submit' value='Cast'>\n";
		echo "</form>\n";
	    }

	    echo "</td>\n";
	    echo "</tr>\n";
	  }
	  echo "</table>\n";

	  echo "<h3>Cast</h3>\n";
	  echo "<table>\n";
	  foreach ($cast as &$member) {
	    echo "<tr>\n";
	    echo "<td valign=top>" . $performer[$member] . "</td>\n";
	    echo "<td valign=top>\n";
	    echo "<form name='castchange' action='cast_show_rest.php' method='post'>\n";
	    echo "  <input type='hidden' name='showid' value='" . $showid . "'>";
	    echo "  <input type='hidden' name='performerid' value='" . $member . "'>";
	    echo "  <input type='hidden' name='todo' value='remove'>";
	    echo "  <input type='submit' value='Uncast'>\n";
	    echo "</form>\n";
	    echo "</td>\n";
	    echo "</tr>\n";
	  }
	  echo "</table>\n";
  }
?>


</body>
</html>
