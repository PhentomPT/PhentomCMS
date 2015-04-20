<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Selects the forum DB
$db->SelectDb(DBFORUM);

//Checks if Forum exists
$check_forum = $db->SimpleQuery("SELECT * FROM forums WHERE id='".$_GET['id']."'");
if(count($check_forum) < 1){
	echo "Request not found.";
}
else{
	$locked_forum = $db->SimpleQuery("SELECT * FROM forums WHERE id='".$_GET['id']."' AND type='locked'");
	
	$system->assign("locked_forum",count($locked_forum));
	
	$num_topics = $db->SimpleQuery("SELECT * FROM topics WHERE id_forum='".$_GET['id']."'");
	
	$system->assign("num_topics",count($num_topics));
	$system->assign("topics",count($num_topics));
	
	//Gets the Announcements
	$announce = $db->SimpleQuery("SELECT * FROM topics WHERE id_forum='".$_GET['id']."' AND type='announce'");
	
	$system->assign("announce", count($announce));
	
	$topics = $db->SimpleQuery("SELECT * FROM topics WHERE id_forum='".$_GET['id']."' AND type='announce' ORDER BY posted_time DESC");
	
	foreach ($topics as $key => $value){
		$topics[$key]['posted_time'] = $common->humanTiming($topics[$key]['posted_time']);
	}
	
	$system->assign("topics_count", count($topics));
	$system->assign("topics", $topics);
	  
	//Get the Replies and Views according to the Topic
	$replys = $db->SimpleQuery("SELECT * FROM replys WHERE id_forum='".$_GET['id']."'");
	
	$system->assign("replys_count", count($replys));
	$system->assign("replys", $replys);
	
	$views = $db->SimpleQuery("SELECT * FROM topics");
	
	$system->assign("views_count", count($views));
	$system->assign("views", $views);
	
	//Gets Last Reply according to the Post  
	$last_topic = $db->SimpleQuery("SELECT * FROM replys WHERE id_forum='".$_GET['id']."' ORDER BY posted_time DESC LIMIT 1");
	
	foreach ($last_topic as $key => $value){
		$last_topic[$key]['posted_time'] = $common->humanTiming($last_topic[$key]['posted_time']);
	}
	
	$system->assign("last_topic_count", count($last_topic));
	$system->assign("last_topic", $last_topic);
	
	$topics2 = $db->SimpleQuery("SELECT * FROM topics WHERE id_forum='".$_GET['id']."' AND (type='normal' OR type='locked' OR type='stick') ORDER BY type='stick' DESC, posted_time DESC");
	
	$system->assign("topics2_count", count($topics2));
	$system->assign("topics2", $topics2);
	
	//Get the Replies and Views according to the Topic
	$replys2 = $db->SimpleQuery("SELECT * FROM replys WHERE id_forum='".$_GET['id']."'");
	
	$system->assign("replys2_count", count($replys2));
	$system->assign("replys2", $replys2);
	
	$views2 = $db->SimpleQuery("SELECT * FROM topics");
	
	$system->assign("views2_count", count($views2));
	$system->assign("views2", $views2);
	
	//Gets Last Reply according to the Post  
	$last_topic2 = $db->SimpleQuery("SELECT * FROM replys WHERE id_forum='".$_GET['id']."' ORDER BY posted_time DESC LIMIT 1");
	
	$system->assign("last_topic2_count", count($last_topic2));
	$system->assign("last_topic2", $last_topic2);
}
$system->display(VIEW_PATH ."/forum.html");