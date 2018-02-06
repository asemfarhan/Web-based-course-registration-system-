<?php
	require_once("dbConf.inc");
	
	$str="";
	$sql="SELECT DISTINCT ".$_GET['field']." FROM ".$_GET['table']." WHERE ".$_GET['field']." Like '".$_GET['key']."%' ORDER BY ".$_GET['field']." ASC LIMIT 0, 10";
	$result = mysql_query($sql) or die(mysql_error());
	
	$id=0;
	while($row=mysql_fetch_row($result))
	{	$id++;
		$str .= nl2br('<div style="color:#3D3D3D; padding:2px; float:left; border-color: #000000;"></div><div id="key_div_'.$id.'" onmousedown="HideElements(true, this.innerHTML)" onmousemove="SetStyle(this.id, true)" onmouseout="SetStyle(this.id, false)" style=" padding:2px; width:100%; cursor:pointer;">'.$row[0].'</div>');
	}
	
	echo $str.'<input type="hidden" name="textfield" id="NumRec" value="'.mysql_num_rows($result).'" />';

	
	exit();
?>