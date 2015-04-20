<?php
//Defines system constant
define("SSC", "Secure System Constant");

//Checks for Installation
$install_folder = "install";

if (is_dir($install_folder)){
	header("Location: $install_folder/");
}
else{
	//Checks for Main Application
	$main_app = "website";
	
	if (is_dir($main_app)){
		header("Location: $main_app/");
	}
	else{
		echo "The main Application folder is not properly set. Please edit the index.php.";
	}
}