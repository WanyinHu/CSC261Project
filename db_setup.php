<?php

	$servername  = "localhost";
	$username    = "whu12";
	$password    = "shCAQ-G-";
	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
//	echo "Connection Success!"
?>