<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURSES OFFERED</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>


<?php
include("config.php");

session_start();

include("color.php");

?>



<body>
  <div id="sidebar1">
    </div>
	<h1>Register courses </h1>
     <?php 
				
		$sid=$_REQUEST["id"];

$qq="SELECT * from student  where student_id='$sid'";
$rrr = mysql_query($qq);





$record =mysql_fetch_assoc($rrr);



	$name=$record[student_name];
	$semster=$record[semster];
	$pro_id=$record[program_id];
 echo '  
	    <fieldset>
    <legend> <strong>Student information  </strong></legend>    
        <table width="486" height="38" border="0" align="left">
          <tr> ';   
echo '<tr><td>Student Name :</td><td>'.$name.'.</td></tr>';
echo '<tr><td>Semster :</td><td>'.$semster.'</td></tr>';
echo '<tr><td>program :</td><td>'.$pro_id.'</td></tr>';
 echo ' </table></fieldset>';

?>
    
<table border="1" cellSpacing="7" width="100%" align="center">
	<tr border="0">
		<td border="0"><h2 align="center">COURSES OFFERED </h2>
		</td>
		<td style="width: 8%"></td>
		<td><h2  align="center">COURSES REGISTERED</h2> 
		</td>
	</tr>
	<tr>
		<caption><br />
		</caption>
        
        
<script src="jquery.js" type="text/javascript"></script>
 <script type="text/javascript">
  $().ready(function() {
   $('#add').click(function() {
    return !$('#select1 option:selected').remove().appendTo('#select2');
   });
   $('#remove').click(function() {
    return !$('#select2 option:selected').remove().appendTo('#select1');
   });
  });
 </script> 
        
        <script language="javascript">
     var i=0;
     function conn()
	 { 
	 	i++;

	 if(i==4)
	 		{
			alert("please insert student information!"); 
	 			i=0;
				}
	 
	 } 
     
     </script>   
	  
	
       <script type="text/javascript">
   function add(){ 
   return location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'";
    }
    </script>
    
        
        
        
                
   <?php 
   
   /*
   
   
//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						$add_statment='<input type="checkbox" value="'.$c_id.'"  onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />';
						$drop_statment='<input type="checkbox" value="'.$c_id.'" onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'""  type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />';
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						$add_statment=('<input type="checkbox" value="'.$c_id.'"  onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"" " type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />');
						
						$drop_statment='<input type="checkbox" value="'.$c_id.'"  onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'""  type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';
						}
						else
						{
							$add_statment='<input type="checkbox" value="'.$c_id.'"  onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'""  type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						$drop_statment='<input type="checkbox" value="'.$c_id.'"  onClick="location.href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'""  type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
					
					}
 */ 					
////////end prodic
?>     
     
        
<?php
			   
if (isset ($fun) && $fun="re")
{	
		
		if(!empty($_REQUEST["id"]) and !empty($_REQUEST["p_id"]))
		{	
				$sid=$_REQUEST["id"];
				$p_id=$_REQUEST["p_id"];
				$_SESSION['pro_id']=$p_id;
		
		//


			$q="SELECT  c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'";
					
										$r = mysql_query($q);
																					

				
				
				
				
				
				
					
	
					$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title , c.offer
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id =  '".$_SESSION['pro_id']."'  or c.program_id= 'MIT&MBA' )
								AND 
								c.course_code NOT IN (  select course_code from course where c.program_id= 'MIT&MBA' and  c.offer='not offer' ) 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								AND
								 c.course_code NOT IN (SELECT course_code FROM course WHERE offer = 'not offer')
								order by c.course_code	";		
						
						


 


													
			$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
									
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
				echo $program;			
		
			//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{


echo '    '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">
					
					
						ADD
					
					
					
					
						</a> <br />';
						
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						echo '   '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;
						<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
						else
						{
							echo'  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;
							<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
					
						
						}
					
					}
					
////////end prodic//	print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
	
									
										}
				echo '</td>';
					
					}		
		


        
	/*	echo '<td class="style1" style="width: 8%"><input value="Add"  onclick="conn()" type="submit" name="Submit1" /> <br />
		<br />
		<input value="Drop" type="submit" name="Submit" /> ;*/
		
        echo '<td class="style1" style="width: 8%"></td>';
        
        
		
							$q="SELECT  c.c_id   , r.course_code,c.program_id,c.title 
									FROM course c ,  registered r 
										WHERE c.course_code = r.course_code AND student_id='$sid'";
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
													echo  $program;
	
							
//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{

						echo '           '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.
						$course_code.'">
					
						DROP
						
						</a> <br />';
						}
					
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						
						echo '  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funw=withd&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">
						Withdraw
						</a> <br />';
						
						}
						else
						{
							
		echo '  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
					
					}
