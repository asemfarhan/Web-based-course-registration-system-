
<script src="selectcustomer.js"></script>

<script src="thickbox/jquery.js" type="text/javascript"></script>
<link href="css/main2.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="jquery.input-hint.js"></script>
<script type="text/javascript">

 $(function() {
 $("*[@hint]").inputHint();
 });

</script>

<?php

$pro=$_GET['project_n'];
/***************************************************************************
 *                   ------- ezSL.cls.php --------
 *--------------------------------------------------------------------------
 *
 *		Author				: S. M. ARIFUL ISLAM
 
 *		Email				: arif_look@yahoo.com
 
 *		Contact				: +88-0152344105
 
 *		Country				: Bangladesh
 
 *		Begin				: Thursday, Apr 05, 2007
 
 *		Website				: www.bsourcing.com
 *
 ***************************************************************************/


error_reporting(0);//Skips all error messages.
class ezSL
{
	var $counter=0;//Counts, how many components created
	var $txtSize=40;//Textfield size
	
	function ezSL()//Constructor
	{
		$this->ScriptCollection();
	}
	
	function ScriptCollection()//Collection of JS and CSS
	{
		$InitJsCSS ='<script language="JavaScript">
				
				function Init()
				{
					this.group = new Array();
					this.currentid="";
					this.dcounter=0;
					this.tdiv=0;
					this.div_visible=false;
					this.divleft=0;
					this.keyCode=0;
			
					this.key = "";
					this.myDiv = "";
					this.mainDiv = "";
				}
				var obj = new Init();
				
				function InitComponent(txtId, index)
				{
					obj.key = document.getElementById(txtId);
					obj.mainDiv = document.getElementById(obj.group[index]);
					var xid = obj.mainDiv.id;
					obj.myDiv = document.getElementById(xid + xid);

					var xPos = obj.key;
					obj.divleft = obj.key.offsetLeft;
					do {
						xPos = xPos.offsetParent;
						obj.divleft	+= xPos.offsetLeft;
					} while(xPos.tagName!="BODY");

				}
				
				function UpDown(e)
				{
					if(navigator.appName.indexOf("Microsoft") != -1)
						var keyValue = e.keyCode;
					else
					if(navigator.appName.indexOf("Netscape") != -1)
						var keyValue = e.which;
					if(keyValue==38 || keyValue==40)
						KeyEvents(keyValue);
					else
						return false;
				}
				
				function KeyEvents(keyValue)
				{	
					switch(keyValue)
					{
						case 38 :	if( (obj.dcounter>=0) && (obj.tdiv>0) )
									{
										if(obj.keyCode==40 && obj.dcounter==0)
										{	obj.dcounter=obj.tdiv;	}

										obj.dcounter = (obj.dcounter>=1) ? obj.dcounter-1 : obj.dcounter;
										
										if(obj.dcounter==0) obj.dcounter=obj.tdiv;
										if(obj.dcounter==obj.tdiv)document.getElementById("key_div_1").className="keyDivOut";
										
										document.getElementById("key_div_"+obj.dcounter).className="keyDivOver";
										obj.currentid = "key_div_"+obj.dcounter;
										if(obj.dcounter < obj.tdiv)
										{
											document.getElementById("key_div_"+(obj.dcounter+1)).className="keyDivOut";
										}

										obj.keyCode=38;
									}
									break;
			
						case 40	:	if( (obj.dcounter<=obj.tdiv) && (obj.tdiv>0) )
									{
										if(obj.keyCode==38 && obj.dcounter==10)
										{	obj.dcounter=0;	}
										
										obj.dcounter = (obj.dcounter < obj.tdiv) ? obj.dcounter+1 : obj.dcounter;
										obj.currentid = "key_div_"+obj.dcounter;
										document.getElementById("key_div_"+obj.dcounter).className="keyDivOver";
										if(obj.dcounter>1)
										{
											document.getElementById("key_div_"+(obj.dcounter-1)).className="keyDivOut";
										}
										if(obj.dcounter==1)document.getElementById("key_div_"+obj.tdiv).className="keyDivOut";
										if(obj.dcounter==obj.tdiv) obj.dcounter=0;

										obj.keyCode=40;
									}
									break;
									
						case 13	:	if(obj.currentid!="")
									{
										obj.key.value = document.getElementById(obj.currentid).innerHTML;
									}
									HideElements(true);
									break;
					}
				}

				function HideElements(Focus, divText)
				{
					obj.myDiv.innerHTML="";
					obj.mainDiv.style.visibility="hidden";
					VariableReset();
					if(Focus)
					{
						obj.key.focus();
						if(divText)
							obj.key.value = divText;
					}
					obj.div_visible = false;
					obj.tdiv=0;
				}

				function SetStyle(divid, GetLost)
				{
					if(obj.currentid!="")
						document.getElementById(obj.currentid).className = "keyDivOut";
					document.getElementById(divid).className = GetLost ? "keyDivOver" : "keyDivOut";
				}

				function VariableReset()
				{
					obj.currentid="";
					obj.dcounter=0;
				}
				//---------------------------------------------
					document.onmousedown = HideElements;
				//---------------------------------------------
				</script>

				<style type="text/css">
				.box { 
					border: 1px solid #7F9DB9; 
					font-size:13px; 
					font-family:Arial; 
					text-align:left; 
					padding:6px; 
					width:100%; 
					background-color:#ffffff; 
					z-index: 10000;
				}
				.keyDivOver{
					background-color:#0066CC;
					color:#FFFFFF;
				}
				.keyDivOut{
					background-color:#FFFFFF;
					color:#000000;
				}
				</style>';

		$httpObj ='<script language="JavaScript">
				var HttpReq = false;
				if (window.XMLHttpRequest) 
				{
					HttpReq = new XMLHttpRequest(); // 1st try to create object.
					//Mozila Firefox or Opera 8.0 or Safari
				}
				else
				{
					if (window.ActiveXObject)
					{
						HttpReq = new ActiveXObject("Microsoft.XMLHTTP"); // 2nd try to create object.
						//Internet Explorer(IE)
						if(!HttpReq)
						{
							HttpReq = new ActiveXObject("Msxml2.XMLHTTP"); // 3rd try to create object.
							//Internet Explorer(IE)
						}
					}
				}	

				function getLoad(e, qtable, qfield)
				{	
					if(navigator.appName.indexOf("Microsoft") != -1)
						var keyValue = e.keyCode;
					else
					if(navigator.appName.indexOf("Netscape") != -1)
						var keyValue = e.which;
			
					if(obj.key.value=="" || keyValue==27)
					{
						HideElements(true);
					}else
					if(keyValue!=9 && keyValue!=13 && keyValue!=20 && keyValue!=37 && keyValue!=38 && keyValue!=39 && keyValue!=40)
					{
						if(HttpReq)
						{
							HttpReq.open("GET", "ezSL/get_list.php?key="+obj.key.value+"&table="+qtable+"&field="+qfield, true);
							HttpReq.onreadystatechange = getList;
							HttpReq.send(null);
						}
						VariableReset();
					}else
						if(keyValue==13)
						{
							KeyEvents(keyValue);
						}
				}

				function getList()
				{
					if(HttpReq.readyState == 4)
					{
						var response = HttpReq.responseText;
						obj.mainDiv.style.visibility = "visible";
						
						obj.mainDiv.style.left = obj.divleft;
						obj.mainDiv.style.width = obj.key.offsetWidth;
						
						obj.div_visible = true;
						obj.myDiv.innerHTML = response;
						obj.tdiv = document.getElementById("NumRec").value;
					}
				}
				</script>';
		echo $httpObj.$InitJsCSS;
	}//End method
	
