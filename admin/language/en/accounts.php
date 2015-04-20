<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['accounts_title'] = "Accounts";
$lang['account_title'] = "Account";
$lang['find'] = "Find";
$lang['add'] = "Add";
$lang['edit'] = "Edit";
$lang['username'] = "Username";
$lang['email'] = "Email";
$lang['vote_points'] = "Vote Points";
$lang['donation_points'] = "Donation Points";
$lang['avatar'] = "Avatar";
$lang['rank'] = "Rank";
$lang['special_rank'] = "Special Rank";
$lang['joindate'] = "Join Date";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}