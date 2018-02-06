<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>course registration system Login page<</title>
<style type="text/css">
<!--
.style1 {color: #585100}
.style2 {
	color: #436500;
	font-size: 18px;
}
-->
</style>
</head>
<script type="text/vbscript">
a=5
b=4
function greeting()
msgbox ("Your name is ")
if b=1 then
i=hour(time)
elseIf i = 10 then
	document.write("Just started...!")
elseif i = 11 then
	document.write("Hungry!")
elseif i = 12 then
	document.write("Ah, lunch-time!")
elseif i = 16 then
	document.write("Time to go home!")
else
  msgbox("hiiiiiii")
  end if
end function
</script>
 <?php


$host = "localhost";
$user = "root";
$pass = "";
$db_name = "CRS";
$db = mysql_connect($host,$user,$pass)or die("SORRY THERE ARE NO CONNECTION");
mysql_select_db($db_name,$db)or die("THE DATA BASE DON'T EXSIST!");



session_start();
$_SESSION['type']=null; 
$_SESSION['w_color']='White';

if (isset ($fun) && $fun="login")
{				

		$n = $_POST["username"];
			$len = strlen($n);
			if ($len > 0)
	{
		if (empty($_POST["password"]))
			{
			echo ' <script type="text/vbscript"> msgbox ("please enter Your password! ")</script>';
			
			}
		else 
		   { 
		   $name=$_POST["username"];
		   $pass=$_POST["password"];
		   $q="select * from user where username='$name' and password='$pass'";
			$r = mysql_query($q);
			if (mysql_num_rows($r)>0)
				{	

                $record = mysql_fetch_assoc($r);
					$type=$record[type];
					$user=$record[username];
					$user_id=$record[user_id];
					$_SESSION['user']=$user;	
					$_SESSION['id']=$user_id;	
				    $_SESSION['type']=$type; 
				 
					
				 print ' <script type="text/javascript"> alert ("user type  >>>>>: '. $_SESSION['type'] .' ")</script>';
			  	   
				   header("location: main.php");
				   
				}
				else
				echo ' <script type="text/javascript"> alert ("ERROR; wrong user information! ")</script>';
		   
		   
		   
		   
		   
		   
		   }
	
	
	}
	else 
	{   
echo ' <script type="text/vbscript"> msgbox ("please enter Your name! ")</script>';

	}
	
}


?> 
 <body bgcolor="#999232">

<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
<img src="img/بtxt7.png" width="689" height="404"  border="2" align="baseline" />
</center>
<div id="Layer1" style="position:absolute; left:415px; top:120px; width:472px; height:200px; z-index:1; ; layer-background-color: #FFFFFF; border: 1px solid 5px color:#000000;">
  <h1 align="center" class="style1">&nbsp;</h1>
  
  <p>&nbsp;</p>
 

 
 
  <form method="post" name="form" action="index.php?fun=login" >
  
<table width="320" border="0" align="center" >
      <tr>
        <td  colspan="2"><h1 >
          <center >
          <font color="#FFFF22">Login Form</font>
           
          </center>
        </h1></td></tr>
        
        
        

          <tr><td align="center"><strong><font color="#FFFFFF">Username: </font></strong></td>
        <td><strong>
      
          <input type="text" name="username" id="username">
        </strong></td>
      </tr>
      <tr>
        <td align="center"><strong><font color="#FFFFFF">Password:</font></strong></td>
        <td><strong>
            <input type="password" name="password" >
          </strong>
        </td>
      </tr>
      <tr>
        <td height="23" colspan="2" align="center">
           <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="login" value="Login"  ></td>
      </tr></form>

    </table></div>

</body>
</html>
