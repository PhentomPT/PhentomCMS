<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$username = $_POST['username'];
$password = $common->encryptSha1($username,$_POST['password']);

$db->SelectDb("auth");
$check_account = $db->SimpleQuery("SELECT * FROM account WHERE username='$username' AND sha_pass_hash='$password'");

if (count($check_account) > 0){
	$_SESSION['username'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}