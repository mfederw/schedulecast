<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
	// Already Logged in
	echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Base Page</title>
</head>
<body>
<table width='50%'>
<tr>
	<td><a href='login.php'>Login</a></td>
	<td><a href='register_ui.php'>Register</a></td>
</tr>
</table>
<img src="images/AIT_logo_no_bg.png" alt="AIT: American Improv Theatre">
<br>
<h1>Cast Scheduling for AIT Shows</h1>
Interested?<br>
<a href="mailto:mike@federwisch.us">Email me</a>
</body>
</html>
