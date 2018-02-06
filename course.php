<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>




 <?php
include("config.php");

session_start();


?>


<?php 
include("color.php");
?>



<script language='javascript'>
function validate_form(form)
{
with (form)
{
if (form.coursecode.value == "" || form.coursecode.value == null)
  {alert("Not a valid course code!");coursecode.focus();return false}
if (form.course_title.value == "" || form.course_title.value == null)
  {alert("Not a valid course title!");course_title.focus();return false}
if(form.programname.value == "" || form.programname.value == null || form.programname.value=="Select a Program")
  {alert("You have to select a Program!");programname.focus();return false}
  if (form.credit_hrs.value == "" || form.credit_hrs.value == null)
  {alert("You have to enter the course credit hours!");credit_hrs.focus();return false}
   if (form.coursetype.value == "" || form.coursetype.value == null || form.coursetype.value=="Select Course Type" )
  {alert("You have to select the course type!");coursetype.focus();return false}

}
}

</script>

<body>



           
    
    
    
  
  
                      
 <?php
 if(isset ($fun) and $fun=="add")
{
 echo'
 <h1>	Course Information</h1> 
 <fieldset>
   
  <legend> <strong><h2>New Course</h2>  </strong></legend>';

	
   
echo '<fieldset>    <table  bordercolor="#333333" cellspacing="4" width="660">

<form name="form" action="course.php?fun=addc" method="post" onSubmit="return validate_form(form);">

	<tr bordercolor="#9999">
    <td  width="150">

       Course Code:</td>
       <td width="200" align="left">
       <input type="text" name="coursecode"  size="11" /></td>
			            
            <td align="right" width="120">Program:</td><td><select name="programname">
               
               <option selected="selected" value="MIT">MIT</option> 
			<option value="MBA">MBA</option>
			<option value="MIT&MBA">MIT&MBA </option>
			    </select></td>
      </tr>
						
                
                <tr  bordercolor="#9999">
                
                

             <td>Course Title:			</td>
            <td>
                 <input type="text"  size="40" name="course_title" >                            </td>
                	<td align="right"> Course Type:</td><td>  <select name="coursetype">
               
                 <option value="compulsory">compulsory</option>
                  <option value="elective">elective</option>
                   
                </select>
                </td></tr>
                            
                                            <tr  bordercolor="#9999">
                            
  						<td >Course Offer</td><td><select  id="offer" name="offer">

<option  selected="" value="offer">Offer</option>
<option value="not offer">Not offer</option> 
</td>
						  </tr>

       <tr  bordercolor="#9999">
       <td>     &nbsp;&nbsp;&nbsp;   </td></tr> 
 
 
       <tr  bordercolor="#9999">
       <td>         
       Add New Prerequisite</td>
     </tr>
     <tr><td>
     Course Code:
     </td>  <td>
		<input type="text" name="pre"  size="11" />
        </td>
      </tr>
<tr><td colspan="4" align="center">
<br><input type="submit" name="Submit" value="Add"> 
             <br/></td> </tr> </form></table>
</fieldset><fieldset>';







}








 // coursecode  course_title  offer  coursetype  programname
/////////////////////////////////////////Add course

//==========================================

if(isset ($fun) and $fun=="addc")
{
	if (isset ($_POST["coursecode"]) && isset ($_POST["course_title"]))
	{
			//$c_id=$_POST["c_id"];
			$course_code=$_POST["coursecode"];
			$course_title=$_POST["course_title"];
			$offer=$_POST["offer"];
			$coursetype=$_POST["coursetype"];
			$p_id=$_POST["programname"];

	
				$q="INSERT INTO `crs`.`course` (`c_id`, `course_code`, `title`, `program_id`, `credithr`, `type`, `offer`) VALUES (NULL,  '$course_code','$course_title','$p_id', '','$coursetype','$offer' )";
		
		
		
		
		$r=mysql_query($q);
			if($r)
			{
				echo ' <script type="text/vbscript"> msgbox (" Course are successfully Added ")</script>';										
	
			
			/////////////////
			//////////////add prerequisiste
			if (!empty($_POST["pre"]))
			{
					$pre=$_POST["pre"];
				if($pre==$course_code)
										echo ' <script type="text/vbscript"> alert (" prerequisite and course ocde are same! ")</script>';														
				else{
				$qp="SELECT * FROM `course` where course_code='$pre'";
					$rr = mysql_query($qp);
					$num = mysql_num_rows($rr);
						if ($num>0)
						{
							$qpp="INSERT INTO prerequisite VALUES (NULL,  '$course_code','$pre' )";
								$rrr = mysql_query($qpp);
									if($rrr)
										echo ' <script type="text/vbscript"> msgbox (" prerequisite are successfully Added ")</script>';										
											else
											echo ' <script type="text/vbscript"> alert ("There are no prerequisite Added ")</script>';										
										
							
						}
						else
							echo ' <script type="text/vbscript"> alert (" Invalid prerequisite course code! no prerequisite Added ")</script>';										

			
			}
			}
			
			
			
			
			 echo'
					 <h1>	Course Information</h1> 
					 <fieldset>
					   
					  <legend> <strong><h2> Course information</h2>  </strong></legend>
					<p> successfully add new course :'.$course_title.'</p> and the new course list down: ';
			
			}


		else
			{		echo ' <script type="text/vbscript"> alert ("Error, course not saved ! Course code must be uniqe")</script>';
 echo'
					 <h1>	Course Information</h1> 
					 <fieldset>
					   
					  <legend> <strong><h2> Course information</h2>  </strong></legend>';
				echo '<a href="course.php?fun=add" >Go back</a>';	
				/* sleep(4);
				   header("location:course.php?fun=add"," <script type='text/vbscript'> alert ('Error, course not saved ! Course code must be uniqe')</script>");
				*/
				}
	}

}







