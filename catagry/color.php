
<?php 

if(isset ($_SESSION['w_color']) && $_SESSION['w_color']=="Red")
{
 echo '<link   href="sit_color/Red.css" rel="stylesheet" type="text/css" />';
}

 else if(isset ($_SESSION['w_color']) && $_SESSION['w_color']=="Gary")
{
 echo '<link   href="sit_color/Gary.css" rel="stylesheet" type="text/css" />';

}
 else if(isset ($_SESSION['w_color']) && $_SESSION['w_color']=="Brown")
{
 echo '<link   href="sit_color/brown.css" rel="stylesheet" type="text/css" />';
 }
 else if(isset ($_SESSION['w_color']) && $_SESSION['w_color']=="White")
{ echo '<link   href="sit_color/White.css" rel="stylesheet" type="text/css" />';
}

?>