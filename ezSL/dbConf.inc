<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "crs";

	$link = mysql_pconnect($host, $user, $pass);
	mysql_select_db($database, $link);
?>