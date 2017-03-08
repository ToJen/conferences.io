<?php
	$validEmail = ereg("\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b", $_POST["email"]);

	if($validEmail) die(header("location:signup.php?invalidEmail=1"));
?>