//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

 if(isset ($fun) and $fun=="search")
{

require("list.cls.php");
	$obj = new ezSL();
	


 echo '  <h1>	Search for Course </h1> 
  <fieldset>
 			<legend> <strong> Serarch for course </strong></legend>    
			<table style="width: 48%">
    
     
       <form   action="course.php?fun=search" method="post" >

	
		  <tr> <td style="width: 449px"><span style="width: 676px">';
		  
    
print('<input type="submit" name="Submit" value="Search" style="float:right;"/>'); 
		
		$QueryField="course_code";
		$QueryTable="course";

		$obj->CreateComponent("course_code", $QueryTable, $QueryField, 20);


	echo '	</td>
		  <td style="width: 676px">
			&nbsp;&nbsp;</td>
		  </tr> 
		</form>
	</table>
	</fieldset>
	<fieldset>';

/////

if(isset($_REQUEST["course_code"]))
	{$c=$_REQUEST["course_code"];
	
	
	

	
		$q="SELECT * FROM `course` where course_code='$c'";
					$r = mysql_query($q);
					$num = mysql_num_rows($r);
						if ($num>0)
						{
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
										
							

echo '




<fieldset>  



<table  bordercolor="#333333" cellspacing="4" width="660">

<form name="form" action="course.php?fun=update" method="post" onSubmit="return validate_form(form);">

	<tr bordercolor="#9999">
    <td  width="150">

       Course Code:</td>
       <td width="200" align="left">
       <input type="text" value="'.$course_code.'" name="coursecode"  size="11" /></td>
			            
            <td align="right" width="150">Program:</td><td><select name="programname">
               
               ';
			   
			   if ($p_id=="MIT&MBA")
			   echo ' <option  value="MIT">MIT</option> 
			<option value="MBA">MBA</option>
			<option selected="selected" value="MIT&MBA">MIT&MBA </option>';
	

			   else if ($p_id=="MIT")
			   echo ' <option selected="selected" value="MIT">MIT</option> 
			<option value="MBA">MBA</option>
			<option value="MIT&MBA">MIT&MBA </option>';
			  
			   else 
			   echo ' <option value="MIT">MIT</option> 
			<option selected="selected" value="MBA">MBA</option>
			<option value="MIT&MBA">MIT&MBA </option>';
			  //($p_id=="MBA")
			  
	
	echo'
			    </select></td>
      </tr>
						
                
                <tr  bordercolor="#9999">
                <input type="hidden" value="'.$c_id.'" id="c_id" name="c_id" />
                

             <td>Course Title:			</td>
            <td>
                 <input type="text" value="'.$title.'"  size="40" name="course_title" >                         </td>
                	<td align="right"> Course Type:</td><td> 
					
					
					
					 <select name="coursetype">';
               
                 
if ($c_type=="compulsory")
echo'<option  selected="" value="compulsory">compulsory</option>
                  <option value="elective">elective</option>';

else
echo'		<option value="compulsory">compulsory</option>
     <option  selected=""  value="elective">elective</option>';
                   
echo '                </select>
                </td></tr>
                            
                            <tr  bordercolor="#9999">
                            
  						<td >Course Offer</td><td>
						
						<select  id="offer" name="offer">';     
if ($offer=="offer")
{
echo'<option  selected="" value="offer">Offer</option>';
echo	'<option value="not offer">Not offer</option>;';
}
else
{
echo '<option   value="offer">Offer</option>';
echo	'<option selected="" value="not offer">Not offer</option>;';

}
echo '</select>

</td>
						  </tr>
                
       <tr  bordercolor="#9999">
       <td>     &nbsp;&nbsp;&nbsp;   </td></tr> 
 
 
       <tr  bordercolor="#9999">
       <td>         
       Add New Prerequisite</td>
     </tr>
     <tr><td>
     Course Code:
     </td>  <td>
		<input type="text" name="pre"  size="11" />
        </td>
      </tr>
<tr><td colspan="4" align="center">
</br>

<input type="submit"  name="Submit" value="Update"/>
             <br/></td> </tr> </form></table>
</fieldset><fieldset>
';
	
						}	//endfor 
	/*echo ' <script type="text/vbscript"> msgbox ("Courses are successfully search ")</script>';			*/							
					exit();
		}
					else
						echo ' <script type="text/javascript"> alert (" Invalid course information! ")</script>';

				echo ' 	<tr>';


									
										
}										



}




