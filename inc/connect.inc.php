<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'log_db');
	define('DB_USER','root');
	define('DB_PASSWORD','root');
	

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL________: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL______: " . mysql_error());
?>