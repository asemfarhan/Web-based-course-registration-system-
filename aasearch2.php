<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

 <?php
include("config.php");

session_start();?>

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
	<script language="JavaScript" type="text/javascript" src="rich_calendar/rich_calendar.js"></script>

	<script language="JavaScript" type="text/javascript" src="rich_calendar/rc_lang_en.js"></script>
	

	<script language="javascript" src="domready/domready.js"></script>
	<script language="javascript" src="formatDate.js"></script>
	
	  <script language="javascript" src="logout.js"></script>

  <script type="text/javascript" src="scripts.js"></script>  
    <script type="text/javascript" src="jquery-1.2.6.js"></script> 
	    <link rel="stylesheet" href="lavalamp_test.css" type="text/css" media="screen">
    <script type="text/javascript" src="jquery-1.2.3.min.js"></script>
    <script type="text/javascript" src="jquery.easing.min.js"></script>
    <script type="text/javascript" src="jquery.lavalamp.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#1, #2, #3").lavaLamp({
                fx: "backout",
                speed: 700,
                click: function(event, menuItem) {
                    return false;
                }
            });
        });
    </script>  


</head>

<?php 
include("color.php");
?>

<body>

  <div id="sidebar1">
    </div>
	<h1>Student serarch </h1>
	
	     <fieldset style="width: 470px">
   
    <legend> <strong> Serarch for Student </strong></legend> 
    		<form action="aasearch2.php?fun=srch"  method="post" target="ooo">
		
        
        <tr>
			<td style="width: 449px">&nbsp; Student ID
			<input type="text" name="ID" value="" size="50"  style="width: 304px"/>
			</td> 
			
			<td style="width: 676px">&nbsp;
			</td>
		</tr>
		  
		  <tr> 
		  <td style="width: 676px">
			&nbsp;&nbsp;<input type="submit" name="Submit" value="Search" class="style2"/></td>
		  </tr> 
		</form>   



