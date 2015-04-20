<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$_SESSION['uadmin'] = "";
unset($_SESSION['uadmin']);
session_destroy();
$common->redirect();