 <?php
include("config.php");

session_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User information</title>


</head>

<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset ($fund) && $fund="Del")
	{
		
		

			$id=$_POST["hed"];
					$q = "delete from prerequisite  where id='$id';";
															$r = mysql_query($q);
																					
																 if ($r)
										echo ' <script type="text/vbscript"> msgbox (" prerequisite are successfully deleted.")</script>';										
															  else
															  echo "error";
		

			
			
	}

?> 



<?php 
include("color.php");
?>


<body>

  <div id="sidebar1">
    </div>
	<h1>prerequisite </h1>
	
	     <fieldset   style="width: 879px">
   
    <legend> <strong> Prerequisite information </strong></legend>    
	<table  align="center">
		<tr>
				<td style="width: 158px">
				<table  border="1"  width="900"align="center"> 
					<tr>
						<th >NO</th>
                        <th >COURSE CODE</th>
						<th >COURSE TITLE </th>
						<th >PRO_ </th>
                        <th  width="90">PRE_CODE</th>
						<th >PREREQUISITE  TITLE </th>
						<th >PRO_ </th>

					  <th  width="40"  >Delete</th>
					</tr>
				
			<script type="text/javascript">
		function con()
		{
		// You can change 30 and 0.3 to suit your 'tastes' :)
		bo = document.getElementsByTagName('hed').value;



	var mmm=confirm('Are you sure do you want to delete?');
		if (mmm)
		{		
				 window.close();
      	document.close();

			return true;
		}
		else
		{			 window.close();

				return false;
	alert("delete operation had been canceled");
		}
		

		
		}</script>
		
	
					
		<?php 
					$q="SELECT r.id ,r.c_code  ,c.title  as c_title, c.program_id,  r.pre_code , cc.title as pre_title, cc.program_id as program_id1 FROM prerequisite r, course c ,course cc
								where r.c_code=c.course_code
								 and r.pre_code=cc.course_code ";
					$r = mysql_query($q);
					$num = mysql_num_rows($r);
		
		
				for($i =0; $i < $num; $i++)
					{	
						$id = mysql_result($r,$i,"id");
						$c_code = mysql_result($r,$i,"c_code");
						$c_title= mysql_result($r,$i,"c_title");
						$pre_code= mysql_result($r,$i,"pre_code");
						$pre_title= mysql_result($r,$i,"pre_title");
						$program_id1= mysql_result($r,$i,"program_id1");
						$program_id= mysql_result($r,$i,"program_id");
						
				$t=$i+1;
						echo '<form action="prereq.php?fund=Del" name="asem'.$i.'"onSubmit=" return con();return true;"  method="post"> ';		 
					//															
					echo '<tr>
					
						<td align="center"  >'.$t.'</td>';
					echo '<td  >'.$c_code.'</td>';
					echo '<td >'.$c_title.'</td>';
					echo '<td >'.$program_id.'</td>';
					echo '<td  >'.$pre_code.'</td>';		
					echo '<td >'.$pre_title.'</td>';
					echo '<td >'.$program_id1.'</td>';
					echo '<td align="center"  > <input type="hidden" name="hed"  value="'.$id.'" /><input  type="image" name="img"  align="middle" value="'.$id.'"  src="img/del.png" /></td>';
				//	echo '<td style="width: 7px"><input type="submit"  name="del" value="'.$user_id.'"    /></td></tr>';
				//
				echo '</tr>';
				
				//echo '<td style="width: 7px"><a href="Userinfo.php?fund=Del" alt="del"><img s align="middle" alt="edit"/></a>	</td>;
					
							echo '</form>';								
											
						}
				?>


					
					
					
				</table>
		  </td>
		</tr>
		<tr><td style="width: 158px">
		
		
		</td></tr>
	</table>
	

	
        </fieldset>
        </body>

</html>
