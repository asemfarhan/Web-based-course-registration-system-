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
  <h1>	Create New News</h1>


        <fieldset>
<legend><strong> <h3>New News</h3> </strong>
</legend>
<form action="Manage_news.php?fun=pup" method="post">

<table border="0" cellSpacing="7"  align="center" width="%70">
	<tr>
		<td>News title:</td>
		<td  ><input type="text" size="100" name="title" /></td>
	</tr>	
    <tr>
		<td>News Content:</td>
	  <td  ><textarea name="content" wrap="soft" cols="90" rows="13"></textarea></td><td></td>
	</tr>
	<tr>   
    

    
    
		<td colSpan="2"  align="center"><br />
	 <input value="Publish" align="" type="submit" /> <br />		</td>
	</tr>
</table>
</form>
</fieldset>
<?php 

if (isset ($fun) && $fun="pup")
{
				
		$con = $_POST["content"];
		$title = $_POST["title"];

 if (strlen($con) > 2000) 
 	{echo ' <script type="text/vbscript"> alert ("The content text is more 2000 char   ")</script>';
 			exit;}
 

if (empty($_POST["content"]))
				{
				echo ' <script type="text/vbscript"> alert ("please enter  content of this news   ")</script>';
				
				}
			else 
			   {
					
					$q="INSERT INTO news
					VALUES (
					NULL , '$title', '".nl2br($con)."' )       ";
					
		if (empty($_POST["title"]))
				{

						$q="INSERT INTO news
						VALUES (
						NULL , 'News', '".nl2br($con)."' )       ";
					}

					
									$r = mysql_query($q);
											 if ($r)
														echo ' <script type="text/vbscript"> msgbox ("Successful create new news ")</script>';
																					  else
																						  echo "ERROR";

					
					}
					

}

?>
        </body>

</html>
