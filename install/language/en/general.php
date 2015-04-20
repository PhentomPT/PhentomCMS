<?php
$lang['welcome'] = "Welcome";
$lang['welcome_txt'] = "Welcome to the installation process. You'll just need to fill in the information according to your server and you'll be on your way to use this awesome CMS!";
$lang['welcome_np'] = "Don't worry! You can change all the settings later.";
$lang['example'] = "Ex";
$lang['next'] = "Next";
$lang['finish'] = "Finish";
$lang['powered'] = "Powered by";

foreach ($lang as $key=>$value){
	$system->assign($key, $lang[$key]);
}