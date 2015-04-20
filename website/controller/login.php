<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $common->encryptSha1($username,$_POST['password']);
	
	$login = $objAccount->login($username, $password);
	
	if ($login == "logged"){
		$common->redirect();
	}
	else{
		$system->assign("error_login",$login);
	}
}

$system->display(VIEW_PATH ."/login.html");