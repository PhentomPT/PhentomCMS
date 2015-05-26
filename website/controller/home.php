<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$news = $db->SimpleQuery("SELECT * FROM ". DBNAME .".". WEB_TBL_NEWS ." ORDER BY posttime DESC");

foreach ($news as $key => $value){
	$time = $common->humanTiming($news[$key]['posttime']);
	
	$news[$key]['posttime'] = $time;
}

$system->assign("news", $news);

$system->display(VIEW_PATH . "/home.html");
