<?php
// Always start this first
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	// Already Logged in
	echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";
}

$db_host = "db";
$db_user = "your_mysql_username";
$db_pass = "your_mysql_password";
$db_name = "schedulecast";


if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
	$username = strtolower($_POST['username']);
	//echo "Entered: " . $_POST['username'] . " Using: " . $username . "\n";

        // Getting submitted user data from database
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM Performers WHERE UserName = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->Password ) ) {
    		$_SESSION['user_num'] = $user->ID;
    		$_SESSION['user_id'] = $user->UserName;
    		$_SESSION['admin'] = $user->Admin;

//		print_r( $_SESSION);
//		print_r( $user);

		echo "<meta http-equiv=\"refresh\" content=\"0; user_home.php\"/>";
    	} else {
		echo "Login Failed:  user: " . $username . " pw: " . $_POST['password'] . "\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; login.php\"/>";
	}
    }
} else {
	echo "<form action=\"\" method=\"post\">";
    	echo "<input type=\"text\" name=\"username\" placeholder=\"Enter your username\" required>\n";
    	echo "<input type=\"password\" name=\"password\" placeholder=\"Enter your password\" required>\n";
    	echo "<input type=\"submit\" value=\"Submit\">\n";
	echo "</form>\n";
        echo "<img src=\"images/AIT_logo_no_bg.png\" alt=\"AIT: American Improv Theatre\"><br>";
}
?>
