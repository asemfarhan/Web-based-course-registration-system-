<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>
 <?php
include("config.php");

session_start();
include("color.php");

?>

</head>

<body>

			
            
  <div id="sidebar1">
    </div>
	<h1>Reports</h1>
<p><form  action="report_gan.php?fun=gen" method="post" target="aaa" >
  <table style="width: 100%">
	<tr >
		<td  style="width: 334px">
  <label>
  <input type="radio" name="rad_type" border="1" value="course_info" checked="checked" />
  Courses Information</label>
  </td>
								<td>Program <strong><select id="prog_name" name="prog_name">
									<option selected="" value="All">All</option>
									<option value="MIT">MIT</option>
									<option value="MBA">MBA</option>
									</select> 
									</strong></td>

			</strong></td>
		<td>&nbsp;</td>
	</tr>
	


<tr>
		<td style="width: 334px"><label><input type="radio" name="rad_type" value="Registered_c_info" />Registered  Courses 
		Information</label> </td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 334px">
    <label>
    <input type="radio" name="rad_type"  id="student" value="student_info" />Student</label>
  <label>Information</label> 
  </td>
  <td></td>
  <td></td>
  </tr>
  
  <tr>
  <td style="width: 334px">
    <label>
    <input type="radio" name="rad_type" id="Attendance " value="Attendance" />Lecturer   </label> <label>Attendance Report</label> </td>	
       
       <?php
////////////////////////
//<script language="javascript">           var iii=document.getElementById("pro").value;	document.write(iii);		


//////////////////////////////

echo '<td>Courses &nbsp;&nbsp;&nbsp;<strong>
<select name="course">	<option selected="" value=""> </option>';
				
				$q="SELECT * FROM `course`  ORDER BY `course`.`program_id` , `course`.`title`   ASC  ";
						//if($program!='All')
						//	$q="SELECT * FROM `course` where program_id='$program'";
						$r = mysql_query($q);
				$num = mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
						{ 
							$t=$i+1;
							$c_id = mysql_result($r,$i,"c_id");
						 	$course_code= mysql_result($r,$i,"course_code");
						  	$title= mysql_result($r,$i,"title");
							 $p_id= mysql_result($r,$i,"program_id");
							 $credithr= mysql_result($r,$i,"credithr");
							 $c_type= mysql_result($r,$i,"type");
								$offer=mysql_result($r,$i,"offer");
									
								echo '	<option value="'.$course_code.'">'.$title.'</option>';
							}



					
?>
									</select> 

       <td>
       
       </td>
       <td></td>
    </tr>
        


	<tr>				
		<td>   <label>
    <input type="radio" name="rad_type" id="s_slip " value="s_slip" />Student Slip</label>  </td>
		<td align="left"> Student ID
			<input type="text" name="ID"  size="15"/></td>
       <td></td>
	</tr>
    
    
      <tr>
  <td style="width: 334px">
    <label>
    <input type="radio" name="rad_type" id="studentMarks " value="studentMarks" />Student</label> <label>&nbsp;Marks 
		Information</label> </td>	
       <td>            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester 
			<input type="text" name="Semester"    size="1"/></td>
    </tr>
         <tr>
  <td style="width: 334px">
    <label>
    <input type="radio" name="rad_type" id="progress " value="progress" />Student</label> <label>&nbsp;Progress 
		Report</label> </td>	
       <td>      </td>
    </tr>
             

    
    
    

	</table>

		     <table border="0" cellSpacing="7" align="center" >
			<tr>
			<td class="style4">
				<input value="Generate" type="submit" name="Submit" /></td>
		</tr>
		<tr><td>
			<iframe      frameborder="0"   align="middle" name="aaa"  scrolling="auto" class="style1" style="width: 892px; height: 396px" src="back.htm" >

</iframe>
</form>






    
    </td></tr>
	</table> 
        </body>

</html>
