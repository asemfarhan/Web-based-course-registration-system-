<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>


 
</head>

<?php
include("config.php");

session_start();?>



<?php 
include("color.php");


?>

<body >

  <div id="sidebar1">
    </div>
	<h1>Courses information </h1>
	
	     <table border="0" width="80%"  align="center">
			<tr>
				<td align="center"><h2>  <a href="couresInfo.php?fun=remind"> Remind Courses	</a></h2>			</td>
                <td align="center"><h2>         <a href="couresInfo.php?fun=reg">  Registered Courses </a></h2></td>
				<td><h2><a href="couresInfo.php?fun=taken"> Taken Courses </h2></td>
			</tr>
			<tr>
				<td>
				</td>
			
            
            		<td>
			
            		</td>
		</tr>
		<tr>
			<td colSpan="3" align=\\="left">		
           <?php
           
if(!empty($_SESSION["id"]))
{	 
		$sid=$_SESSION["id"];
				   
//////////////////
$qq="SELECT * from student  where student_id='$sid'";
$rrr = mysql_query($qq);





$record =mysql_fetch_assoc($rrr);



	$name=$record[student_name];
	$semster=$record[semster];
	$pro_id=$record[program_id];

echo '<b>Student Name</b> :'.$name.'</br>';
echo '<b>Semster :'.$semster.'</br>';
echo 'program :'.$pro_id.'</b></br></br></br>';


	$_SESSION['pro_id']=$pro_id;

				   
		   if( isset($fun) && $fun=="remind")
		   {



	echo '
	<table width="80%"  border="1"   align="center">
			 <tr>
			  <th align="center"> No </th>
			  <th align="center">COURSE TITLE </th>
						<th  align="center"> COURSE CODE </th>
				<th  align="center">CREDIT H</th> </tr>';
				
				
				
				
						$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title, c.credithr
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id = '".$_SESSION['pro_id']."' OR c.program_id = 'MIT&MBA') 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								AND
								 c.course_code NOT IN (SELECT course_code FROM course WHERE offer = 'not offer')
								order by c.course_code	";
					
										$r = mysql_query($q);
																					
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
									
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											$credithr= mysql_result($r,$i,"credithr");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
	
	echo '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code.'</td>
				<td  >'.$title.'</td>
					<td align="middle" >'.$credithr.'</td>
 
			</tr>';
		}
	
	echo '</table>';
	}
	else 
	echo 'Empty course information';
		   
		   
		   		//	









			
			
			}
////////////////////////////////////////
////////////////
/////////////////////////////////////////////////////
   if( isset($fun) && $fun=="reg")
   {
	  			$q="SELECT s.semster,s.Matric ,r.course_code, c.title, c.credithr
				FROM student s , course c, registered r
								where r.student_id='$sid'
								and
								c.course_code=r.course_code
												 and s.student_id='$sid'		";
	
		
	echo '
	<table border="1" width="80%"  align="center">
			 <tr>
			  <th align="center"> No </td>
			  <th align="center">COURSE TITLE </td>
						<th  align="center"> COURSE CODE </td>
				<th  align="center">CREDIT H</td> </tr>';
						$r = mysql_query($q);
				$num = mysql_num_rows($r);
				if ( $num > 0 )
					{	for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $title  = mysql_result($r,$i,"title");
						 	 $course_code = mysql_result($r,$i,"course_code");
							 $credithr = mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"semster");
							 $Matric= mysql_result($r,$i,"Matric");
 
	
	echo '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code.'</td>
				<td  >'.$title.'</td>
					<td align="middle" >'.$credithr.'</td>
 
			</tr>';
		}
	
	echo '</table>';
	}
	else 
	echo 'Empty users information';
		   
		   
		   }//////////////////////end  if registered
//////////////////////////////////////

////////////////////////////
if( isset($fun) && $fun=="taken")
  {
/*
						$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type

								FROM taken t , course c
								
								where t.student_id='$sid'
								and
								c.course_code=t.course_code
				and 
t.Semester_type IN( SELECT p.Semester_type from period p where `p_id` IN 
	(SELECT MAX(p_id) FROM `period`))
					";*/



						$q="select t.course_code, c.title, c.credithr, t.result ,t.Semester,t.Semester_type

								FROM taken t , course c
								
								where t.student_id='$sid'
								and
								c.course_code=t.course_code";

echo '	<table border="1" width="90%"  align="center">
			 <tr>
			  <th align="center"> No </td>
			  <th align="center">COURSE TITLE </td>
						<th  align="center"> COURSE CODE </td>
				<th  align="center">CREDIT H</td> </tr>
				<th  align="center">SEMESTER</td> </tr>
				<th  align="center">GRADE</td> </tr>';
					
//						if($p_id!='All')

						$r = mysql_query($q);
				$num = mysql_num_rows($r);
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $title = mysql_result($r,$i,"title");
						 	 $course_code= mysql_result($r,$i,"course_code");
						  	 $result= mysql_result($r,$i,"result");
							 $credithr= mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"Semester");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
				echo '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code.'</td>
				<td  >'.$title.'</td>
					<td align="middle" >'.$credithr.'</td>
 
					<td align="middle" >'.$Semester.'</td>
 
					<td align="middle" >'.$result.'</td>
 
			</tr>';
		}
		echo '</table>';
		
		
	////////////////////////////////////////////Faeild and Withdraw Course	
		echo '  </br>  <fieldset>
        <legend> <strong>Faeild and Withdraw Course</strong></legend>';
		
		echo '	<table border="1" width="90%"  align="center">
			 <tr>
			  <th align="center"> No </td>
			  <th align="center">COURSE TITLE </td>
						<th  align="center"> COURSE CODE </td>
				<th  align="center">CREDIT H</td> </tr>
				<th  align="center">SEMESTER</td> </tr>
				<th  align="center">STATUE</td> </tr>';
					

		//course_code  student_id  course_status  year  Semester  Semester_type  


			$q="select t.course_code, c.title, c.credithr, t.course_status ,t.Semester,t.Semester_type
								FROM x_registered t , course c
							
								where t.student_id='$sid'
								and
								c.course_code=t.course_code";
								
				$r = mysql_query($q);
				$num = mysql_num_rows($r);
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $title = mysql_result($r,$i,"title");
						 	 $course_code= mysql_result($r,$i,"course_code");
						  	 $result= mysql_result($r,$i,"course_status");
							 $credithr= mysql_result($r,$i,"credithr");
							 $Semester= mysql_result($r,$i,"Semester");
							 $Semester_type= mysql_result($r,$i,"Semester_type");
 
	
				echo '	<tr>
				<td align="middle">'.$t.'</td>
				 <td >'.$course_code.'</td>
				<td  >'.$title.'</td>
					<td align="middle" >'.$credithr.'</td>
 
					<td align="middle" >'.$Semester.'</td>
 
					<td align="middle" >'.$result.'</td>
 
			</tr>';
	}
		echo '</table></fieldset>	
		';
			}
///////end taken


		   
}
 ?>
            </td></tr>
            
	</table>
        </body>

</html>
