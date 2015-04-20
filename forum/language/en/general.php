<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/*$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";*/
$lang['home'] = "Home";
$lang['rules'] = "Rules";
$lang['members'] = "Members";
$lang['faq'] = "FAQ";
$lang['email'] = "Email";
$lang['username'] = "Username";
$lang['password'] = "Password";
$lang['verify_password'] = "Verify Password";
$lang['powered_by'] = "Powered by";
$lang['login'] = "Login";
$lang['logout'] = "Logout";
$lang['register'] = "Register";
$lang['search'] = "Search";
$lang['account'] = "Account";
$lang['notifications'] = "Notifications";
$lang['v_unanswered_posts'] = "View unanswered posts";
$lang['v_active_topics'] = "View active topics";
$lang['fields_missing'] = "Please complete every field.";
$lang['pass_mismatch'] = "Password Mismatch.";
$lang['already_used'] = "Username/Email Already In Use.";
$lang['fail_login'] = "Incorrect email/password";
$lang['topics_title'] = "Topics";
$lang['posts_title'] = "Posts";
$lang['last_post'] = "Last post";
$lang['has_no_posts'] = "Has no posts";
$lang['no_forum_in_category'] = "There are no Forums in this Category.";
$lang['page'] = "Page";
$lang['of'] = "of";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}