<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

include (LANGUAGE_PATH ."/". $_SESSION['lang'] ."/account_panel.php");

$user_info = $objAccount->userInfo();

$system->assign("user_info", $user_info);

$system->display(VIEW_PATH ."/account_panel.html");