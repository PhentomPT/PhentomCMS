<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$install = new Install();

if (isset($_POST['db_submit']) && !empty($_POST['db_submit'])){
	if (!empty($_POST['dbhost']) || !empty($_POST['dbuser']) || !empty($_POST['dbname'])){
		if(!$try_connection = @mysqli_connect($_POST['dbhost'],$_POST['dbuser'],$_POST['dbpass'])){
			$system->assign("error","db_error");
			$system->display(VIEW_PATH ."/db_info.html");
		}
		else{
			$install->dbhost = $_POST['dbhost'];
			$install->dbuser = $_POST['dbuser'];
			$install->dbpass = $_POST['dbpass'];
			$install->dbname = $_POST['dbname'];
			$install->addInfo();
			$system->display(VIEW_PATH ."/server_info.html");
		}
	}
	else{
		$system->assign("error","db_error");
		$system->display(VIEW_PATH ."/db_info.html");
	}
}
elseif (isset($_POST['server_submit']) && !empty($_POST['server_submit'])){
	if ($_POST['password'] !== $_POST['password_check']){
		if (isset($_POST['server_name'])){ $system->assign("server_name_value", $_POST['server_name']); }
		if (isset($_POST['slogan'])){ $system->assign("slogan", $_POST['slogan']); }
		if (isset($_POST['user'])){ $system->assign("user_value", $_POST['user']); }
		if (isset($_POST['core'])){ $system->assign("core", $_POST['core']); }
		if (isset($_POST['expansion'])){ $system->assign("expansion_value", $_POST['expansion']); }
		if (isset($_POST['players'])){ $system->assign("players", $_POST['players']); }
		if (isset($_POST['slider'])){ $system->assign("slider_value", $_POST['slider']); }
		$system->assign("error","pass_error");
		$system->display(VIEW_PATH ."/server_info.html");
	}
	else{
		$install->server_name = $_POST['server_name'];
		$install->server_slogan = $_POST['slogan'];
		$install->server_user = $_POST['user'];
		$install->server_password = $_POST['password'];
		$install->server_core = $_POST['core'];
		$install->server_expansion = $_POST['expansion'];
		$install->server_players = $_POST['players'];
		$install->server_slider = $_POST['slider'];
		$install->addDb();
		$system->assign("error", $install->error);
		$system->display(VIEW_PATH ."/web_info.html");
	}
}
elseif (isset($_POST['web_submit']) && !empty($_POST['web_submit'])){
	$install->finish();
	$common->redirect("../");
}
else{
	$system->assign("error","");
	$system->display(VIEW_PATH ."/db_info.html");
}
