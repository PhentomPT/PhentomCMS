<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$_SESSION['username'] = "";
unset($_SESSION['username']);
session_destroy();
$common->redirect();