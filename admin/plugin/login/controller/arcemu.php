<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$username = $_POST['username'];
$password = $common->encryptSha1($username,$_POST['password']);

$db->SelectDb("logon");
$check_account = $db->SimpleQuery("SELECT * FROM accounts WHERE login='$username' AND encrypted_password='$password' AND gm='az'");

if (count($check_account) > 0){
	$_SESSION['uadmin'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}