<?php 	
			if (isset ($fun) && $fun="srch")
				{
					
						if ( empty($_POST["ID"]) )
					{
					echo ' <script type="text/javascript"> alert("please insert student information!");</script>';
					
					}
			else {
					
								$id=$_POST["ID"];
					
									$q="SELECT * FROM `student` WHERE `student_id`='$id'";
					
										$r = mysql_query($q);
																					

		
					

					$num = mysql_num_rows($r);
	if(!($num > 0))
		{echo "</br></br> &nbsp;&nbsp; No data found.";
		}	
		else
		{
	echo '</fieldset><br/>';
	
	
						for($i =0; $i <$num; $i++)
						{   
						 
						 $t=$i+1;
							 $sid = mysql_result($r,$i,"student_id");
						 	$name= mysql_result($r,$i,"student_name");
						  	$semster= mysql_result($r,$i,"semster");
							 $p_id= mysql_result($r,$i,"program_id");
							 $Statue= mysql_result($r,$i,"Statue");
							 $gender= mysql_result($r,$i,"gender");
							 $dgree= mysql_result($r,$i,"dgree");
							 $year= mysql_result($r,$i,"year");
							 
							
					
				
						
					
			  
echo '<fieldset>  <legend> <strong>Student Info  </strong></legend> ';	
 echo '<table border="0" align="center" > <form style="width: 594px; height: 183px">  <tr> <td> Student Name</td>';
 echo '<td > <input type="text" name="studentname" value="'.$name.'" size="50" readonly/>	  </td>';
	 echo '<td> &nbsp;&nbsp;gender</td><td><input type="text" name="gender" value="'.$gender.'"  readonly/></td></tr>';
	
	
	
echo '<tr> <td><br />Student ID</td> <td height="29"><input type="text" name="studentid" value="'.$sid.'" readonly />';
          
           
echo '	</td>      <td><br />	Semester No. </td>       <td><input type="text" name="semno" value="'.$semster.'" readonly />	</td>   </tr>';		
           
echo '   <tr> <td><br />Program </td> <td> <input type="text" name="programname" value="'.$p_id.'" readonly /></td> <td><br />';
			
 echo '    Student Status</td>  <td><input type="text" name="studentstatus" value="'.$Statue.'" readonly /> </td>  </tr><tr><td style="height: 43px"><br />';
			
            
 echo ' 	Dgree </td><td style="height: 43px"><input type="text" name="dgree" value="'.$dgree.'" readonly /></td><td style="height: 43px"><br />';
			            
			
 echo ' 	Semester Year</td> <td style="height: 43px"><input type="text" name="semyear" value="'.$year.'" readonly /> </td></tr>      </form> </table>';
           
            
 			   echo '</fieldset></br></br>';/////////////////////////////////////////////////////////////////////////////////////
			   
			   				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  
 echo '<fieldset> </fieldset>'; 	


echo '</br></br>';

$_SESSION['pro_id']=$p_id;

echo '<table border="1" cellSpacing="7" width="100%" align="center">
	<tr border="0">
		<td border="0"><b><h2 align="center">COURSES OFFERED </h2>
		
		</td>
		<td style="width: 8%"></td>
		<td><b><h2 align="center">COURSES REGISTERED </h2>
		
		</td>
	</tr>
	<tr>';
	
	}	
			
			
			
		
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
						echo '   '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />';
						
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						echo '   '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
						else
						{
							echo'  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
					
						
						}
					
					}
					
////////end prodic//	print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
	
									
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
	
							
//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{

						echo '  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />';
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						
						echo '   '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funw=withd&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';
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
		
	echo '	</tr>



</table> </br></br>';

/*
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
			echo $re_cont.' is a count of register course';		
		
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
								$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id = '".$_SESSION['pro_id']."' OR c.program_id = 'MIT&MBA') 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								order by c.course_code

								";
					
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
				print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"><input value="Add"  onclick="conn()" type="submit" name="Submit1" /> <br />
		<br />
		<input value="Drop" type="submit" name="Submit" /> </td>';
		
        
        
        
		
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
	
							print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
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
			echo $re_cont.' is a count of register course';
							if (($re_cont+1)>4)							
														echo ' <script type="text/javascript"> alert ("ERROR; -Credit hours exceed  12 credits ! ")</script>';
							else
							{
						
						
						$q="SELECT * FROM `prerequisite` where `c_code` ='$c_id'"; 
						$r = mysql_query($q);
						$num= mysql_num_rows($r);
						
						
						$insert="INSERT INTO `crs`.`registered` (`course_code` ,`student_id` ,`course_status` )VALUES ('$c_id', '$sid', 'Active')";
						
						//virfy prerequisite
						if ($num>0)
						
						{	
							$q1="SELECT * FROM `taken` where `course_code` ='$c_id'  And `student_id`='$sid'"; 
								$r1 = mysql_query($q1);
								$nu1 = mysql_num_rows($r1);
								if ($num == $nu1)
										{$r1 = mysql_query($insert);
echo ' <script type="text/vbscript"> msgbox ("Courses are successfully added ")</script>';										
										}
								else
									echo ' <script type="text/javascript"> alert (" Yoy can/t Add this Course because that course has prerequisite ")</script>';
								
								
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
	
								$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id = '".$_SESSION['pro_id']."' OR c.program_id = 'MIT&MBA') 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								order by c.course_code

								";
					
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
				print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"><input value="Add"  onclick="conn()" type="submit" name="Submit1" /> <br />
		<br />
		<input value="Drop" type="submit" name="Submit" /> </td>';
		
        
        
        
		
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
	
							print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />');							
										
										}
									

				echo '</td>';
					

					}					
	}		
}

//end add

	/////////////////////////////////////////////////////////with 
	
	

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
			echo $re_cont.' is a count of register course';		
		
		if (($re_cont-1)<2)							
													echo ' <script type="text/javascript"> alert ("ERROR; -Credit hours below  6 credits ! ")</script>';
							else
							{ 	$insert="INSERT INTO `crs`.`x_registered` (`course_code` ,`student_id` ,`course_status` )VALUES ('$c_id', '$sid', 'Withdrawn')";
							$rr = mysql_query($insert);

							$delet="delete from registered where course_code ='$c_id' and student_id='$sid' ";
							$r = mysql_query($delet);
							if ($r)		
									echo ' <script type="text/vbscript"> msgbox ("Courses are successfully Withdrawn ")</script>';
									else
											echo ' <script type="text/javascript"> alert ("ERROR ! ")</script>';
		
								}
		
		
		
		
		
		
//	
								$q="SELECT DISTINCT c.c_id   ,c.program_id, c.course_code , c.title
								FROM course c ,  registered r ,taken t 
								WHERE (c.program_id = '".$_SESSION['pro_id']."' OR c.program_id = 'MIT&MBA') 
								 AND
								  c.course_code NOT IN(  select course_code from registered where student_id='$sid' )
								AND 
								c.course_code NOT IN (  select course_code from taken where student_id='$sid' ) 
								order by c.course_code

								";
					
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
				print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />');			
										
									
									
										}
									

				echo '</td>';
					
					}		
		
		

        
        
        
        
        
        
        
        
        
		echo '<td class="style1" style="width: 8%"><input value="Add"  onclick="conn()" type="submit" name="Submit1" /> <br />
		<br />
		<input value="Drop" type="submit" name="Submit" /> </td>';
		
        
        
        
		
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
	
echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funw=withd&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';						
										
										}
									

				echo '</td>';
					

					}					
	echo '	</tr>
</table>';	
	
					

			
					
			}//for		
		}//num
//else num
					
*/
						
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
