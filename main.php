<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Course Registration System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<?php include("config.php");
 session_start();
 if ($_SESSION['type']==null)
 {echo ' <script type="text/vbscript"> confirm ("please isert your information" )</script>';
		   header("location: index.php") or die("THE PAGE DON'T EXSIST!");
						   }
 ?>
<style type="text/css">
body {
	/* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	background-position: 0% 0%;
	/*font: 100% Verdana, Arial, Helvetica, sans-serif;*/
	padding: 0;
 }




form {
    margin:             0;
    padding:            0;
    display:            inline;
}



body {
	background-color: #000000;
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
}
form {
	background-color: #990000;
}

#navigation a {
	font: bold 11px Arial, Helvetica, sans-serif;
	color:#FFFF8C;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	padding:8px 6px 10px 20px;
	}
 	
#navigation a:hover {
	background:black;
	color:#FFFF99;
	background-image:url('img/c1.gif');
	background-position:right;
	background-repeat:no-repeat;
	}
.style1 {
	margin-right: 0px;
}

 
.style2 {
	text-align: center;
	font-size: large;
	color: #000000;
}
</style>

    
<?php 

if ( isset ($col) && $col=="Red")
$_SESSION['w_color']='Red';

if ( isset ($col) && $col=="Gary")
$_SESSION['w_color']='Gary';

if ( isset ($col) && $col=="White")
$_SESSION['w_color']='White';

if ( isset ($col) && $col=="Brown")
$_SESSION['w_color']='Brown';


/*
//echo ' <script type="text/javascript"> alert("xxxxxxxx'.$col.'");</script>';

if(isset ($col) && $_SESSION['w_color']=="Red")
{
 echo '<link   href="sit_color/Red.css" rel="stylesheet" type="text/css" />';
}

 else if(isset ($col) && $_SESSION['w_color']=="Gary")
{
 echo '<link   href="sit_color/Gary.css" rel="stylesheet" type="text/css" />';

}
 else if(isset ($col) && $_SESSION['w_color']=="Brown")
{
//$_SESSION['w_color']=$col;
 echo '<link   href="sit_color/Brown.css" rel="stylesheet" type="text/css" />';
 }
 else
 $_SESSION['w_color']='';

//echo '<link   href="sit_color/'.$_SESSION['w_color'].'.css" rel="stylesheet" type="text/css" />';
*/
?>
     

<body  >
<table  bgcolor="#999999" style="width: 90%;border-color:blue;"  align="center">
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td>
<table width="90%" border="0"    class="navText" bgcolor="#DEDECA" bcellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3" border="0">
    <td colspan="6" bgcolor="#DDDBDA" >
 
	<img src="img/2.png" alt="Header image" width="800" height="118" border="0" /></td>
  </tr>



  <tr>
    <td colspan="7" bgcolor="#FFFFCC" background="71.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#000000">
  	<td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<font   spry:hover="navText" >User type :<?php   echo $_SESSION['type']; ?>
  	

	</font>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

      
      <script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <a href="main.php?col=Red" ><font color="#FF0000">Red</font></a> - 
      <a href="main.php?col=Gary" ><font  color="#339900"><b>Gary</b></font></a> - 
      <a href="main.php?col=Brown" ><font  color="#FDE122">Brown</font></a> -
      <a href="main.php?col=White" ><font  color="#FFFFFF">White</font></a> 
     
 
     
     
      </td></tr>
  <tr>
    <td colspan="7" bgcolor="#FFFF8C" background="img/c1.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

 <tr>
    <td width="240" valign="top">
		<iframe src="catagry\<?php  echo $_SESSION['type']; ?>.htm"       scrolling="no" frameborder="0" align="middle" target="ooo" class="style1" style="width: 220px; height: 550px" >

</iframe>
	</td>
    <td colspan="1" valign="top">
	
	
	
		
	

	
	
	<iframe src="news.php"  title="bbmn"   name="ooo"   scrolling="auto" align="middle" target="_self" style="width: 960px; height: 521px" class="style1" >

</iframe>



	</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td width="70" style="width: 70px">&nbsp;</td>
    <td width="3" style="width: 3px">&nbsp;</td>
	<td width="124" style="width: 124px">&nbsp;</td>
  </tr>
</table>
</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="width: 49px">&nbsp;</td>
    <td   class="style2" style="width: 1140px;font:message-box;font-size:13px ">© 2010 International College / All Rights Reserved.</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
