<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

unset($_SESSION['username']);
unset($_SESSION['account_id']);
unset($_SESSION['account_email']);
session_destroy();
$common->redirect();