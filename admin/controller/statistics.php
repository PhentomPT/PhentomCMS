<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$true_total_views = $statistics->getTrueViews();

$system->assign("true_total_views", $true_total_views);

$statistics->viewsCount();

$bigger = max(array($statistics->today,$statistics->yesterday,$statistics->day2ago,$statistics->day3ago,$statistics->day4ago));

$system->assign("bigger", $bigger);

$system->assign("views_today", $statistics->today);
$system->assign("views_yesterday", $statistics->yesterday);
$system->assign("views_2days_ago", $statistics->day2ago);
$system->assign("views_3days_ago", $statistics->day3ago);
$system->assign("views_4days_ago", $statistics->day4ago);

$system->display(VIEW_PATH. "/statistics.html");