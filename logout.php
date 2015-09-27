<?php 
	session_start();

	session_destroy();
	echo "you have been logged out";
	header("Location: index.php"); /* Redirect browser */

	/* Make sure that code below does not get executed when we redirect. */
	exit;

?>
