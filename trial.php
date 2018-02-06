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
if ($_SESSION['type']=="student")
	echo '<style type="text/css"> 

 

body {
	background-position: 0% 0%;
	/*font: 100% Verdana, Arial, Helvetica, sans-serif;*/
	padding: 0;
 }
 
 
.asem{
		color:#999999;
	background-position:right;
	background-position:850px;
	background-repeat:no-repeat;
}

.style4 {
	text-align: left;
}




form {
    margin:             0;
    padding:            0;
    display:            inline;
}



body {
	background-color: #330000;
}

body, td, th {
	color: #FFCC99;
}

h1 {
	color: #FF6666;
}

h2 {
	color: #FF99CC;
}

h3, h4 {
	color: #CC9999;
}

h5, h6 {
	color: #FFCCCC;
}

a{ color: orange}
a:link{	color:red}
a:hover{color:#FF0033;
		font-size:larger;}
			}

form {
	background-color: #990000;
}
</style>

';
?>



<body bgcolor="#FFFF8C">

<table border="1" cellSpacing="7" width="100%" align="center">
	<tr border="0">
		<td border="0"><b><font color="#32230E" ><h3>&nbsp;&nbsp; COURSES OFFERED </h3></font></b>
		<br />
		</td>
		<td style="width: 8%"></td>
		<td><b><font color="#32230E"><h3>&nbsp;&nbsp;&nbsp;&nbsp;COURSES REGISTERED </h3></font></b>
		<br />
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
   
   
   
   
//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						$add_statment='<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />';
						$drop_statment='<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />';
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						$add_statment=('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />');
						$drop_statment='<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';
						}
						else
						{
							$add_statment='<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						$drop_statment='<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
					
					}
					
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
		
			//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />';
						
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
						}
						else
						{
							echo'<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.				$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
					
						
						}
					
					}
					
////////end prodic//	print ('<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r1[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funa=add&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">ADD</a> <br />');			
	
									
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
	
							
//	vrify period 
				$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `A_D_to` ) and `p_id` IN 
												(SELECT MAX(p_id) FROM `period`)";	
										$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{

						echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">DROP</a> <br />';
						}
					else{
					
					$d_q="SELECT * FROM `period` where (sysdate() between  `A_D_from` and `withdraw_to` ) and `p_id` IN
						(SELECT MAX(p_id) FROM `period`)";
						$d_r = mysql_query($d_q);
										$d_num = mysql_num_rows($d_r);
					if($d_num > 0)
						{
						
						echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?funw=withd&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'">Withdraw</a> <br />';
						}
						else
						{
							
						echo '<input type="checkbox" value="'.$c_id.'"  onclick="conn()" type="checkbox" name="r2[]" />  '.$t.'- '.$course_code.'&nbsp; '.$title.' &nbsp;&nbsp;<a href="Register.php?fund=drp&id='.$sid.'&p_id='.$program.'&c_id='.$course_code.'"></a> <br />';
						
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
	}		

}//end drop

	
		?>
        	</tr>
</table>

</body>

</html>
