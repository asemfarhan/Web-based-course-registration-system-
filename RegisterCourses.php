<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

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
.style2 {
	margin-left: 0px;
}
.style3 {
	margin-bottom: 0px;
}
</style>

<link href="stylesheet.css" rel="stylesheet" type="text/css" />

<link rel="STYLESHEET" type="text/css" href="rich_calendar/rich_calendar.css">


</head>



 <?php
include("config.php");

session_start();


require("list.cls.php");
	$obj = new ezSL();
	

include("color.php");

?>

<body >

  <div id="sidebar1">
    </div>
	<h1>Register courses </h1>
	
	     <fieldset style="width: 470px">
   
    <legend> <strong> Serarch for Student </strong></legend>    
	<table style="width: 48%">
    
    
    
    
		<form action="aasearch2.php?fun=srch"  method="post" target="ooo">
		<tr>
			<td style="width: 449px">&nbsp; Student ID
<?php		
		$QueryField="student_id";
		$QueryTable="student";
								
		$obj->CreateComponent("ID", $QueryTable, $QueryField, 40);

?>			</td> 
			
			<td style="width: 676px">&nbsp;			</td>
		</tr>
		  
		  <tr> <td style="width: 449px"><span style="width: 676px">
		    <input  align="middle" type="submit" name="Submit2" value="Search" class="style2"/>
		  </span></td>
		  <td style="width: 676px">
			&nbsp;&nbsp;</td>
		  </tr> 
		</form>
	</table>
	
	
	
	
	
	
	
	
</fieldset><br/>
		<fieldset>
		    <legend> <strong><font size="+2"><h5>MBA Student  </h5>  </font> </strong></legend>    

<table  align="center" border="2" style=" border-color:#000000" >
		 <form style="width: 594px; height: 183px">

          <tr>
          <th width="81" align="center"> Student ID </td>
			<th width="300"align="center"> Student Name</td> 
            <th width="102"align="center">
			Semester No. </td>
            <th width="69" align="center">
			Program </td>
            <th width="61" align="center">Gender</td>
            <th width="100" align="center">Student Status</td>          
</tr>
                            
                                  <?php
								  
		  				$q1='SELECT * FROM `student` where `program_id`="MBA"'; ;
					
										$r = mysql_query($q1);
																					
								
		

					$num = mysql_num_rows($r);
	if($num > 0)
	{
	
	
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
						  echo ' <tr>';
							  		echo '<td align="center">&nbsp;&nbsp;'.$s_id.'</td>'; 
									  echo '<td >&nbsp;&nbsp;	<a href="Register.php?fun=re&id='.$s_id.'&p_id='.$program.'"  >'.$name.'</a></td>'; 
										  echo '<td align="center">&nbsp;&nbsp;'.$semster.'</td>'; 
											 echo '<td align="center"> &nbsp;&nbsp;'.$program.'</td>'; 
												  echo '<td align="center">&nbsp;&nbsp;'. $gender.'</td>';
													   echo '<td align="center">&nbsp;&nbsp;'.$Statue.'</td>'; 
							  
							  
							  
							  
						   echo ' </tr>';
          
          
   
						
						
							
					}
                              
            }                      
                                   ?>
          
        </form> </table>
        </fieldset>
        
        
        
   
   
   
   </br>
   </br>
   </br>
        
        
        <fieldset>
		    <legend> <strong><font size="+2"><h5>MIT Student</h5>  </font> </strong></legend>    

<table  align="center" border="2" style=" border-color:#000000" >
		 <form style="width: 594px; height: 183px">

          <tr>
          <th width="81" align="center"> Student ID </td>
			<th width="300"align="center"> Student Name</td> 
            <th width="102"align="center">
			Semester No. </td>
            <th width="69" align="center">
			Program </td>
            <th width="61" align="center">Gender</td>
            <th width="100" align="center">Student Status</td>          
</tr> 
                            
                                  <?php
								  
		  				$q2='SELECT * FROM `student` where `program_id`="MIT"'; ;
					
										$r = mysql_query($q2);
																					
								
		

					$num = mysql_num_rows($r);
	if($num > 0)
	{
	
	
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
						  echo ' <tr>';
							  		echo '<td align="center">&nbsp;&nbsp;'.$s_id.'</td>'; 
									  echo '<td >&nbsp;&nbsp;	<a href="Register.php?fun=re&id='.$s_id.'&p_id='.$program.'"  >'.$name.'</a></td>'; 
										  echo '<td align="center">&nbsp;&nbsp;'.$semster.'</td>'; 
											 echo '<td align="center"> &nbsp;&nbsp;'.$program.'</td>'; 
												  echo '<td align="center">&nbsp;&nbsp;'. $gender.'</td>';
													   echo '<td align="center">&nbsp;&nbsp;'.$Statue.'</td>'; 
							  
							  
							  
							  
						   echo ' </tr>';
          
          
   
						
						
							
					}
                              
            }                      
                                   ?>
          
        </form> </table>
        </fieldset>
  <tr>
    <td width="205">&nbsp;</td>
    <td width="61">&nbsp;</td>
    <td width="62">&nbsp;</td>
    <td width="205">&nbsp;</td>
  </tr>
  <tr>
    <td height="116" colspan="4">
      
       
	 
       </table>
        <p>&nbsp;</p>
        </fieldset>
  
  <tr>
    <td colspan="4" class="style1">
        <fieldset>
        <legend></legend>
 <table width="486" height="38" border="0" align="center">
          <tr>
            <td>&nbsp;</td>
            </tr>
        </table>
        </body>

</html>
