<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

 <?php
include("config.php");

session_start();?>



<?php 
include("color.php");


?>


<body >

  <div id="sidebar1">
    </div>
	
	
	 <fieldset>
<legend><strong><h1>Change password</h1></strong>
</legend><strong>U<span class="style1">ser name : &nbsp; 
<?php  echo $_SESSION['user']; ?> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
User type: 
<?php  echo $_SESSION['type']; ?> </span></strong><br />
<table border="0" cellSpacing="7" style="width: 342px">
	
  <?php 
  
  if (isset ($fun) && $fun=="Reset" )
  {
$n = $_POST["pw"];
			$len = strlen($n);
			if ($len > 0)
 					{
				   
						   if (empty($_POST["confirm_pw"]))
							echo ' <script type="text/vbscript"> msgbox ("please enter  confirm password! ")</script>';
	
							else
								{  if ($_POST["pw"] != $_POST["confirm_pw"])
												echo ' <script type="text/vbscript"> msgbox ("Password not match with the confirm Password! ")</script>';
											
															
											else{
														
																$id=$_SESSION['id'];
															   $pass=$_POST["pw"];
															   
												$q  = "UPDATE `crs`.`user` SET `password` = '$pass' WHERE `user`.`user_id` = '$id';";											
														
														
																$r = mysql_query($q);
																
																					 if ($r)
									echo ' <script type="text/vbscript"> msgbox ("Successfully Change password")</script>';
																						  else
											echo ' <script type="text/javascript"> alert ("ERROR ! ")</script>';
																													}
								}
							}
				else 
				   {
					echo ' <script type="text/vbscript"> msgbox ("please enter new password  " )</script>';
					 }
				
	  
	  
	  
	  
	  
  
 

  }

  ?>  
    
    <form  method="post" name="form2" action="password.php?fun=Reset">
		<tr>
			<td></td>
		</tr>
		<tr>
			<td>New Password:</td>
			<td>
			<input value="" type="password" name="pw" style="width: 148px" /></td>
		</tr>
		<tr>
			<td>Confirm New Password:</td>
			<td>
			<input value="" type="password" name="confirm_pw" style="width: 147px" /></td>
		</tr>
		<tr>
			<td colSpan="2" align="right"><br />
			<input value="Reset Password" type="submit" name="Submit" /> </td>
		</tr>
	</form>
</table>
</fieldset><br/>
	         

        </body>

</html>
