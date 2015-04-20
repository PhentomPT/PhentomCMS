<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

if ($_GET['page'] == "armory"){
	include ("controller/armory.php");
}