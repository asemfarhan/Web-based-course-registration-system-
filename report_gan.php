<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>
 <?php
include("config.php");

session_start();
ob_start();
?>


<body bgcolor="#EAEAEA">
 <?php

session_unregister('header');
session_unregister('values');
unset($_SESSION['header']);
unset($_SESSION['values']);

if (isset($fun)&& $fun=='gen' )
{
			
			$date= date('d-m-Y');
					$p_id=$_REQUEST["prog_name"];
					$cc_id=$_REQUEST["course"];	
					$rad=$_REQUEST["rad_type"];	
					$s_id=$_REQUEST["ID"];
					echo 'Program: '.$p_id.'<br />';
		$printa='Date: '.$date .'</br>';			
	switch ($rad)
	{
	case "course_info":
	 
	 {//echo "Number 1".$rad;
	$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="750" cellPadding="0"  align="center">
	<tr>
		<td colSpan="7" align="middle">
		<table  	align="middle">
			<tr>
				<td align="middle"><strong>COURSES INFORMATION REPORT</strong></td>
				<td></td>
				<td></td>
								<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
				<td></td>
			</tr>
		</table>
				</td>
	</tr>
	<tr>
		<td align="middle"><strong>NO</strong></td>
		<td align="middle"><strong>COURSE CODE</strong></td>
		<td align="middle"><strong>COURSE TITLE</strong></td>
		<td align="middle"><strong>CREDIT HOURS</strong></td>
		<td><strong>TYPE</strong></td>
		<td><strong>OFFER</strong></td>
		<td><strong>PROGRAM</strong></td>
	</tr>
	<tr>';
	
					$q="SELECT * FROM `course` ORDER BY `program_id` ASC";
					
						if($p_id!='All')
						$q="SELECT * FROM `course` where program_id='$p_id'";
						$r = mysql_query($q);
				$num = mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
						{ 
							$t=$i+1;
							$c_id[$i] = mysql_result($r,$i,"c_id");
						 	$course_code[$i]= mysql_result($r,$i,"course_code");
						  	$title[$i]= mysql_result($r,$i,"title");
							 $pp_id[$i]= mysql_result($r,$i,"program_id");
							 $credithr[$i]= mysql_result($r,$i,"credithr");
							 $c_type[$i]= mysql_result($r,$i,"type");
								$offer[$i]=mysql_result($r,$i,"offer");
									

			$printa= $printa. '	<tr>
				<td align="middle">'.$t.'</td>
				<td align="middle">'.$course_code[$i].'</td>
				<td >'.$title[$i].'</td>
				<td align="middle">'.$credithr[$i].'</td>
				<td align="middle">'.$c_type[$i].'</td>
				<td>'.$offer[$i].'</td>
				<td>'.$pp_id[$i].'</td>
			</tr>';
		}
		
		////////////////////////excel export

		$_SESSION['header']=array("NO","COURSE CODE","COURSE TITLE","CREDIT HOURS","TYPE","OFFER","PROGRAM"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$course_code[$i];
							 $_SESSION['values'][$i][2]=$title[$i]." ";
							 $_SESSION['values'][$i][3]=$credithr[$i]." ";
							 $_SESSION['values'][$i][4]=$c_type[$i]." ";
							 $_SESSION['values'][$i][5]=$offer[$i]." ";
							 $_SESSION['values'][$i][6]=$pp_id[$i]." ";
							}
							
			

		
echo $printa;
			$printa= $printa. '</table>';
														
echo '	<tr>
		<td colSpan="7" align="middle">
			<form action="export_report.php?fn=course_info"  method="post">
							<input type="submit" name="Submit" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table>
														 ';
														 

break;	}

	  
	  
	  
	  
	  
	  
////////////////////////////Registered  Courses 	Information	/////////////////////////////  
	  
	  case "Registered_c_info":
	 {
	 //echo "Number 2".$rad;
	$printa= $printa.'
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="650" cellPadding="0"  align="center">
	<tr>
		<td colSpan="4" align="middle">


		<table  align="middle">
			<tr>
				<td align="middle"><strong>Registered  Courses 
		Information</strong></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
				<td></td>
			</tr>
		</table>
				</td>
	</tr>
	<tr>
		<td align="middle"><strong>NO</strong></td>
		<td align="middle"><strong>COURSE CODE</strong></td>
		<td align="middle"><strong>COURSE TITLE</strong></td>
		<td align="middle"><strong>PROGRAM</strong></td>

	</tr>
	<tr>';
	
					$q="SELECT DISTINCT c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code ORDER BY `c`.`program_id` ASC 
 ";
					
						if($p_id!='All')
						$q="SELECT DISTINCT c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code and  program_id='$p_id'
								ORDER BY `c`.`program_id` ASC ";
								
								
								
						$r = mysql_query($q);
				$num = mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
						{ 
							$t=$i+1;
							$c_id[$i] = mysql_result($r,$i,"c_id");
						 	$course_code[$i]= mysql_result($r,$i,"course_code");
						  	$title[$i]= mysql_result($r,$i,"title");
							 $pp_id[$i]= mysql_result($r,$i,"program_id");

									

			$printa= $printa. '	<tr>
				<td align="middle">'.$t.'</td>
				<td align="middle">'.$course_code[$i].'</td>
				<td >'.$title[$i].'</td>
				<td align="middle">'.$pp_id[$i].'</td>
			</tr>';
		}
		
		
		////////////////////////excel export

		$_SESSION['header']=array("NO","COURSE CODE","COURSE TITLE","PROGRAM"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$course_code[$i];
							 $_SESSION['values'][$i][2]=$title[$i]." ";
							 $_SESSION['values'][$i][3]=$pp_id[$i]." ";
							}
							


		
			echo $printa;
						$printa= $printa. '</table>';		
echo '
	<tr>
		<td colSpan="4" align="middle">
			<form action="export_report.php?fn=Registered_c_info"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td> </table>';

													  
break;	}











		


/////333333333333////////////////////////////////Student Information /////////


	case "student_info":
	{
	 // echo "Number 3 ".$rad;
			$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="750" cellPadding="0"  align="center">
	<tr>
		<td colSpan="8" align="middle">
		<table  align="middle">
			<tr>
				<td align="middle"><strong>COURSES INFORMATION REPORT</strong></td>
				<td></td>
				<td></td>
								<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
				<td></td>
			</tr>
		</table>
				</td>
	</tr>


         <tr>
          <th align="center"> No </td>
          <th align="center"> Student ID </td>
		            <th  align="center"> Student Name </td>

			<th  align="center"> Matric</td> 
            <th align="center">
			Semester No. </td>
            <th  align="center">
			Program </td>
            <th  align="center">Gender</td>
            <th  align="center">Student Status</td>          
</tr>';
	
						$q="SELECT * FROM `student`  	ORDER BY program_id ASC ";
 
					
						if($p_id!='All')
						$q="SELECT * FROM `student` where program_id='$p_id'";
						$r = mysql_query($q);
				$num = mysql_num_rows($r);
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $ss_id[$i] = mysql_result($r,$i,"student_id");
						 	 $name[$i]= mysql_result($r,$i,"student_name");
							 $Matric[$i]= mysql_result($r,$i,"Matric");
						  	 $semster[$i]= mysql_result($r,$i,"semster");
							 $program[$i]= mysql_result($r,$i,"program_id");
							 $Statue[$i]= mysql_result($r,$i,"Statue");
							 $gender[$i]= mysql_result($r,$i,"gender");
							 $dgree[$i]= mysql_result($r,$i,"dgree");
							 $year[$i]= mysql_result($r,$i,"year");

		$printa= $printa.'	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$ss_id[$i].'</td>
				<td  >'.$name[$i].'</td>
					<td  >'.$Matric[$i].'</td>
				<td align="middle">'.$semster[$i].'</td>
	<td align="middle">'.$program[$i].'</td>
							<td align="middle">'.$gender[$i].'</td>
				<td align="middle">'.$Statue[$i].'</td>

			</tr>';
		}
		
		////////////////////////excel export

		$_SESSION['header']=array("NO","Student ID"," Student Name","Matric","Semester","Program","Gender","Student Status"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$ss_id[$i];
							 $_SESSION['values'][$i][2]=$name[$i]." ";
							 $_SESSION['values'][$i][3]=$Matric[$i]." ";
							 $_SESSION['values'][$i][4]=$semster[$i]." ";
							 $_SESSION['values'][$i][5]=$program[$i]." ";
							 $_SESSION['values'][$i][6]=$gender[$i]." ";
							 $_SESSION['values'][$i][7]=$Statue[$i]." ";
							}
							
			

		
echo $printa;
			$printa= $printa. '</table>';
echo '
	<tr>
		<td colSpan="8" align="middle">
			<form action="export_report.php?fn=student_info"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table></br>
														 ';

break;	}	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  ////////////////////////////////////////////////////Lecturer Attendance Report 
	case "Attendance":
	{
	 // echo "Number 3 ".$cc_id;
/*	  $qq="select s.*,c.title FROM student s ,  registered r , course c
								where s.student_id = r.student_id
								and 	r.`course_code`='$cc_id'
								and 	c.`course_code`='$cc_id'";
									
*/														
$qq="select title FROM  course 	where course_code ='$cc_id'";
										$rr = mysql_query($qq);
											$record=mysql_fetch_assoc($rr);
 											$title=$record[title];	

			$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="750" cellPadding="0"  align="center">
	<tr>
		<td colSpan="17" align="middle">
		<table  align="left">
			<tr>
				<td align="left"><strong>&nbsp;&nbsp;LECTURER ATTENDANCE REPORT </strong>
				 </br>&nbsp;&nbsp;Course Name:  '.$title.'
				 </br>&nbsp;&nbsp;Course Code:  '.$cc_id.'
				 </td>
				<td></td>
				<td></td>
								<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
				<td></td>
			</tr>
		</table>
				</td>
	</tr>


         <tr>
		 
          <th align="center"> No </td>
          <th align="center"> Student ID </td>
		  <th  align="center"> Student Name </td>
			<th  align="center"> Matric</td> 
            <th align="center" width="40" >	Semester No. </td>
            <th  align="center">10% </td>
            <th  align="center">20%</td>
            <th  align="center"> 30%</td>          
            <th  align="center">40% </td>          
            <th  align="center"> 50%</td>          
            <th  align="center"> 60%</td> 
            <th  align="center"> 70%</td>          
            <th  align="center"> 80%</td>          
            <th  align="center"> 90%</td>          
            <th  align="center" width="40">R</td>          
         
</tr>';
	
						$q="select s.*,c.title FROM student s ,  registered r , course c
								where s.student_id = r.student_id
								and 	r.`course_code`='$cc_id'
								and 	c.`course_code`='$cc_id'";
													
//						if($p_id!='All')

						$r = mysql_query($q);
				$num = mysql_num_rows($r);
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $ss_id[$i] = mysql_result($r,$i,"student_id");
						 	 $name[$i]= mysql_result($r,$i,"student_name");
						  	 $semster[$i]= mysql_result($r,$i,"semster");
							 $program[$i]= mysql_result($r,$i,"program_id");
							 $Statue[$i]= mysql_result($r,$i,"Statue");
							 $gender[$i]= mysql_result($r,$i,"gender");
							 $dgree[$i]= mysql_result($r,$i,"dgree");
							 $year[$i]= mysql_result($r,$i,"year");
							 $Matric[$i]= mysql_result($r,$i,"Matric");
						
							 $title = mysql_result($r,$i,"title");



			$printa= $printa. '	<tr>
				<td align="middle">'.$t.'</td>
				<td>'.$ss_id[$i].'</td>
				<td>'.$name[$i].'</td>
				<td>'.$Matric[$i].'</td>
				<td align="middle">'. $semster[$i].' </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>
				<td align="middle"> </td>

			</tr>';
		}
		

			$printa= $printa. '<tr><td colSpan="15"></td></tr>';
		$printa= $printa. '<tr><td colSpan="15"></td></tr>';
		
			////////////////////////excel export

		$_SESSION['header']=array("NO","Student ID"," Student Name","Matric","10%","20%","30%","40%","50%","60%","70%","80%","90%","R"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$ss_id[$i];
							 $_SESSION['values'][$i][2]=$name[$i]." ";
							 $_SESSION['values'][$i][3]=$Matric[$i]." ";
							 $_SESSION['values'][$i][4]=" ";
							 $_SESSION['values'][$i][5]=" ";
							 $_SESSION['values'][$i][6]=" ";
							 $_SESSION['values'][$i][7]=" ";
							}
							
			

echo $printa;
			$printa= $printa. '</table>';
echo '
	<tr>
		<td colSpan="17" align="middle">
			<form action="export_report.php?fn=Attendance"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table>
														 ';
break;	}

	
	























	  ////////////////////////////////////////////////////5555555555555555555555555555555555555555555555555//////
	  //////////////////////////////////////////////Student slip Information 

	
	
		case "s_slip":
{
	  //echo "Number 6 ".$s_id;
	 			$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="650" cellPadding="0"  align="center">
	<tr>
		<td colSpan="4" align="middle">
		<table 	align="middle"  >
			<tr>
				<td align="left"><strong>STUDENT MARKS REPORT </strong></td>
				<td></td>
				<td></td>
							<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
			</tr>';
		
$qq="SELECT * FROM `student` WHERE `student_id`='$s_id'";
									
														
										$rr = mysql_query($qq);
 										$numqq = mysql_num_rows($rr);
$record=mysql_fetch_assoc($rr);
 											$name=$record[student_name];	
											$Matric =$record[Matric];									

									 if ($numqq == 0)
									{
												  echo '<script type="text/javascript"> alert ("student data not found ")</script>';
																	exit ;}

 											
	//student_id  course_code   result  year  Semester  Semester_type 
	
								

						$q="SELECT s.semster,s.Matric ,r.course_code, c.title, c.credithr
FROM student s , course c, registered r
								
								where r.student_id='$s_id'
								and
								c.course_code=r.course_code
				 and s.student_id='$s_id'					
";
					
//						if($p_id!='All')

						$r = mysql_query($q);
				$num = mysql_num_rows($r);
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $title[$i] = mysql_result($r,$i,"title");
						 	 $course_code[$i]= mysql_result($r,$i,"course_code");
							 $credithr[$i]= mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"semster");
							 $Matric= mysql_result($r,$i,"Matric");
 
	
	
	
	
	
	
	
	
