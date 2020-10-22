<?php
	define('ROOT_URL', 'http://localhost/sandbox/Foodshala/cover/index.php');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_NAME', 'foodshala');
	require('db.php');
	session_start();

	// SANITIZE ALL USER INPUTS
	function sanitize($string) {
		global $conn;
		$string = stripslashes($string); // REMOVES SLASHES
		return mysqli_real_escape_string($conn, $string);
	}

	foreach($_GET as $k=>$v) {
		$_GET[$k] = sanitize($v);
	}
	foreach($_POST as $k=>$v) {
		$_POST[$k] = sanitize($v);
	}