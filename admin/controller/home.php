<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if (isset($_POST['submit_news'])){
	$image = $common->getLink($_POST['newsimg']);

	if (empty($image)){
		$image = $_POST['newsimage'];
	}
	
	$admin->SelectDb(DBNAME);
	$admin->postNews($_POST['newstitle'], $_SESSION['uadmin'], $_POST['newscontent'], $image);
	$common->redirect();
}

$cms_version = $admin->cms_version;
$update_version = $admin->getCmsUpdate();
$true_total_views = $statistics->getTrueViews();

$system->assign("cms_current_version", $cms_version);
$system->assign("update_version", $update_version);
$system->assign("true_total_views", $true_total_views);
$system->assign("memory_used", $common->convertSize(memory_get_peak_usage(true)));
$system->assign("php", PHP_VERSION);
$system->assign("mysql", $db->getDbVersion());

//Stops counting...
$time_spent = $common->microTimeStop();
$system->assign("time_spent",$time_spent);

$system->display(VIEW_PATH . "/home.html");