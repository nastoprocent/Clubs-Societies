<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'clubsandsocs';
	
	
	$conn = mysql_connect($dbHost, $dbUsername, $dbPassword, $dbName);
	$dbcon = mysql_select_db($dbName);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
	
	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>