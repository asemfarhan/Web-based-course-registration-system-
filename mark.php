<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:p="urn:schemas-microsoft-com:office:powerpoint" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Language" content="en-gb" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>



 <?php
include("config.php");

session_start();?>



</head>

<?php 
include("color.php");
?>


<body>


	<h1>Manage mark</h1>
		<form action="mark.php?funm=mark"   method="post" >	 
<table border="1" bordercolor="#000000"  bgcolor="#990000" style= " width: 668px;" height: 325px;" align="center">
	
  
		<td>&nbsp;</td>
		<th class="style1">&nbsp; &nbsp;Name </th>
		<th>Student_ID</th>
		<th width="33" align="center">Edit</th>
		<th style="width: 32px">
		<span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA">grade</span></th>

	</tr>



<?php 

if (isset($fun) && $fun=="sel")
{

if (empty($_REQUEST["c_id"]))
					echo ' <script type="text/javascript"> alert("Error Not found course code!");</script>';
	
	
	else{
	
	$c_id=$_REQUEST["c_id"];
		$_SESSION["c_id"]=$c_id;
	
					$q="select * from student	
					where student_id IN(
						SELECT student_id  FROM `registered` where `course_code`= '$c_id'
											)";
	
					$r = mysql_query($q);
				$num = mysql_num_rows($r);
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
echo ' <tr>	<td>'.$t.'</td>
		<td>'.$name.'</td>
		<td>'.$s_id.' 	<input type="hidden" value="'.$s_id.'" name="s_id[]" /></td>
		<td align="center"><a href="" name="" ><img src="img/edit.png" align="middle"></a></td>
		<td style="width: 32px">
<select name="mark[]">
			<option  selected=""value="A">A</option>
			<option value="-A">-A</option>
			<option value="+B">+B</option>
			<option value="B">B</option>
			<option value="-B">-B</option>
			<option value="+C">+C</option>
			<option value="-C">-C</option>
			<option value="D">D</option>
			<option value="-D">-D</option>
			<option value="F">F</option>
</select>
		</td>
			</tr>';


					}	//endfor 
					
				echo ' 	<tr><td></td><td></td>
				 <td align="center" > <input value="Save" align="center"  type="submit" name="Submit" </td></tr>';
	}//else
}//end if sel







/////
if ( isset($funm) && $funm="mark")
{
					
			$num = count($mark);
			$num2 = count($s_id);
	

				$c_id=$_SESSION['c_id'];
				$q="select * from student	
					where student_id IN(
						SELECT student_id  FROM `registered` where `course_code`= '$c_id'
											)";
	
					$r = mysql_query($q);
				$num = mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
						{ 
							$t=$i+1;
							 $ss_id = mysql_result($r,$i,"student_id");
						 	$name= mysql_result($r,$i,"student_name");
						  	$semster= mysql_result($r,$i,"semster");
							 $program= mysql_result($r,$i,"program_id");
							 $Statue= mysql_result($r,$i,"Statue");
							 $gender= mysql_result($r,$i,"gender");
							 $dgree= mysql_result($r,$i,"dgree");
							 $year= mysql_result($r,$i,"year");
echo ' <tr>	<td>'.$t.'</td>
		<td>'.$name.'</td>
		<td>'.$ss_id.' 	</td>
		<td align="center"><a href="" name="" ><img src="img/edit.png" align="middle"></a></td>
		<td style="width: 32px">
<select  disabled="disabled">
			<option  selected=""value="A"></option>
			<option value="-A">-A</option>
			<option value="+B">+B</option>
			<option value="B">B</option>
			<option value="-B">-B</option>
			<option value="+C">+C</option>
			<option value="-C">-C</option>
			<option value="D">D</option>
			<option value="-D">-D</option>
			<option value="F">F</option>
</select>
		</td>
			</tr>';
			}
			
	///dispaly 
	$c_id=$_SESSION['c_id'];
	
$numm = count($mark);
			$num2 = count($s_id);
echo $numm;
echo $num2;
			if(empty($numm))
					{print  (' <script type="text/vbscript"> msgbox("Error empty student");</script>');
					echo ' back';
					  header("location: manage_marks.php?funa=all");
						}
					else
					{

						for ($i =0; $i <$numm; $i++)
						{	
						
					//	echo 'grad is '.$mark[$i].' student id'.$s_id[$i].'<br/>  ' ;
						
	
	$q1="SELECT *
FROM `student` 
WHERE `student_id` = '$s_id[$i]'";
$r1 = mysql_query($q1);
							$num = mysql_num_rows($r1);
	
						for($ii =0; $ii <$num; $ii++)
						{   
						 	$student_name= mysql_result($r1,$ii,"student_name");
						  	$semster= mysql_result($r1,$ii,"semster");
						}

$q2="SELECT `Semester_type`, `year`    FROM `period` where `p_id` in 
					( SELECT MAX(p_id)   FROM `period`)";
	$r2 = mysql_query($q2);

	$record2 = mysql_fetch_assoc($r2);	
			$Semester_type=$record2[Semester_type];
			$year=$record2[year];



						if ($mark[$i]=="F")
								{		
								
											$insert="INSERT INTO `x_registered` ( 
					`student_id` ,
					`course_code` ,
					`course_status`,
					`year` ,
					`Semester` ,
					`Semester_type` 
					)
					VALUES ( 
					'$s_id[$i]', '$c_id' , 'F' ,  '$year', '$semster', '$Semester_type')";								
																	
					$r=mysql_query($insert);

						if ($r)
						{
										$qq = "delete from `registered` where course_code ='$c_id' and student_id='$s_id[$i]' ;";
															$rr = mysql_query($qq);
														 if ($rr)
															
															echo ' <script type="text/javascript"> alert(" Student  '.$name.' : Filed  in '.$c_id.'");</script>';
								
																}

								}
								
								
								
////////////////////FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF								
								
								else
								{
//$year = date('Y');
//echo $year;

														
	//echo '	record2[Semester_type]  :  '.$s_id[$i].'';




$q="INSERT INTO `taken` ( 
`student_id` ,
`course_code` ,
`result` ,
`year` ,
`Semester` ,
`Semester_type` 
)
VALUES ( 
'$s_id[$i]', '$c_id', '$mark[$i]', '$year', '$semster', '$Semester_type')";								
								
$r=mysql_query($q);
if($r)
	{
/*	echo ' <script type="text/vbscript"> msgbox(" '.$student_name.'  successfully submited  grade ")</script>';*/
		$qq = "delete from `registered` where course_code ='$c_id' and student_id='$s_id[$i]' ;";
															$rr = mysql_query($qq);
														 if ($rr)
							echo ' <script type="text/vbscript"> msgbox ("Successful Save student mark ( '.$student_name.' ) ")</script>';


															  else
															  echo "error";				
									} 


else								
	echo ' <script type="text/javascript"> alert("Error.INSERT INTO `taken");</script>';
	

																}

						}//rnd for
						
					}

}
?>
	
	
	</tr>
</table>
<p class="style1">

            
</form>

            
            
				</p>
                
                <p class="style1"><a href="Manage_marks.php?fun=all"  class="navText" style="width: 188px" dir="rtl" >Go back</a></p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;
				</p>

</body>

</html>
