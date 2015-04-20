<?php

$username = $_POST['username'];
$password = $common->encryptSha1($username,$_POST['password']);

$db->SelectDb("auth");
$check_account = $db->SimpleQuery("SELECT * FROM `accounts` WHERE login='$username' and encrypted_password='$password'");

if (count($check_account) > 0){
	$_SESSION['uadmin'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}