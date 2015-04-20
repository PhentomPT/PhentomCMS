<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Selects the forum DB
$db->SelectDb(DBFORUM);

//Gets the Categorys
$categorys = $db->SimpleQuery("SELECT * FROM categorys");

$system->assign("categorys", $categorys);

//Gets Forums
$forums = $db->SimpleQuery("SELECT * FROM forums");

$system->assign("forums", $forums);

//Gets the Topics
$topics = $db->SimpleQuery("SELECT * FROM topics");

foreach ($topics as $key => $value){
	$topics[$key]['posted_time'] = $common->humanTiming($topics[$key]['posted_time']);
}

$system->assign("topics", $topics);

//Gets the Replys
$replys = $db->SimpleQuery("SELECT * FROM replys");

$system->assign("replys", $replys);

$system->display(VIEW_PATH . "/home.html");