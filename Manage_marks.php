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
	<h1>Manage mark</h1>
<p><form id="form1" name="form1" method="post"  action="manage_marks.php?fun=sel">
		<fieldset>
		
			Program <strong><select name="prog_name"  >
			<option selected="" value="ALL">ALL</option>
			<option value="MIT" >MIT</option>
			<option value="MBA">MBA</option>
			</select> &nbsp;&nbsp;&nbsp;
			</strong>      
                              
<input  type="submit" value="Go"> </a>
		
		<?php 
				$q="SELECT * FROM `program`";
				$r = mysql_query($q);
						$num = mysql_num_rows($r);

/*echo '	Program <strong><select name="prog_name">
			<option selected="" value="ALL">ALL</option>';	
						for($i =0; $i <$num; $i++)
		{
		$p_id= mysql_result($r,$i,"program_name");
		echo '	<option value="'.$p_id.'">'.$p_id.'</option>;';
		
		}
		echo '	</select>	</strong>';
*/
		?>
	
</form>
		<?php 

if (isset ($funa) && $funa="all")
{
	echo '<table border="1" cellSpacing="0" borderColor="#000000" cellPadding="0" width="650" align="center">
	<tr>
		<td align="middle"><strong>NO</strong></td>
		<td align="middle"><strong>COURSE CODE</strong></td>
		<td align="middle"><strong>COURSE TITLE</strong></td>
		<td><strong>CREDIT HOURS</strong></td>
		<td> PROGRAM</td>
	</tr>';
	

	$q="SELECT * FROM `course`";
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
		
						
				echo ' <tr><td>'.$t.'</td>				<td>'.$course_code.'</td>		<td>  <a href="mark.php?fun=sel&c_id='.$course_code.'" >  '.$title.'</a></td>		<td> '.$credithr.'</td><td align="middle"> '.$p_id.'</td>	</tr>';
				}//end for
	echo '</table></fieldset>';
	
	
}//end All

////////////////////////////////////////////////////////////////////////////////////specfied  program id	

if (isset ($fun) && $fun="sel")
{
											
		$p_id=$_REQUEST["prog_name"];
echo '	<h3>program : '.$p_id.'</h3>';
	echo '<table border="1" cellSpacing="0" borderColor="#000000" cellPadding="0" width="650" align="center">
	<tr>
		<td align="middle"><strong>NO</strong></td>
		<td align="middle"><strong>COURSE CODE</strong></td>
		<td align="middle"><strong>COURSE TITLE</strong></td>
		<td><strong>CREDIT HOURS</strong></td>
				<td> PROGRAM</td>
	</tr>';
	

			$q="SELECT * FROM `course`";
if ($p_id=='MIT' || $p_id=='MBA')
			$q="SELECT * FROM `course` where program_id='$p_id' or `program_id`='MIT&MBA' ";
			

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
		
						
				echo ' <tr><td>'.$t.'</td>				<td>'.$course_code.'</td>		<td> <a href="mark.php?fun=sel&c_id='.$course_code.'" > '.$title.'</a></td>		<td> '.$credithr.'</td>		<td align="middle"> '.$p_id.'</td>	</tr>';
				}//end for
	
	echo '</table></fieldset>';			
}

	?>
	
<p>&nbsp;
</p>
<table border="0" cellSpacing="7" align="center">
		<tr><td>
			<ifra me      align="middle" name="aaa" frameborder="1"  scrolling="auto" class="style1" style="width: 809px; height: 396px" src="back.htm" >

</iframe>

		
		</td></tr>
	</table>
        </div>
        </body>

</html>
