<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:p="urn:schemas-microsoft-com:office:powerpoint" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Language" content="en-gb" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>



 <?php
include("config.php");

session_start();



	
?>

</head>



<?php 
include("color.php");
?>


<body>

	<h1>Set offer course </h1>
		<form action="set_offer_c.php?fun=update"   method="post" >	 
<table width="700" border="1"" align="center" bordercolor="#000000"  style= " width: 668px;" height: 325px;>

</fieldset>
<tr>
		<th width="24" align="middle"><strong>NO</strong></th>
		<th width="93" align="middle"><strong>COURSE CODE</strong></th>
		<th width="262"  align="middle"><strong>COURSE TITLE</strong></th>
		<th width="65" align="middle" ><strong>CREDIT HOURS</strong></th>
		<th width="84"> PROGRAM</th>
		<th width="110">OFFER</th>
	</tr>



<?php 

	///////////////////////////////update
if ( isset($fun) && $fun="update")
{
		$num = count($cors);
			$num2 = count($c_idi);
			

				for($i =0; $i <$num; $i++)
						{
						$q="UPDATE  `course` SET `offer` = '$cors[$i]' WHERE `c_id` ='$c_idi[$i]'";
					$r = mysql_query($q);
	
		}//end for
	 if ($r)
				echo ' <script type="text/vbscript"> msgbox("   successfully courses updated ")</script>';															  else
	echo ' <script type="text/javascript"> alert("Error.");</script>';	
}
//end update



	$q="SELECT * FROM `course` ";
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
									
						
				echo ' <tr><td>'.$t.'</td>				<td>'.$course_code.'</td>		<td>    '.$title.'</td>		<td align="middle"> '.$credithr.'</td><td align="middle"> '.$p_id.'</td>	';
echo '		<td >
<img src="img/edit.png" align="middle" border="1">	<input type="hidden" value="'.$c_id.'" id="c_id[]" name="c_idi[]" />
<select  id="cors[]" name="cors[]">';
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
			</tr>';


					}	//endfor 
					
				echo ' 	<tr>
				 <td colspan="6" align="center" > <input value="Update" align="center"  type="submit" name="Update" </td></tr>';





?>
	
	
</table>
<p class="style1">

            
</form>

            
            
				</p>
                
            
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;
</p>

</body>

</html>
