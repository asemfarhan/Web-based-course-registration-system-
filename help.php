<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:p="urn:schemas-microsoft-com:office:powerpoint" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

 <?php
include("config.php");

session_start();


?>




</head>


<?php 
include("color.php");
?>



<body>

  <div class="style5">

  <div id="sidebar1">
    </div>
  <h1>	Help</h1>

			<?php 

header("location: catagry\help_".$_SESSION['type'].".php" );

	?>
    
        </div>
        </body>

</html>
