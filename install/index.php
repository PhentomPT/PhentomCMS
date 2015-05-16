<?php
//Defines system constant
define("SSC", "Secure System Constant");

//Loads requirement files
require ("core/config.php");
require ("../core/libs/smarty/Smarty.class.php");
require ("../core/model/class.database.php");
require ("../core/model/class.common.php");

$system = new Smarty();
$db = new Database();
$common = new Common();

//Redirects if CMS was already installed
if (DIR == dirname(DIR) ."/trash"){
	$common->redirect("../");
}

//$smarty->force_compile = true;
$system->debugging = false;
$system->caching = false;
$system->cache_lifetime = 120;

//Checks for language change
if (isset($_GET['lang']) && !empty($_GET['lang'])){
	$_SESSION['lang'] = $_GET['lang'];
	$common->redirect();
}

//Checks for language
if (!isset($_SESSION['lang']) || empty($_SESSION['lang'])){
	$_SESSION['lang'] = "en";
	include (LANGUAGE_PATH ."/". $_SESSION['lang'] ."/general.php");
}
else{
	include (LANGUAGE_PATH . "/" . $_SESSION['lang'] . "/general.php");
}

//Checks for preload file
if (file_exists(INCLUDE_PATH ."/preload.php")){
	include (INCLUDE_PATH ."/preload.php");
}

//Displays the header
$system->display(VIEW_PATH ."/header.html");

//Includes the content page
include (CONTROLLER_PATH ."/home.php");

//Displays the footer
$system->display(VIEW_PATH ."/footer.html");