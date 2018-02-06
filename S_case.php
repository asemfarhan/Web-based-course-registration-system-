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

session_start();?>



<?php 
include("color.php");


?>

<body>
<h1>Register Courses for Special Cases </h1>
    
<table border="1" cellSpacing="7" width="100%" align="center">
	<tr border="0">
		<td border="0"><h2 align="center">COURSES OFFERED</h2>
		</td>
		<td style="width: 8%"></td>
		<td><h2 align="center">COURSES REGISTERED </h2>
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
	  
	
        
        
        
        
                
        
        
        
        <?php 
		$sid=$_REQUEST["id"];

$qq="SELECT * from student  where student_id='$sid'";
$rrr = mysql_query($qq);





$record =mysql_fetch_assoc($rrr);



	$name=$record[student_name];
	$semster=$record[semster];
	$pro_id=$record[program_id];

echo 'Student Name :'.$name.'</br>';
echo 'Semster :'.$semster.'</br>';
echo 'program :'.$pro_id.'</br>';

if (isset ($fun) && $fun="re")
{	

if(!empty($_REQUEST["id"]) and !empty($_REQUEST["p_id"]))
{	
		$sid=$_REQUEST["id"];
		$p_id=$_REQUEST["p_id"];
$_SESSION['pro_id']=$p_id;

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
				print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
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
	
							print ('  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
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
				print (''.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
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
	
							print ('   '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
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
																			/*			$q="SELECT * FROM `prerequisite` where `c_code` ='$c_id'"; 
																							$r = mysql_query($q);
																							$num= mysql_num_rows($r);
						
						
	if ($num>0)
																				
																				{	
																					$q1="SELECT * FROM `taken` where `course_code` ='$c_id'  And `student_id`='$sid'"; 
																						$r1 = mysql_query($q1);
																						$nu1 = mysql_num_rows($r1);
																						if ($num == $nu1)*/
																						
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
									echo ' <script type="text/javascript"> alert (" Yo cant Add this Course because that course has prerequisite ")</script>';
								
								
						}
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
				print (''.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
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
	
							print (' '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="S_case.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
										}
									

				echo '</td>';
					

					}					
	}		
}

//end add

		
		?>
        	</tr>
</table>

</body>

</html>
