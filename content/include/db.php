<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

session_start();
ob_start();

$host='127.0.0.1';
$user='root';
$password='';
$database='wowcms';

$mysqli = new mysqli($host, $user, $password, $database);

if (!$mysqli){
	echo "Error in DB Connection";
}
$infoquery = $mysqli -> query("SELECT * FROM info LIMIT 1");
	
while($row = $infoquery -> fetch_array(MYSQLI_ASSOC)){
	$title = $row['title'];
	$slogan = $row['slogan'];
	$core = $row['core'];
	$expansion = $row['expansion'];
	$acc_db = $row['acc_db'];
	$char_db = $row['char_db'];
	$world_db = $row['world_db'];
	$style = $row['style'];
	$on_players = $row['onplayers'];
	$slider = $row['slider'];
}

$cms_version = "1.0 Beta";

switch ($expansion) {
	case '0':
		$trinity_expansion = 0;
		$arcemu_expansion = 0;
		break;
	case '1':
		$trinity_expansion = 1;
		$arcemu_expansion = 8;
		break;
	case '2':
		$trinity_expansion = 2;
		$arcemu_expansion = 24;
		break;
	case '3':
		$trinity_expansion = 3;
		$arcemu_expansion = 32;
		break;
	case '4':
		$trinity_expansion = 4;
		break;
	default:
		$trinity_expansion = 1;
		$arcemu_expansion = 8;
		break;
}
?>