if ($i==0)
{	
			$printa= $printa.  '</table><tr >
		
		<td colSpan="4">
		
		<table >
		<tr>			
	
	<td ><strong> &nbsp;&nbsp;&nbsp;Student Name :'.$name.' . 
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;</td>
	<td> Student ID : '.$s_id.' </td>
	
	</tr>
		<tr  ><td>  &nbsp;&nbsp;&nbsp;Matric :'.$Matric.' </td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;</td>
	<td align="middle"> Semester :&nbsp; '.$Semester.' </td>
	
		</tr>
		
	</table>';
		
	
			$printa= $printa. '				</td>
		</tr>
	
	
			 <tr>
			  <th align="center"> No </td>
			  <th align="center">COURSE TITLE </td>
						<th  align="center"> COURSE CODE </td>
	
				<th  align="center">CREDIT H</td> 
			 
	</tr>';
		
		
	
}	

					$printa= $printa.  '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code[$i].'</td>
				<td  >'.$title[$i].'</td>
					<td align="middle" >'.$credithr[$i].'</td>
 
			</tr>';
		}
		
				$printa= $printa.  '<tr><td ></td></tr>';			
				$printa= $printa. '<tr><td"></td></tr>';
			////////////////////////excel export

		$_SESSION['header']=array("NO","COURSE TITLE","COURSE CODE","CREDIT H"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$course_code[$i];
							 $_SESSION['values'][$i][2]=$title[$i]." ";
							 $_SESSION['values'][$i][3]=$credithr[$i]." ";
							}
							
			

				echo	$printa;
				$printa= $printa.  '</table>';
