<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if(!isset($_POST['register'])){}
else{
	if(!isset($_POST['email']) || !isset($_POST['password'])){
		$system->assign("error", "fields_missing");
	}
	elseif($_POST['password'] != $_POST['password_verify']){
		$system->assign("error", "pass_mismatch");
	}
	else{
		$email = htmlspecialchars($_POST['email']);
		$user = htmlspecialchars($_POST['username']);
		$pass = htmlspecialchars($_POST['password']);
		$result = $db->SimpleQuery("SELECT * FROM accounts WHERE username='$user' OR email='$email'");
		if(count($result) > 0){
			$system->assign("error", "already_used");
		}
		else{
			$db->SimpleInsert("INSERT INTO accounts (username,password,email) VALUES ('$user','$pass','$email')");
			$common->redirect();
		}
	}
}

$system->display(VIEW_PATH ."/register.html");