//print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
										
										
										
										}
									

				echo '</td>';
					

					}					
	}		
}//end if(1)		


///////////////////////////////////////////////////////////////////drop
if (isset ($fund) && $fund="drp")
{	

if(!empty($_REQUEST["id"]) and !empty($_REQUEST["c_id"]))
{	
		$sid=$_REQUEST["id"];
		$p_id=$_REQUEST["p_id"];
		$c_id=$_REQUEST["c_id"];
		
				$q="SELECT  count(r.course_code) AS reg  
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'"; 
						$r = mysql_query($q);
						$r2=mysql_fetch_array($r);
						$re_cont = $r2["reg"];
			
		
		if (($re_cont-1)<2)							
													echo ' <script type="text/javascript"> alert ("ERROR; -Credit hours below  6 credits ! ")</script>';
							else
							{
							$delet="delete from registered where course_code ='$c_id' and student_id='$sid' ";
							$r = mysql_query($delet);
							if ($r)		
									echo ' <script type="text/vbscript"> msgbox ("Courses are successfully dropped ")</script>';
									else
											echo ' <script type="text/javascript"> alert ("ERROR ! ")</script>';
		
								}
		
		
		
		
		
		
//	
												$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title , c.offer
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id =  '".$_SESSION['pro_id']."'  or c.program_id= 'MIT&MBA' )
								AND 
								c.course_code NOT IN (  select course_code from course where c.program_id= 'MIT&MBA' and  c.offer='not offer' ) 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								AND
								 c.course_code NOT IN (SELECT course_code FROM course WHERE offer = 'not offer')
								 	
								order by c.course_code	";		
						
								
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
									
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
				echo $program;			
				print ('    '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;
				<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">
				ADD
				</a> 
				<br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"> </td>';
		
        
        
        
		
							$q="SELECT  c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'";
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
													echo  $program;
	
							print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;
							<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">
							DROP
							</a> 
							<br />');							
										
										}
									

				echo '</td>';
					

					}					
	}		

}//end drop

//Courses are successfully dropped
 //You have dropped more than 2 courses

////////////////////////////////////////////////////////////	add

if (isset ($funa) && $funa="add")
{	

if(!empty($_REQUEST["id"]) and !empty($_REQUEST["c_id"]))
{	
		$sid=$_REQUEST["id"];
		$p_id=$_REQUEST["p_id"];
		$c_id=$_REQUEST["c_id"];
						$q="SELECT  count(r.course_code) AS reg  
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'"; 
						$r = mysql_query($q);
						$r2=mysql_fetch_array($r);
						$re_cont = $r2["reg"];
		
							if (($re_cont+1)>4)							
														echo ' <script type="text/javascript"> alert ("ERROR; -Credit hours exceed  12 credits ! ")</script>';
							else
							{
						
						
						$q="SELECT * FROM `prerequisite` where `c_code` ='$c_id'"; 
						$r = mysql_query($q);
						$num= mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
					{ 
					
					
					  $pre[$i]=mysql_result($r,$i,"pre_code");										
					
										}
						
						$insert="INSERT INTO `crs`.`registered` (`course_code` ,`student_id` ,`course_status` )VALUES ('$c_id', '$sid', 'Active')";
						
						//virfy prerequisite
						$con_pre =0;
						if ($num>0)
						{
										for($i =0; $i <$num; $i++)
												{
												$q1="	SELECT * FROM `prerequisite` where `c_code` ='$c_id' and `pre_code`='$pre[$i]'
													and `pre_code` NOT IN  (SELECT course_code FROM `taken` where `course_code` ='$pre[$i]'
													 And `student_id`='$sid')

																							"; 
																		$rrr = mysql_query($q1);
																	$num_pre= mysql_num_rows($rrr);
																if($num_pre>0)
																{
																$con_pre++;
												echo ' <script type="text/javascript"> alert ("This course has prerequisite '.$con_pre.' : '.$pre[$i].'")</script>';
																}
												}
								if ($con_pre == 0)
										{$r1 = mysql_query($insert);
echo ' <script type="text/vbscript"> msgbox ("Courses are successfully added ")</script>';										
										}
								else
									echo ' <script type="text/javascript"> alert (" You can not Add this Course because that course has prerequisite ")</script>';
								
								
						}
						
						//there are no prerequisite
						else
							{////أدخل السلاحف 
								$r1 = mysql_query($insert);
echo ' <script type="text/vbscript"> msgbox ("Courses are successfully added ")</script>';										
								}
						

							
							} 
						
		
		$sid=$_REQUEST["id"];
		$p_id=$_REQUEST["p_id"];

//
	
													$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title , c.offer
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id =  '".$_SESSION['pro_id']."'  or c.program_id= 'MIT&MBA' )
								AND 
								c.course_code NOT IN (  select course_code from course where c.program_id= 'MIT&MBA' and  c.offer='not offer' ) 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								AND
								 c.course_code NOT IN (SELECT course_code FROM course WHERE offer = 'not offer')
								 	 
								order by c.course_code	";		
							
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
									
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
				echo $program;			
				print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"> </td>';
		
        
        
        
		
							$q="SELECT  c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'";
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
													echo  $program;
	
							print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
										}
									

				echo '</td>';
					

					}					
	}		
}