//end




///////////////////////////////////////////////////////////////update

 if(isset ($fun) and $fun=="update")
{
$c_id=$_POST["c_id"];
$course_code=$_POST["coursecode"];
$course_title=$_POST["course_title"];
$offer=$_POST["offer"];
$coursetype=$_POST["coursetype"];
$p_id=$_POST["programname"];
 // coursecode  course_title  offer  coursetype  programname

$q="UPDATE course SET course_code = '$course_code',
title = '$course_title',
program_id = '$p_id',
type ='$coursetype',
offer = '$offer' WHERE c_id ='$c_id'  ";

$r=mysql_query($q);
	if($r)
	{	echo ' <script type="text/vbscript"> msgbox ("'.$course_code.' Course are successfully updated ")</script>';										
	
	
			if (!empty($_POST["pre"]))
			{
					$pre=$_POST["pre"];
				if($pre==$course_code)
										echo ' <script type="text/vbscript"> alert (" prerequisite and course ocde are same! no prerequisite Added ")</script>';														
				else{
				$qp="SELECT * FROM `course` where course_code='$pre'";
					$rr = mysql_query($qp);
					$num = mysql_num_rows($rr);
						if ($num>0)
						{
							$qpp="INSERT INTO prerequisite VALUES (NULL,  '$course_code','$pre' )";
								$rrr = mysql_query($qpp);
									if($rrr)
										echo ' <script type="text/vbscript"> msgbox (" prerequisite are successfully Added ")</script>';										
											else
											echo ' <script type="text/vbscript"> alert ("There are no prerequisite Added ")</script>';										
										
							
						}
						else
							echo ' <script type="text/vbscript"> alert (" Invalid prerequisite course code! no prerequisite Added ")</script>';										

			
					}
				}
			
	
	}
	else
			echo ' <script type="text/vbscript"> alert ("Course code must be uniqe, course Not updated ")</script>';										


/////////////////////////////
require("list.cls.php");
	$obj = new ezSL();
	


 echo '  <h1>	Search for Course </h1> 
  <fieldset>
 			<legend> <strong> Serarch for course </strong></legend>    
			<table style="width: 48%">
    
     
       <form   action="course.php?fun=search" method="post" >

	
		  <tr> <td style="width: 449px"><span style="width: 676px">';
		  
    
print('<input type="submit" name="Submit" value="Search" style="float:right;"/>'); 
		
		$QueryField="course_code";
		$QueryTable="course";

		$obj->CreateComponent("course_code", $QueryTable, $QueryField, 20);


	echo '	</td>
		  <td style="width: 676px">
			&nbsp;&nbsp;</td>
		  </tr> 
		</form>
	</table>
	</fieldset>
	<fieldset>';

/////								
//else
								
}


///////////////////////////////////////////////////////////












echo '<table width="700" border="1"" align="center" bordercolor="#000000"  style= " width: 668px;" height: 325px;>

</fieldset>
<tr>
		<th width="24" align="middle"><strong>NO</strong></th>
		<th width="93" align="middle"><strong>COURSE CODE</strong></th>
		<th width="262"  align="middle"><strong>COURSE TITLE</strong></th>
		<th align="middle" > EDIT</th>
		<th width="84"> PROGRAM</th>
		<th width="110">OFFER</th>
	</tr>

';

	$q="SELECT * FROM `course` ORDER BY program_id,title ASC";
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
									
						
				echo ' <tr><td>'.$t.'</td>				<td>'.$course_code.'</td>	<a href="course.php?fun=search&course_code='.$course_code.'" > 	<td> 
  '.$title.'</td><td align="middle" ><img src="img/edit.png" align="middle" border="1" align="right">    </td> </a>		<td align="middle"> '.$p_id.'</td>	';
echo '		<td  align="middle">
	<input type="hidden" value="'.$course_code.'" id="course_code" name="course_code" />'.$offer.'
		</td>
			</tr>';


					}	//endfor 
					
				echo ' 	<tr></table>';


 ?>
</body>
</html>
