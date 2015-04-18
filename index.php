<?php
session_start();
ob_start();

define('ROOT', getcwd());

include_once(ROOT.'/core/lib/AltoRouter.php');
include_once(ROOT.'/core/lib/layout.php');
include_once(ROOT.'/core/lib/medoo.php');
include_once(ROOT.'/core/lib/page.php');


function __autoload($className)
{ 
	if (file_exists(ROOT.'/pages/'.$className . '.php')) { 
		include_once( ROOT.'/pages/'.$className . '.php'); 
	} 
	// Do error handling sometime in the future?
	// $error->Add('Could not load page '.$className);
	// $error->abort();
} 
//temp global settings
$globalSettings = array();

//Create the layout
$layout = new layout('default',$globalSettings);

//Create Router
$router = new AltoRouter();

//set basepath to current directory
$router->setBasePath(ROOT);

//static routes
$router->map( 'GET', '/', $home = new home($layout, 0,null,1), 'home' );
$router->map( 'GET', '/', $notfound = new page($layout, 0, '404',0) );

//CMS Constant
define("PhentomCMS", "WoW Free CMS");

//Installation Folder
define("install", "install/");

// print page when complete
echo $layout->printBlock();

/*

//Checks If language Exists
if(!isset($_SESSION['lang']) OR empty($_SESSION['lang'])){
	$_SESSION['lang'] = "english";
}

//Checks Where To Go
if(file_exists(install)){
	include_once "install/index.php";
}
else{
	include_once "content/include/home.php";	
}
*/
?>