	/** Create Textbox Component with suggestion list div elements **************
		Here(surely you have to give values with (*) marked arguments):-
		-----------------------------------------------------------------
		$txtName(*) = Textbox Name
		$QueryTable(*) = From which table of a database you want to search keyword
		$QueryField(*) = From which field of a database table you want to search keyword
		$txtSize = Textbox Size
		$txtClass = You can pass a CSS class name through this argument
		$BottomMsg = Your given message will be shown at the bottom of suggestion list
	********************************************************************************/
	function CreateComponent($txtName, $QueryTable, $QueryField, $txtSize="", $txtClass="", $BottomMsg="")
	{
		$str="";
		if($txtSize=="" || $txtSize==0) $txtSize=$this->txtSize;
		$arr_length = $this->counter;
		$mainDiv = $txtName.'_'.$this->counter;
		echo '<script> obj.group['.$arr_length.'] = "'.$mainDiv.'"; </script>';
		
		$divCompBody='<div>'
						.'<div id="page"><div class="post">
<div style="float:right;"><div id="searchForm"><input type="text" id="'.$txtName.$arr_length.'" name="'.$txtName.'" class="searchtxt" hint="Search for a project" style="color: #808080;" onfocus="InitComponent(this.id,'.$arr_length.')" onkeyup="getLoad(event,\''.$QueryTable.'\',\''.$QueryField.'\');" onkeydown="UpDown(event);" onmouseup="getLoad(event,\''.$QueryTable.'\',\''.$QueryField.'\');" size="'.$txtSize.'" onkeypress="showCustomer(this.value)" class="searchtxt"  autocomplete="off" /></div></div>
</div>'
						
						."<br>"
						.'<div class="searchBox" id="'.$mainDiv.'" style="float:left;position:absolute;visibility:hidden; display:inline">'
							.'<div id="'.$mainDiv.$mainDiv.'" style="width:95%; background-color:#FFFFFF;"></div>'
							;
		if($BottomMsg!="")
			$divCompBody	.='<div style="border: 1px solid red; text-align:center; padding:0px;">'.$BottomMsg.'</div>';
		   
		   $divCompBody .='</div>'
					.'</div>';
		$this->counter++;
		echo $divCompBody;
	}//End method
	
}//End Class
?>

<html>
<head>
	<link href="css/main2.css" rel="stylesheet" type="text/css" />

</head>

</html>