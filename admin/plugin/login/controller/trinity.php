<?php
$username = $_POST['username'];
$password = $common->encryptSha1($username,$_POST['password']);

$db->SelectDb("auth");
$check_account = $db->SimpleQuery("SELECT * 
		FROM account a 
		INNER JOIN account_access ac ON ac.id = a.id
		WHERE a.username='$username' and a.sha_pass_hash='$password' and ac.gmlevel=3");

if (count($check_account) > 0){
	$_SESSION['uadmin'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}