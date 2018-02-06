<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<?php
include("config.php");
include("color.php");
 session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
About Me</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="FW MX 2004 DW MX 2004 HTML">
<!--Fireworks MX 2004 Dreamweaver MX 2004 target.  Created Thu May 22 17:47:24 GMT+0300 (Arab Standard Time) 2008-->
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


<script type="text/javascript" language="JavaScript">
<!--
function addmsg(){
alert("add/drop and withdraw dates are added");
return false;
}

function updatemsg(){
alert("add/drop and withdraw dates are updated");
return false;
}


function check_da2te(){
alert("dddddsd");

var d = new Date();
var formatted_date = d.formatDate("Y-m-d");
alert(formatted_date);
if(myForm.text_field.value < formatted_date){
alert("Invalid Add From date. \nIt's less than today's date!");
return false;}
if(myForm.text_field.value>=myForm.text_field2.value){
alert("Invalid Add To date. \nIt's less than Add From's date!");
return false;}
if(myForm.text_field2.value>=myForm.text_field3.value){
alert("Invalid Drop To date. \nIt's less than Add To's date!");
return false;}
else 
alert("Registration Period is specified");
return true;
}


        

function check_date(){
var d = new Date();
formatted_date = d.formatDate("Y-m-d");
//alert(formatted_date);
//alert("dddddsd");
if(myForm.text_field.value < formatted_date){
alert("Invalid Add From date. \nIt's less than today's date!");
return false;}
if(myForm.text_field.value>=myForm.text_field2.value){
alert("Invalid Add To date. \nIt's less than Add From's date!");
return false;}
if(myForm.text_field2.value>=myForm.text_field3.value){
alert("Invalid Drop To date. \nIt's less than Add To's date!");
return false;}
else 
alert("Registration Period is specified");
return true;
}



function check_date2(){
if(myForm.text_field.value>=myForm.text_field2.value){
alert("Invalid add/drop period 'To' date. \nIt's less than from's date!");
return false;}
if(myForm.text_field2.value>=myForm.text_field3.value){
alert("Invalid withdraw period 'To' date. \nIt's less than add/drop period 'To' date's date!");
return false;}
else 
alert("add/drop and withdraw dates are updated");
return true;
}



var cal_obj2 = null;

var format = '%Y-%m-%d';

// show calendar 1
function show_cal(el) {

	if (cal_obj2) return;

var text_field = document.getElementById("text_field");

	cal_obj2 = new RichCalendar();
	cal_obj2.start_week_day = 6;
	cal_obj2.show_time = false;
	cal_obj2.language = 'en';
	cal_obj2.user_onchange_handler = cal2_on_change;
	cal_obj2.user_onclose_handler = cal2_on_close;
	cal_obj2.user_onautoclose_handler = cal2_on_autoclose;

	cal_obj2.parse_date(text_field.value, format);

	cal_obj2.show_at_element(text_field, "adj_right-top");
	//cal_obj2.change_skin('alt');

}

