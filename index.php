<?php
session_start();

//CMS Constant
define("PhentomCMS", "WoW Free CMS");

//Installation Folder
define("install", "install/");

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
?>