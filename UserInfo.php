 <?php
include("config.php");

session_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User information</title>



<style type="text/css"> 

P {
	FONT-WEIGHT: normal; FONT-SIZE: 11px; COLOR: #333333; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
.asem{
		color:#999999;
	background-position:right;
	background-position:850px;
	background-repeat:no-repeat;
}
 .co select {
   width: 300px;
   height: 200px;
  }
 .co  a {
   display: block;
   border: 1px solid #aaa;
   text-decoration: none;
   background-color: #fafafa;
   color: #123456;
   margin: 2px;
   clear:both;
  }
.style5 {
	color: #663300;
}
</style>

</head>

<?php

if (isset ($fun) && $fun="Add")
{
				
		$n = $_POST["user"];
		$len = strlen($n);
	if ($len > 0)
	{
			if (empty($_POST["pw"]))
				{
				echo ' <script type="text/vbscript"> msgbox ("please enter  password   ")</script>';
				
				}
			else 
			   {
			   
					   if (empty($_POST["confirm_pw"]))
						echo ' <script type="text/vbscript"> msgbox ("please enter  confirm password! ")</script>';

						else
							{  if ($_POST["pw"] != $_POST["confirm_pw"])
											echo ' <script type="text/vbscript"> msgbox ("Password not match with the confirm Password! ")</script>';
										
														
										else{
														 if ($_POST["usertype"]== "Select User Type")
															echo ' <script type="text/vbscript"> msgbox ("please  select user type! ")</script>';
														
																		
														else{
															$name=$_POST["user"];
														   $pass=$_POST["pw"];
														   $usertype=$_POST["usertype"];
											 $q1="select username from user where username='$name'";
											  $r1 = mysql_query($q1);
											$num = mysql_num_rows($r1);
													if($num > 0)
														   { echo ' <script type="text/vbscript"> msgbox ("User : ' . $name . ' alraedy exist ")</script>';}
														   else{
														   
 									//////////////////student
												if ($_POST["usertype"]== "student")
													{ 
							 
													if (empty($_POST["studentid"]))
													echo ' <script type="text/vbscript"> msgbox ("enter student ID ")</script>';
													else
													{
													$studentid=$_POST["studentid"];
								$qq="select * from student where student_id='$studentid' ";
								 $r11 = mysql_query($qq);
								$num1 = mysql_num_rows($r11);
								 if($num1 > 0)
								  { $q = "INSERT INTO `crs`.`user` (`user_id`, `username`, `type`, `password`) VALUES ('$studentid', '$name', '$usertype', '$pass');";
																	$r = mysql_query($q);
																													 if ($r)
														echo ' <script type="text/vbscript"> msgbox ("Successful create new user : '. $name . '")</script>';
																					  else
																						  echo "ERROR";
															}
								 else
														    echo ' <script type="text/vbscript"> msgbox ("Wrong student ID  ")</script>';
														   

											
													
													}
													
													}//end student 	   

											else {
											$q = "INSERT INTO `crs`.`user` (`user_id`, `username`, `type`, `password`) VALUES (NULL, '$name', '$usertype', '$pass');";
															$r = mysql_query($q);
															
																				 if ($r)
														echo ' <script type="text/vbscript"> msgbox ("Successful create new user : '. $name . '")</script>';
																					  else
																						  echo "ERROR";
													}
													}
									}
								}
						  	}
					
				  }		
								   
			   
			 }
	
	

	else 
	{   
echo ' <script type="text/vbscript"> msgbox ("please enter Your name! ")</script>';

	}
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset ($fund) && $fund="Del")
	{
		
		

			$id=$_POST["hed"];
					$q = "delete from `user` where `user`.`user_id`='$id';";
															$r = mysql_query($q);
																					
																 if ($r)
															echo ' <script type="text/vbscript"> msgbox ("Successful delete  user ")</script>';
															  else
															  echo "error";
		

			
			
	}

?> 



<?php 
include("color.php");
?>


<body>




  <div id="sidebar1">
    </div>
	<h1>Users information </h1>
	



        <fieldset>
<legend><strong> <h3>New User</h3> </strong>
</legend>
<form action="Userinfo.php?fun=Add" onSubmit="return chik(usertype)" method="post">

<table border="0" cellSpacing="7" width="%50">
	<tr>
		<td>Username:</td>
		<td style="width: 453px"><input name="user" /></td>
	</tr>
	<tr>
		<td>Password: </td>
		<td style="width: 453px"><input value="" type="password" name="pw" />
		</td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td style="width: 453px">
		<input value="" type="password" name="confirm_pw" /></td>
	</tr>
	<tr>
		<td>Type:</td>
		<td ><select name="usertype" id="usertype"> 
        		<option selected="" value="Select User Type">Select User Type</option>
		<option   value="student" >
		student</option>
		<option onclick="javascript: $('#project').hide('medium'); " value="registrar">
		registrar</option>
		<option onclick="javascript: $('#project').hide('medium');" value="admin">
		Admin</option>
        </select></td>
   </tr>
     <tr><td></br> 
     <input   type="checkbox"  onclick="addP()"/>Add student ID
    </td>
    <td></br> <input type="text" value=""  id="studentid" name="studentid" disabled="disabled" /> 
</td>
</tr>
	<tr>
		<td colSpan="2" align="middle"><br />
		&nbsp;&nbsp;&nbsp; <input value="Add" type="submit" name="Submit3" /> <br />
		</td>
	</tr>


			<script language="javascript">
            var iii=1;
			function addP() {
            
			if(iii==1)
			{
			document.getElementById("studentid").disabled="";
            iii++;
			}
			else
			{document.getElementById("studentid").disabled="disabled";
			iii=1;
			}
			//append("<input type=\"text\" name=\"kk\" ><a href='#' onClick='removeFormField(\"#row" "\"); return false;'>Remove</a>");
            //document.getElementById("id_pre").value = ;
            }
			
			
			
			function chik(c)
			{
	/*	var dt=document.getElementsByName('usertype').value;
				alert(dt);
if (dt.equals('student'))
					{
								alert("2");

					 f=document.getElementById('studentid').disabled;
					if (f=="disabled")
					{alert("enter student id");
					return false;}
				else
					return true;
				}
					alert("3");*/
			return true;
			}
            </script>

</table></form>
</fieldset>











        </fieldset>
        <br/>


	     <fieldset   style="width: 879px">
   
    <legend> <strong><h5><font size="+2">  Users information </font></h5></strong></legend>    


	<table  align="center">
		<tr>
				<td style="width: 158px">
				<table  border="1"  width="600"align="center"><ol type="1">
					<tr>
						<th >NO</th>
						<th >NAME</th>
						<th >TYPE</th>
<th >PASSWORD</th>

						<th  width="40"  >DELETE</th>
					</tr>
				
			<script type="text/javascript">
		function con()
		{
		// You can change 30 and 0.3 to suit your 'tastes' :)
		bo = document.getElementsByTagName('hed').value;



	var mmm=confirm('Are you sure do you want to delete?');
		if (mmm)
		{		
				 window.close();
      	document.close();

			return true;
		}
		else
		{			 window.close();

				return false;
	alert("delete operation had been canceled");
		}
		

		
		}</script>
		
	
					
		<?php 
					$q="select * from user";
					$r = mysql_query($q);
					$num = mysql_num_rows($r);
		
		
				for($i =0; $i < $num; $i++)
					{	
						$user_id = mysql_result($r,$i,"user_id");
						$name= mysql_result($r,$i,"username");
						$tyep= mysql_result($r,$i,"type");
						$password= mysql_result($r,$i,"password");
				
				$t=$i+1;
						echo '<form action="Userinfo.php?fund=Del" onSubmit=" return con();return true; "  method="post"> ';		 
					//															
					echo '<tr><td align="center" style="width: 35px" >'.$t.'</td>';
					echo	'<td style="width: 300px">'.$name.'</td>';
					echo '<td   align="center">'.$tyep.'</td>';
					echo '<td   align="center">'.$password.'</td>';
					
					echo '<td align="center"><input type="hidden" name="hed"  value="'.$user_id.'" /><input  type="image" name="img" value="'.$user_id.'"  src="img/del.png" /></td>';
				//	echo '<td style="width: 7px"><input type="submit"  name="del" value="'.$user_id.'"    /></td></tr>';
				//
				echo '</tr>';
				
				//echo '<td style="width: 7px"><a href="Userinfo.php?fund=Del" alt="del"><img s align="middle" alt="edit"/></a>	</td>;
					
							echo '</form>';								
											
						}
				?>


					
					
					
					
				</table>

	</table>
	

        </body>

</html>
