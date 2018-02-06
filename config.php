<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "CRS";
$db = mysql_connect($host,$user,$pass)or die("SORRY THERE ARE NO CONNECTION");
mysql_select_db($db_name,$db)or die("THE DATA BASE DON'T EXSIST!");

session_start();
if( !$_SESSION['user'] )
	{die("_SESSION[] not run");}

 if ($_SESSION['type']==null)
 {echo ' <script type="text/vbscript"> confirm ("please isert your information" )</script>';
		   header("location: index.php") or die("THE PAGE DON'T EXSIST!");
						   }

?>
