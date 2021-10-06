<?php
// Always start this first
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	session_unset();
	echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
}
?>