//end add

	/////////////////////////////////////////////////////////begin withdraw
	
	

if (isset ($funw) && $funw="withd")
{	

if(!empty($_REQUEST["id"]) and !empty($_REQUEST["c_id"]))
{	
		$sid=$_REQUEST["id"];
		$p_id=$_REQUEST["p_id"];
		$c_id=$_REQUEST["c_id"];
		
				$q="SELECT  count(r.course_code) AS reg  
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'"; 
						$r = mysql_query($q);
						$r2=mysql_fetch_array($r);
						$re_cont = $r2["reg"];
					
		
		if (($re_cont-1)<2)							
													echo ' <script type="text/javascript"> alert ("ERROR; -Credit hours below  6 credits ! ")</script>';
							else
							{ 
							


//$year = date('Y');
//echo $year;

$q1="SELECT *
FROM `student` 
WHERE `student_id` = '$sid[$i]'";
$r1 = mysql_query($q1);
							$num = mysql_num_rows($r1);
	
						for($ii =0; $ii <$num; $ii++)
						{   
						 	$student_name= mysql_result($r1,$ii,"student_name");
						  	$semster= mysql_result($r1,$ii,"semster");
						}

$q2="SELECT `Semester_type`, `year`   FROM `period` where `p_id` in 
					( SELECT MAX(p_id)   FROM `period`)";
	$r2 = mysql_query($q2);

	$record2 = mysql_fetch_assoc($r2);	
			$Semester_type=$record2[Semester_type];
			$year=$record2[year];
			echo $Semester_type;


														




$insert="INSERT INTO `x_registered` ( 
`student_id` ,
`course_code` ,
`course_status`,
`year` ,
`Semester` ,
`Semester_type` 
)
VALUES ( 
'$sid', '$c_id' , 'Withdrawn' ,  '$year', '$semster', '$Semester_type')";								
								
$rr=mysql_query($insert);
								/*$insert="INSERT INTO `crs`.`x_registered` (`course_code` ,`student_id` ,`course_status` )VALUES ('$c_id', '$sid', 'Withdrawn')";
							$rr = mysql_query($insert);*/


							$delet="delete from registered where course_code ='$c_id' and student_id='$sid' ";
							$r = mysql_query($delet);
							if ($r)		
									echo ' <script type="text/vbscript"> msgbox ("Courses are successfully Withdrawn ")</script>';
									else
											echo ' <script type="text/javascript"> alert ("ERROR ! ")</script>';
		
								}
		
		
		
		
	
		
//	
									$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title , c.offer
											FROM course c ,  registered r ,taken t 
											WHERE (c.program_id =  '".$_SESSION['pro_id']."'  or c.program_id= 'MIT&MBA' )
											AND 
											c.course_code NOT IN (  select course_code from course where c.program_id= 'MIT&MBA' and  c.offer='not offer' ) 
											 AND
											  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
											AND 
											c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
											AND
											 c.course_code NOT IN (SELECT course_code FROM course WHERE offer = 'not offer')
											
											order by c.course_code	";		
										
												
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
									
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
				echo $program;			
				print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"> </td>';
		
        
        
        
		
							$q="SELECT  c.c_id   , r.course_code,c.program_id,c.title 
								FROM course c ,  registered r 
								WHERE c.course_code = r.course_code AND student_id='$sid'";
					
										$r = mysql_query($q);
																					

				echo '<td width="45%">';
					

					$num = mysql_num_rows($r);
					if($num > 0)
					{
									for($i =0; $i <$num; $i++)
										{   
										 
										 $t=$i+1;
											 $c_id = mysql_result($r,$i,"c_id");
											$course_code= mysql_result($r,$i,"course_code");
											$title= mysql_result($r,$i,"title");
											 $program= mysql_result($r,$i,"program_id");
											// $credithr= mysql_result($r,$i,"credithr");
											 //$c_type= mysql_result($r,$i,"type");
													echo  $program;
	
echo '  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funw=withd&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';						
										
										}
									

				echo '</td>';
					

					}					
	}		

}//end withdraw

	
		?>
        	</tr>
</table>

</body>

</html>
