<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

switch ($core){
case "arcemu":
	include ("controller/arcemu.php");
	break;
case "trinity":
case "trinity_v6":
	include ("controller/trinity.php");
	break;
case "mangos":
	include ("controller/mangos.php");
	break;
}