echo '
	<tr>
		<td colSpan="4" align="middle">
			<form action="export_report.php?fn=slip"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table>
														 ';

break;	}










	  ////////////////////////////////////////////////////Student MarksMarksMarksMarksMarksMarksMarks Information 



	case "studentMarks":
{
	//  echo "Number 5 ".$s_id;
			$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="650" cellPadding="0"  align="center">
	<tr>
		<td colSpan="5" align="middle">
		<table 	align="middle"  >
			<tr>
				<td align="left"><strong>STUDENT MARKS REPORT </strong></td>
				<td></td>
				<td></td>
							<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
			</tr>';
		
$qq="SELECT * FROM `student` WHERE `student_id`='$s_id'";
									
														
										$rr = mysql_query($qq);
 										$numqq = mysql_num_rows($rr);
$record=mysql_fetch_assoc($rr);
 											$name=$record[student_name];	
											$Matric =$record[Matric];									

									 if ($numqq == 0)
									{
												  echo '<script type="text/javascript"> alert ("student data not found ")</script>';
																	exit ;}

 											
	//student_id  course_code   result  year  Semester  Semester_type 
	
		/*						

						$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type

								FROM taken t , course c
								
								where t.student_id='$s_id'
								and
								c.course_code=t.course_code
									and 
									t.Semester_type IN( SELECT p.Semester_type from period p where `p_id` IN 
										(SELECT MAX(p_id) FROM `period`))
									and 
									t.Semester IN( SELECT tt.Semester from taken tt where `Semester` IN 
										(SELECT MAX(Semester) FROM `taken`))
	";
	*/
		

						$q="select s.semster, p.Semester_type

								FROM  student s, period p 
								
								where 
									s.semster IN
										(SELECT MAX(semster) FROM student  where  student_id='$s_id')
											and
												p.Semester_type IN( SELECT p.Semester_type from period p where `p_id` IN 
													(SELECT MAX(p_id) FROM `period`))
										";


						$r = mysql_query($q);
				$num = mysql_num_rows($r);
for($i =0; $i <$num; $i++)
{   
						 
						 $t=$i+1;
							 $Semester= mysql_result($r,$i,"semster");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
	
	
	}
		
		$printa= $printa. '</table><tr >
				
				<td colSpan="5">
				
				<table >
				<tr>			
			
			<td ><strong> &nbsp;&nbsp;&nbsp;Student Name :'.$name.' . 
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td> Student ID : '.$s_id.' </td>
			
			</tr>
				<tr  ><td>  &nbsp;&nbsp;&nbsp;Matric :'.$Matric.' </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td align="middle"> Semester :&nbsp; '.$Semester.' </td>
			
				</tr>
				
					<tr  ><td> &nbsp;&nbsp;&nbsp;Semester type :&nbsp;'.$Semester_type.' </td>';
					
				if(!empty($_REQUEST["Semester"]))
							{	
							$semm=$_REQUEST["Semester"];
								
								$printa= $printa. '				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
<td align="middle">	Report Semester :&nbsp; '.$semm.'	</td>	';
		
								}
							
							
							$printa= $printa. '		</tr></table>';
				
			
			
			
			
			
			
			
			
			
			
					$printa= $printa. '				</td>
				</tr>
			
			
					 <tr>
					  <th align="center"> No </td>
					  <th align="center">COURSE TITLE </td>
								<th  align="center"> COURSE CODE </td>
			
						<th  align="center">CREDIT H</td> 
						<th align="center" width="40" >	GRADE </td>
					 
			</tr>';
				
				

		/////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////begin feach raw from passed courses 

						$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type

								FROM taken t , course c
								
								where t.student_id='$s_id'
								and
								c.course_code=t.course_code
									and 
									t.Semester IN( SELECT semster from student  where semster IN 
										(SELECT MAX(semster) FROM student  where  student_id='$s_id' ))
	";


////////////////////////////////set Semester
						if(!empty($_REQUEST["Semester"]))
							{		
									$semm=$_REQUEST["Semester"];
										  echo '<script type="text/javascript"> alert ("Semester: '.$semm.' ")</script>';
							$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type
								FROM taken t , course c
								where t.student_id='$s_id'
								and
								c.course_code=t.course_code
									and 
									t.Semester ='$semm'	";

										}





						$r = mysql_query($q);
				$num = mysql_num_rows($r);
for($i =0; $i <$num; $i++)
{   
						 
						 $t=$i+1;
							 $title[$i] = mysql_result($r,$i,"title");
						 	 $course_code[$i]= mysql_result($r,$i,"course_code");
						  	 $result[$i]= mysql_result($r,$i,"result");
							 $credithr[$i]= mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"Semester");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
	
	
	
	
	
	
		$printa= $printa. '	<tr>
						<td align="middle">'.$t.'</td>
						 <td >'.$course_code[$i].'</td>
						<td  >'.$title[$i].'</td>
							<td align="middle" >'.$credithr[$i].'</td>
						<td align="middle">'. $result[$i].' </td>
		 
					</tr>';
				}
				

			////////////////////////excel export

		$_SESSION['header']=array("NO","COURSE TITLE","COURSE CODE","CREDIT H","GRADE"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$course_code[$i];
							 $_SESSION['values'][$i][2]=$title[$i]." ";
							 $_SESSION['values'][$i][3]=$credithr[$i]." ";
							 $_SESSION['values'][$i][4]=$result[$i]." ";
							}
							
			//////////////////////////////////////////////FFFFF and withdraw course

					$q="select x.course_code, c.title, c.credithr, x.course_status, x.Semester, x.Semester_type
							FROM x_registered x , course c
										where
										 x.student_id='$s_id'
											  and
												c.course_code=x.course_code
													and 
													   x.Semester IN 
														(SELECT MAX(semster) FROM student  where  student_id='$s_id')
																	";
						
		
		
			/////////////////////set Semester
			
				if(!empty($_REQUEST["Semester"]))
							{		
									$semm=$_REQUEST["Semester"];
									
					$q="select x.course_code, c.title, c.credithr, x.course_status, x.Semester, x.Semester_type
							FROM x_registered x , course c
										where
										 x.student_id='$s_id'
											  and
												c.course_code=x.course_code
													and 
													   x.Semester='$semm'
																	";					

										}


								
									$r = mysql_query($q);
							$num = mysql_num_rows($r);
									for($i =0; $i <$num; $i++)
									{   
									 
									 $t++;
									 $title[$i] = mysql_result($r,$i,"title");
									 $course_code[$i]= mysql_result($r,$i,"course_code");
									 $course_status[$i]= mysql_result($r,$i,"course_status");
									 $credithr[$i]= mysql_result($r,$i,"credithr");
									 $Semester= mysql_result($r,$i,"Semester");
									 $Semester_type= mysql_result($r,$i,"Semester_type");
						
							
							
							$printa= $printa. '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code[$i].'</td>
				<td  >'.$title[$i].'</td>
					<td align="middle" >'.$credithr[$i].'</td>
				<td align="middle">'. $course_status[$i].' </td>
 
			</tr>';
		}
			$printa= $printa. '<tr><td ></td></tr>';		
			$printa= $printa. '<tr><td"></td></tr>';
									echo $printa;
		
	
					$printa= $printa.'</table>';
