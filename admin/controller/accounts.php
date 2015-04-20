<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if(isset($_POST['save_edit']) && isset($_POST['fields'])){
	$admin->editAccount($_POST['fields'], $_POST['fields']['id']);
	die;
}

include (LANGUAGE_PATH ."/". $_SESSION['lang'] . "/accounts.php");

if(isset($_GET['edit'])){
	$where = "a.id = '". $_GET['edit'] ."'";

	$edit_account = $admin->getAccounts($where);

	$system->assign("edit_account", $edit_account);
}

if(isset($_POST['find'])){
	$where = " a.username LIKE '%". $_POST['find'] ."%' OR a.email LIKE '%". $_POST['find'] ."%' ";
	$_SESSION['find'] = $where;
}
elseif (!empty($_SESSION['find'])){
	$where = $_SESSION['find'];
}
else{
	$where = "";
	$_SESSION['find'] = "";
}

if (isset($_GET['pagination']) && !empty($_GET['pagination'])){
	$pagination = $_GET['pagination'];
}
else{
	$pagination = 1;
}

$accounts = $admin->getAccounts($where,$pagination);

if ($_SESSION['total'] > 30){
	$total_paginas = $_SESSION['total'] / 30;
}
else{
	$total_paginas = 1;
}

$system->assign("total_paginas", round($total_paginas, 0, PHP_ROUND_HALF_UP));

$system->assign("accounts", $accounts);

$system->display(VIEW_PATH ."/accounts.html");