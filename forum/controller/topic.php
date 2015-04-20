<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$db->SelectDb(DBFORUM);

//Checks if Topic exists
$check_topic = $db->SimpleQuery("SELECT * FROM topics WHERE id='".$_GET['id']."'");

if(count($check_topic) < 1){
	$system->display(VIEW_PATH ."/fail_request.html");
}
else{
	//Checks if Topic is Locked
	$locked_topic = $db->SimpleQuery("SELECT * FROM topics WHERE id='".$_GET['id']."' AND type='locked'");
	
	if (count($locked_topic) > 0) {
		$system->assign("locked", "locked");
	}
	else{
		$system->assign("locked", "");
	}
		
	//Gets Topic info
	$get_topic = $db->SimpleQuery("SELECT *, a.rank as rank, a.special as special_rank, a.join_date as join_date, a.avatar as avatar 
	FROM topics t 
		LEFT JOIN ". DBNAME .".account_info a ON t.posted_by = a.username
	WHERE t.id='".$_GET['id']."'");
	
	foreach ($get_topic as $key => $value){
		$get_topic[$key]['join_date'] = $common->humantiming($get_topic[$key]['join_date']);
		$get_topic[$key]['posted_time'] = $common->humantiming($get_topic[$key]['posted_time']);
		$get_topic[$key]['content'] = $common->bbcodeHtml($get_topic[$key]['content']);
	}
	
	$system->assign("get_topic", $get_topic);
	
	//Gets Replys and how many
	$replys = $db->SimpleQuery("SELECT *, a.rank as rank, a.special as special_rank, a.join_date as join_date, a.avatar as avatar
	FROM replys r 
		LEFT JOIN ". DBNAME .".account_info a ON r.posted_by = a.username
	WHERE r.id='".$_GET['id']."'");
	
	$replys_num = count($replys);
	
	$system->assign("replys_num", $replys_num);
	
	foreach ($replys as $key => $value){
		$replys[$key]['join_date'] = $common->humantiming($replys[$key]['join_date']);
		$replys[$key]['posted_time'] = $common->humantiming($replys[$key]['posted_time']);
		$replys[$key]['content'] = $common->bbcodeHtml($replys[$key]['content']);
	}
	
	$system->assign("replys", $replys);
	
	$system->display(VIEW_PATH ."/topic.html");
}