<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if(!isset($_POST['login'])){}
else{
	if(!isset($_POST['email']) || !isset($_POST['password'])){
		$system->assign("error", "fields_missing");
	}
	else{
		$email = htmlspecialchars($_POST['email']);
		$pass = htmlspecialchars($_POST['password']);
		$result = $db->SimpleQuery("SELECT * FROM accounts WHERE email='$email' AND password='$pass'");
		if(count($result) > 0){
			$_SESSION['username'] = $result[0]['username'];
			$common->redirect();
		}
		else{
			$system->assign("error", "fail_login");
		}
	}
}
$system->display(VIEW_PATH ."/login.html");