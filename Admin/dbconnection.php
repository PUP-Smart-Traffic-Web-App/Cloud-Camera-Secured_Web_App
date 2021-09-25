<?php

	$db=mysqli_connect("localhost:3306","root","root","SmartTraffic");  
					/* server name, username, passwor, database name */
	if(!$db) {
	die("Unable to connect :(");
	}

?>