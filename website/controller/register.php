<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if (isset($_POST['register'])){
	if ($_POST['rpassword'] == $_POST['vpassword']){
		$username = $_POST['rusername'];
		$email = $_POST['remail'];
		if ($server_info[0]['core'] == "trinity_v6"){
			$password = $common->encryptSha1($email,$_POST['rpassword']);
		}
		else{
			$password = $common->encryptSha1($username,$_POST['rpassword']);
		}
		$register = $objAccount->register($username, $password, $email);
		
		if ($register == "registered"){
			$common->redirect("?page=register_success");
		}
		else{
			$system->assign("error_registered", $register);
		}
	}
	else{
		$system->assign("error_registered", "pass_missmatch");
	}
}

$system->display(VIEW_PATH ."/register.html");