// user defined onchange handler
function cal2_on_change(cal, object_code) {
	if (object_code == 'day') {
		document.getElementById("text_field").value = cal.get_formatted_date(format);
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onclose handler (used in pop-up mode - when auto_close is true)
function cal2_on_close(cal) {
	if (window.confirm('Are you sure to close the calendar?')) {
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onautoclose handler
function cal2_on_autoclose(cal) {
	cal_obj2 = null;
}


//show calender 2

function show_cal2(el) {

	if (cal_obj2) return;

var text_field2 = document.getElementById("text_field2");

	cal_obj2 = new RichCalendar();
	cal_obj2.start_week_day = 6;
	cal_obj2.show_time = false;
	cal_obj2.language = 'en';
	cal_obj2.user_onchange_handler = cal3_on_change;
	cal_obj2.user_onclose_handler = cal3_on_close;
	cal_obj2.user_onautoclose_handler = cal3_on_autoclose;

	cal_obj2.parse_date(text_field2.value, format);

	cal_obj2.show_at_element(text_field2, "adj_right-top");
	//cal_obj2.change_skin('alt');

}

// user defined onchange handler
function cal3_on_change(cal, object_code) {
	if (object_code == 'day') {
		document.getElementById("text_field2").value = cal.get_formatted_date(format);
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onclose handler (used in pop-up mode - when auto_close is true)
function cal3_on_close(cal) {
	if (window.confirm('Are you sure to close the calendar?')) {
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onautoclose handler
function cal3_on_autoclose(cal) {
	cal_obj2 = null;
}





//show calender 3

function show_cal3(el) {

	if (cal_obj2) return;

var text_field3 = document.getElementById("text_field3");

	cal_obj2 = new RichCalendar();
	cal_obj2.start_week_day = 6;
	cal_obj2.show_time = false;
	cal_obj2.language = 'en';
	cal_obj2.user_onchange_handler = cal4_on_change;
	cal_obj2.user_onclose_handler = cal4_on_close;
	cal_obj2.user_onautoclose_handler = cal4_on_autoclose;

	cal_obj2.parse_date(text_field3.value, format);

	cal_obj2.show_at_element(text_field3, "adj_right-top");
	//cal_obj2.change_skin('alt');

}

// user defined onchange handler
function cal4_on_change(cal, object_code) {
	if (object_code == 'day') {
		document.getElementById("text_field3").value = cal.get_formatted_date(format);
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onclose handler (used in pop-up mode - when auto_close is true)
function cal4_on_close(cal) {
	if (window.confirm('Are you sure to close the calendar?')) {
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onautoclose handler
function cal4_on_autoclose(cal) {
	cal_obj2 = null;
}





// user defined onautoclose handler
function cal5_on_autoclose(cal) {
	cal_obj2 = null;
}




//-->
</script>

</head>





 <body>

<div id="sidebar1">
    </div>
	<h1>Add/Drop and Withdraw Period </h1>     </br></br></br></br> 
<table width="551" height="289" border="0" align="center">
  <tr>
    <td width="205">&nbsp;</td>
    <td width="61">&nbsp;</td>
    <td width="62">&nbsp;</td>
    <td width="205">&nbsp;</td>
  </tr>
  <tr>
    <td height="116" colspan="4">
    


      <form action="Course registration period.php?fun=Submit"   method="post" id="myForm">
       
	  
	    <fieldset>
        <legend> <strong>Add/Drop period</strong></legend>
        <table width="486" height="38" border="0" align="center">
          <tr>
		
   <?php 
   
			$q="select * from period where `p_id` IN (SELECT MAX(p_id) FROM `period`)";
			$r = mysql_query($q);
			$num = mysql_num_rows($r);
					
						
				for($i =0; $i < $num; $i++)
					{	
						$p_id = mysql_result($r,$i,"p_id");
						$A_D_to = mysql_result($r,$i,"A_D_to");
						$A_D_from= mysql_result($r,$i,"A_D_from");
						$withdraw_to= mysql_result($r,$i,"withdraw_to");
						$Semester_type= mysql_result($r,$i,"Semester_type");
						$year= mysql_result($r,$i,"year");
						}
						
						
						?>


            <td height="34"><strong>From</strong>
              <input name="text_field" type="text"   id="text_field"  value="<?php  echo $A_D_from ?>"  readonly="readonly"  />
                <img  src="img/c_icon2.gif" align="absmiddle" onClick="show_cal(this);" border="0" style="cursor:pointer; ">            </td>
            <td width="34">&nbsp;</td>
       </tr>
       <tr>            <td><strong>To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><input name="text_field2" type="text"   id="text_field2" value="<?php echo $A_D_to ?>" readonly="readonly"  />
       
       <img src="img/c_icon2.gif"  align="absmiddle" onClick="show_cal2(this);" border="0" style="cursor:pointer; ">
       </td>
          </tr>
</table>
        <p>&nbsp;</p>
        </fieldset>
  
  <tr>
    <td colspan="4" class="style1">
        <fieldset>
        <legend><strong>Withdraw period</strong></legend>
 <table width="486" height="38" border="0" align="center">
          <tr>
            <td height="34"><strong>To</strong> <input name="text_field3" type="text"  id="text_field3" value="<?php echo $withdraw_to ?>" readonly="readonly" >
                   <img src="img/c_icon2.gif"   align="absmiddle" onClick="show_cal3(this);" border="0" style="cursor:pointer; ">                                        </td>

            <br />
			<br />
			</td>
            <td width="27"></td>
            <td>&nbsp;</td>
            </tr>
        </table>
        <fieldset>
        <legend> <strong>Intake Semester<br />
&nbsp;</strong></legend>
            
        <table width="555" border="0">
          <tr>
            <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<strong>Semester Type 
              <select name="sem_type2">
                <option  value="fall">fall</option>
                <option  value="spring">spring</option>
              </select>
              </strong>			</td>
            <td align="center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Semester Year </strong>
      <select name="sem_year2">
      <option value="2010">2010</option>	  
      <option value="2011">2011</option>	  
      <option value="2012">2012</option> 		  
      <option value="2013">2013</option>     
       <option value="2014">2014</option>   
      <option value="2015">2015</option>    
         <option value="2016">2016</option>
              </select></td>
          </tr>
        </table>
        </fieldset>
        
    </td>
  </tr>
  
    

          <tr>
           
            <td colspan="4" align="center"><input type="submit" name="Submit" value="Submit" onClick="return (check_date());"    />
                    </form>
        
        
        <form   action="Course registration period.php?funl=list" method="post" > <input type="submit" name="list" value="List"  /> 
        </form>
             <br/></td> 

          <?php   
			
			if (isset ($fun) && $fun="Submit")
			{	
			
	if( !empty($_POST["text_field"]) && !empty($_POST["text_field2"]) && !empty($_POST["text_field3"]) && !empty($_POST["sem_type2"]) && !empty($_POST["sem_year2"]))
		
		{
		
		
																		
						$A_D_from = $_POST["text_field"];
						$A_D_to= $_POST["text_field2"];
						$withdraw_to= $_POST["text_field3"];
						$Semester_type= $_POST["sem_type2"];
						$year= $_POST["sem_year2"];
						

echo $withdraw_to;

						$q = "INSERT INTO `crs`.`period` VALUES (NULL, '$A_D_from', '$A_D_to', '$withdraw_to' , '$Semester_type' , '$year' );";
															$r = mysql_query($q);
															
																				 if ($r)
																						  echo "Successful update new Add/Drop and Withdraw Period .";
																					  else
																						  echo "ERROR";
		
   
			$q="select * from period ORDER BY `period`.`p_id` ASC ";
			$r = mysql_query($q);
			$num = mysql_num_rows($r);
					
						
				for($i =0; $i < $num; $i++)
					{	
						$p_id = mysql_result($r,$i,"p_id");
						$A_D_to = mysql_result($r,$i,"A_D_to");
						$A_D_from= mysql_result($r,$i,"A_D_from");
						$withdraw_to= mysql_result($r,$i,"withdraw_to");
						$Semester_type= mysql_result($r,$i,"Semester_type");
						$year= mysql_result($r,$i,"year");
						}
						
						
				
		
		}
		else
		{
		
		 echo "ERROR";
		}
		
	}	
		
		
	///////////////////////////////////////////////////////////////	//////////////////////////////	//////////////////////////////	//////////////////////////////	
		
		
		
		
			if (isset ($funl) && $funl="list")
				{
				

		
  echo '<fieldset>  <legend> <strong>Course registration period Information </strong></legend> ';	
echo '<table  border="1" align="center"  bgcolor="#E15353 ">	<thead><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
			<th  align="center">
			p _ID&nbsp; </td>
			<th style="padding:.75pt .75pt .75pt .75pt">
		Add_Drop_From </td>
			<th style="padding:.75pt .75pt .75pt .75pt">
			Add_Drop_To</td>
			<th style="padding:.75pt .75pt .75pt .75pt">
			withdraw  To</td>
			<th style="padding:.75pt .75pt .75pt .75pt">
			Semester type  </td>
			<th style="padding:.75pt .75pt .75pt .75pt">
			Year  </td>
		</tr>
	</thead>
	';
	
	
			$q="select * from period ORDER BY `period`.`p_id` ASC ";
			$r = mysql_query($q);
			$num = mysql_num_rows($r);
					
						
				for($i =0; $i < $num; $i++)
					{	
						$p_id = mysql_result($r,$i,"p_id");
						$A_D_to = mysql_result($r,$i,"A_D_to");
						$A_D_from= mysql_result($r,$i,"A_D_from");
						$withdraw_to= mysql_result($r,$i,"withdraw_to");
						$Semester_type= mysql_result($r,$i,"Semester_type");
						$year= mysql_result($r,$i,"year");
						
						
						$t=$i+1;

	

						echo '<tr>
							<td style="padding:.75pt .75pt .75pt .75pt">
							'.$t.'</td>
							<td style="padding:.75pt .75pt .75pt .75pt">
							'.$A_D_from.'</td>
							<td style="padding:.75pt .75pt .75pt .75pt">
							'.$A_D_to.'</td>							
							<td style="padding:.75pt .75pt .75pt .75pt">
							'.$withdraw_to.'</td>
							<td  align="center" style="padding:.75pt .75pt .75pt .75pt">
							'.$Semester_type.'</td>
							<td style="padding:.75pt .75pt .75pt .75pt">
							'.$year.'</td>
						</tr>';

				
					}
			
echo '</table>';
			
		}	?>
          </tr>
        </table>
</body>

</html>
