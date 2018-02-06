<?
session_start();
session_destroy(); //logs out
session_unregister('username'); 
header ("Location: index.php");
?>