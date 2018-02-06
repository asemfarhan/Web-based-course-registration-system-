<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

 <?php
include("config.php");

session_start();

require("list.cls.php");
	$obj = new ezSL();
	


?>

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
.style1 {
	font-size: large;
}
</style>

<link href="stylesheet.css" rel="stylesheet" type="text/css" />

<link rel="STYLESHEET" type="text/css" href="rich_calendar/rich_calendar.css">
	
<script type="text/javascript" language="JavaScript">
<!--
function addmsg(){
alert("add/drop and withdraw dates are added");
return false;
}


</script></head>

<?php 
include("color.php");
?>

<body>

  <div id="sidebar1">
    </div>
	<h1>Search student </h1>
	
	     <fieldset style="width: 470px">
   
    <legend> <strong> Serarch for Student </strong></legend>    
	<table style="width: 48%">
    
    
    
    
    
		<form action="aasearch.php?fun=srch"  method="post" target="ooo">
		
        
        <tr>
			<td style="width: 449px" align="left">&nbsp; Student ID
<?php		
		$QueryField="student_id";
		$QueryTable="student";
								
		$obj->CreateComponent("ID", $QueryTable, $QueryField, 40);

?>
			</td> 
			
			<td style="width: 676px">&nbsp;
			</td>
		</tr>
		  
		  <tr> <td style="width: 449px"> Student Name
		  <?php		
		$QueryField="student_name";
		$QueryTable="student";
								
		$obj->CreateComponent("name", $QueryTable, $QueryField, 40);

?>
</td>
          <td style="width: 676px">
			&nbsp;&nbsp;<input type="submit" name="Submit" value="Search" class="style2"/></td>
		  </tr> 
		</form>
	</table>



<?php 	
			if (isset ($fun) && $fun="srch")
				{
					
						if ( empty($_POST["ID"]) && empty($_POST["name"]) )
					{
					echo ' <script type="text/javascript"> alert("please insert student information!");</script>';
					
					}
			else {
					
					
					if(empty($_POST["ID"]))
					{
											
											$name=$_POST["name"];
												$q="SELECT * FROM `student` WHERE `student_name` LIKE '%$name%'";
												$r = mysql_query($q);
																					
		
									}
					
					
									else //if (isset($_POST["name"]))
									{$id=$_POST["ID"];
					
									$q="SELECT * FROM `student` WHERE `student_id`='$id'";
					
										$r = mysql_query($q);
																					
									 if ($r)
										  echo "Successful id user  <b></b>";
											  else
												  echo "error id";
		
						}

					$num = mysql_num_rows($r);
	if($num > 0)
	{
	echo '</fieldset><br/>';
	
	
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $s_id = mysql_result($r,$i,"student_id");
						 	$name= mysql_result($r,$i,"student_name");
						  	$semster= mysql_result($r,$i,"semster");
							 $program= mysql_result($r,$i,"program_id");
							 $Statue= mysql_result($r,$i,"Statue");
							 $gender= mysql_result($r,$i,"gender");
							 $dgree= mysql_result($r,$i,"dgree");
							 $year= mysql_result($r,$i,"year");
							 
							
					
				
					
					
			  
echo '<fieldset>  <legend> <strong>Student Info number : '.$t.'  </strong></legend> ';	
 echo '<table border="0" align="center" > <form style="width: 594px; height: 183px">  <tr> <td> Student Name</td>';
 echo '<td > <input type="text" name="studentname" value="'.$name.'" size="50" readonly/>	  </td>';
	 echo '<td> &nbsp;&nbsp;gender</td><td><input type="text" name="gender" value="'.$gender.'"  readonly/></td></tr>';
	
	
	
echo '<tr> <td><br />Student ID</td> <td height="29"><input type="text" name="studentid" value="'.$s_id.'" readonly />';
          
           
echo '	</td>      <td><br />	Semester No. </td>       <td><input type="text" name="semno" value="'.$semster.'" readonly />	</td>   </tr>';		
           
echo '   <tr> <td><br />Program </td> <td> <input type="text" name="programname" value="'.$program.'" readonly /></td> <td><br />';
			
 echo '    Student Status</td>  <td><input type="text" name="studentstatus" value="'.$Statue.'" readonly /> </td>  </tr><tr><td style="height: 43px"><br />';
			
            
 echo ' 	Dgree </td><td style="height: 43px"><input type="text" name="dgree" value="'.$dgree.'" readonly /></td><td style="height: 43px"><br />';
			            
			
 echo ' 	Semester Year</td> <td style="height: 43px"><input type="text" name="semyear" value="'.$year.'" readonly /> </td></tr>      </form> </table>';
           
            
  

			   echo '</fieldset></br></br>';				
					
					
			}
						
						
						
						
				
		
		
		
		
		
		
		
		
		
		
		}
	else
		{
													echo ' <script type="text/javascript"> alert ("No data found ! ")</script>';
		}
						
						
						
						}						
								
			}
			
?> 


	
	
	
	
	
	
</fieldset><br/>
	
  <tr>
    <td width="205">&nbsp;</td>
    <td width="61">&nbsp;</td>
    <td width="62">&nbsp;</td>
    <td width="205">&nbsp;</td>
  </tr>

       
	   </table>
        </body>

</html>
