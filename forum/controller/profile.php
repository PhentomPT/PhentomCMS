<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$userinfo = $objAccount->userInfo($_GET['user']);

if(count($userinfo) < 1){
	$system->display(VIEW_PATH ."/fail_request.html");
}
else{
	foreach ($userinfo as $key => $value){
		$userinfo[$key]['join_date'] = $common->humanTiming($userinfo[$key]['join_date']);
	}
	
	$system->assign("user_info", $userinfo);
	
	$system->display(VIEW_PATH ."/profile.html");
}