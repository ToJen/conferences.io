<?php
	// start session
	session_start();

	// unset all session variables
	$_SESSION = array();

	// destroy the session
	session_destroy();

	// redirect user back to index
	die(header("location:index.php"));
?>