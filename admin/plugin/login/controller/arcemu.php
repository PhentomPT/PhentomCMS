<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * Checks the credentials given
 * and logs in or gives an error
 */
$username = $_POST['username'];
$password = $common->encryptSha1($username,$_POST['password']);

$check_account = $db->SimpleQuery("SELECT * 
FROM ". $server_info[0]['accounts'].".accounts 
WHERE login='$username' AND encrypted_password='$password' AND gm='az'");

if (count($check_account) > 0){
	$_SESSION['uadmin'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}
