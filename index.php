<?php

session_start();
ob_start();

define('ROOT', getcwd());

include_once(ROOT.'/core/lib/AltoRouter.php');
include_once(ROOT.'/core/lib/layout.php');
include_once(ROOT.'/core/lib/medoo.php');
include_once(ROOT.'/core/lib/page.php');

$globalSettings['projectRoot'] = str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',__DIR__));
$globalSettings['themeAssets'] = $globalSettings['projectRoot'].'/content/styles/';




function __autoload($className)
{ 
	if (file_exists(ROOT.'/pages/'.$className . '.php')) { 
		include_once( ROOT.'/pages/'.$className . '.php'); 
	} 
	// Do error handling sometime in the future?
	// $error->Add('Could not load page '.$className);
	// $error->abort();
} 


//Create the layout
$layout = new layout('default',$globalSettings);

//Create Router
$router = new AltoRouter();

//set basepath to current directory
$router->setBasePath('/git/PhentomCMS');

//static routes



$router->map( 'GET', '/', function(){
	$home = new home($GLOBALS['layout'], 0,null,0);
	$home->active();
}, 'home' );
$router->map( 'GET', '/404/', function(){
	$notfound = new page($GLOBALS['layout'], 0, '404',0);
	$notfound->active();
},'404' );

//CMS Constant
define("PhentomCMS", "WoW Free CMS");

//Installation Folder
define("install", "install/");

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header('Location: ./404/');
}

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