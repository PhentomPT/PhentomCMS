<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * Checks the credentials given
 * and logs in or gives an error
 */
$username = $_POST['username'];

if ($server_info[0]['core'] == "trinity_v6"){
	$password = $_POST['password'];
	
	$check_email = $db->SimpleQuery("SELECT a.email as email
	FROM ". $server_info[0]['accounts'].".account a 
		LEFT JOIN ". $server_info[0]['accounts'].".account_access ac ON ac.id = a.id
	WHERE a.username='$username'");
	
	$password = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($check_email[0]['email'])).":".strtoupper($password))))))));
}
else{
	$password = $common->encryptSha1($username,$password);
}

$check_account = $db->SimpleQuery("SELECT * 
FROM ". $server_info[0]['accounts'].".account a 
	LEFT JOIN ". $server_info[0]['accounts'].".account_access ac ON ac.id = a.id
WHERE a.username='$username' AND a.sha_pass_hash='$password' AND ac.gmlevel=3");

if (count($check_account) > 0){
	$_SESSION['uadmin'] = $check_account[0]['username'];
	$common->redirect();
}
else{
	$system->assign("error", "wrong_user_pass");
}
