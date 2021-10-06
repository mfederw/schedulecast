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

phpinfo();

?>
	<p>This website runs completely on Mike's Private machine.  None of this
	data will be seen by anyone other than Mike.</p>
</html>
