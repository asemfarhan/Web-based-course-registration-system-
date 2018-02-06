<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:p="urn:schemas-microsoft-com:office:powerpoint" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

 <?php
include("config.php");

session_start();


?>




</head>


<?php 
include("color.php");
?>



<body>

  <div class="style5">

  <div id="sidebar1">
    </div>
  <h1>	Web-based course registration system</h1>
		<p><font size="+3"><b> &nbsp;  NEWS</b></font></p>
		<form action="news.php?fun=all" method="post" > <input type="submit"  value="List All News" /></form>
			<?php 




	/*echo '<table border="1" cellSpacing="0" borderColor="#000000" cellPadding="0" width="650" align="center">
	<tr>
		<td align="middle"><strong>NO</strong></td>
		<td align="middle"><strong>COURSE CODE</strong></td>
		<td align="middle"><strong>COURSE TITLE</strong></td>
		<td><strong>CREDIT HOURS</strong></td>
		<td> PROGRAM</td>
	</tr>';
	*/

	$q="SELECT * 
			FROM news			ORDER BY id DESC	LIMIT 0 , 4";
			
			
			if (isset ($fun) && $fun="all")
					{		$q="SELECT * 
								FROM news			ORDER BY id DESC";
							
						}
				$r = mysql_query($q);
				$num = mysql_num_rows($r);
					for($i =0; $i <$num; $i++)
						{ 
							$t=$i+1;
					$id_ss= mysql_result($r,$i,"id");
						$title = mysql_result($r,$i,"title");
						 	$content= mysql_result($r,$i,"content");
		
						
				echo '<fieldset> <h3 style="	text-decoration: underline;">'.$t.'. '.$title.'	</h3><p>'.$content.'	</p></fieldset> </br>';
				
				}
				
				
				//end for
	echo '</fieldset>';
	?>
    
        </div>
        </body>

</html>