echo '
	<tr>
		<td colSpan="5" align="middle">
			<form action="export_report.php?fn=Mark"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table>
														 ';

break;	}










////////////////////////////////////////666666666666666666666666666666666666666666666666/////////////

	
	  ////////////////////////////////////////////////////end Student Marks Information 
	


















	
	
	
	
	
	
	
	
	
	/////////////////////////////////////////////////////////////////////////////end slip
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	///////////////////////////////////////////progress rpoert		
	



	
	
	
		case "progress":
{
	//  echo "Number 5 ".$s_id;
			$printa= $printa. '
	<table border="1" bgcolor="white" cellSpacing="0" borderColor="#000000" width="650" cellPadding="0"  align="center">
	<tr>
		<td colSpan="5" align="middle">
		<table 	align="middle"  >
			<tr>
				<td align="left"><strong>Student Progress Report  </strong></td>
				<td></td>
				<td></td>
							<td></td>
				<td></td>
				<td></td>

				<td width="370" align="right">
				<div align="right">
					<p><img src="img/ic.gif" /><img src="img/oum.gif" />
					</p>
				</div>
				</td>
			</tr>';
		
$qq="SELECT * FROM `student` WHERE `student_id`='$s_id'";
									
														
										$rr = mysql_query($qq);
 										$numqq = mysql_num_rows($rr);
$record=mysql_fetch_assoc($rr);
 											$name=$record[student_name];	
											$Matric =$record[Matric];									

									 if ($numqq == 0)
									{
												  echo '<script type="text/javascript"> alert ("student data not found ")</script>';
																	exit ;}

 											

		

						$q="select s.semster, p.Semester_type

								FROM  student s, period p 
								
								where 
									s.semster IN
										(SELECT MAX(semster) FROM student  where  student_id='$s_id')
											and
												p.Semester_type IN( SELECT p.Semester_type from period p where `p_id` IN 
													(SELECT MAX(p_id) FROM `period`))
										";


						$r = mysql_query($q);
				$num = mysql_num_rows($r);
for($i =0; $i <$num; $i++)
{   
						 
						 $t=$i+1;
							 $Semester= mysql_result($r,$i,"semster");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
	
	
	}
		$g= $Semester;
		$printa= $printa. '</table><tr >
				
				<td colSpan="5">
				
				<table >
				<tr>			
			
			<td ><strong> &nbsp;&nbsp;&nbsp;Student Name :'.$name.' . 
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td> Student ID : '.$s_id.' </td>
			
			</tr>
				<tr  ><td>  &nbsp;&nbsp;&nbsp;Matric :'.$Matric.' </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td align="middle"> Semester :&nbsp; '.$Semester.' </td>
			
				</tr>
				
					<tr  ><td> &nbsp;&nbsp;&nbsp;Semester type :&nbsp;'.$Semester_type.' </td>';
					

							
							$printa= $printa. '		</tr></table>';
				
			
			
			
			
			
			
			
			
			
			
					$printa= $printa. '				</td>				</tr>';
			
			

				
				

		/////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////begin feach raw from passed courses 

for($z =0; $z < $g ; $z++)
{   
			$curent_s =$z+1;
					$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type

								FROM taken t , course c
								
								where t.student_id='$s_id'
								and
								c.course_code=t.course_code
									and 
									t.Semester ='$curent_s' ";

			$printa= $printa. '<tr><td colSpan="5"  ></br>Semester NO.: '.$curent_s.' </td></tr>';		

















$printa= $printa. '			 <tr>
					  <th align="center"> No </td>
					  <th align="center">COURSE TITLE </td>
								<th  align="center"> COURSE CODE </td>
			
						<th  align="center">CREDIT H</td> 
						<th align="center" width="40" >	GRADE </td>
					 
			</tr>';



						$r = mysql_query($q);
				$num = mysql_num_rows($r);
for($i =0; $i <$num; $i++)
{   
						 
						 $t=$i+1;
							 $title[$i] = mysql_result($r,$i,"title");
						 	 $course_code[$i]= mysql_result($r,$i,"course_code");
						  	 $result[$i]= mysql_result($r,$i,"result");
							 $credithr[$i]= mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"Semester");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
	
	
	
	
	
	
		$printa= $printa. '	<tr>
						<td align="middle">'.$t.'</td>
						 <td >'.$course_code[$i].'</td>
						<td  >'.$title[$i].'</td>
							<td align="middle" >'.$credithr[$i].'</td>
						<td align="middle">'. $result[$i].' </td>
		 
					</tr>';
				}
				

			////////////////////////excel export

		$_SESSION['header']=array("NO","COURSE TITLE","COURSE CODE","CREDIT H","GRADE"); 

							for($i =0; $i <$num; $i++)
							{
							 $_SESSION['values'][$i][0]=$i+1;
							 $_SESSION['values'][$i][1]=$course_code[$i];
							 $_SESSION['values'][$i][2]=$title[$i]." ";
							 $_SESSION['values'][$i][3]=$credithr[$i]." ";
							 $_SESSION['values'][$i][4]=$result[$i]." ";
							}
							
			//////////////////////////////////////////////FFFFF and withdraw course

					$q="select x.course_code, c.title, c.credithr, x.course_status, x.Semester, x.Semester_type
							FROM x_registered x , course c
										where
										 x.student_id='$s_id'
											  and
												c.course_code=x.course_code
													and 
													   x.Semester ='$curent_s' ";
						
		
		
			/////////////////////set Semester
			
	

								
									$r = mysql_query($q);
							$num = mysql_num_rows($r);
									for($i =0; $i <$num; $i++)
									{   
									 
									 $t++;
									 $title[$i] = mysql_result($r,$i,"title");
									 $course_code[$i]= mysql_result($r,$i,"course_code");
									 $course_status[$i]= mysql_result($r,$i,"course_status");
									 $credithr[$i]= mysql_result($r,$i,"credithr");
									 $Semester= mysql_result($r,$i,"Semester");
									 $Semester_type= mysql_result($r,$i,"Semester_type");
						
							
							
							$printa= $printa. '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code[$i].'</td>
				<td  >'.$title[$i].'</td>
					<td align="middle" >'.$credithr[$i].'</td>
				<td align="middle">'. $course_status[$i].' </td>
 
			</tr>';
		}
			$printa= $printa. '<tr><td></td></tr>';
	
	
	
	}//end main for
	
	
									echo $printa;
		
	
					$printa= $printa.'</table>';
echo '
	<tr>
		<td colSpan="5" align="middle">
			<form action="export_report.php?fn=Mark"  method="post">
							<input type="submit" name="Submit"   align="middle" value="Export To Excel"  class="red-button-over">
														  </form>
														  </td></table>
														 ';

break;	}



	
	
	
	
	
	

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	case "trial":
	//  echo "Number 8".$rad;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	  break;









/////////////////////////////////////////////////////////////////////////////////////


default:
	  echo "No number between 1 and 3";
	}

				
				
}	
echo '<table  cellSpacing="0"  width="750" cellPadding="0"  ><tr> <td align="center"></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
require_once 'class.PrintAnything.php';
 $aser = 'hiiiiiiiiiiiiii';


$pa = new PrintAnything();
$con1 = $pa->addPrintContext($printa);		
$pa->showPrintButton($con1, 'Print' ,$aser);

echo '</td></tr></table>';
?>

	</table>


</body>

</html>
 