<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['welcome'] = "Welcome";
$lang['visits'] = "Visits";
$lang['system'] = "System";
$lang['right_now'] = "Right Now";
$lang['acp_performance'] = "Performance";
$lang['load_time'] = "Load Time";
$lang['memory_usage'] = "Memory Usage";
$lang['post_news'] = "Post News";
$lang['title'] = "Title";
$lang['image'] = "Image";
$lang['content'] = "Content";
$lang['post'] = "Post";
$lang['check'] = "Check";
$lang['enabled'] = "Enabled";
$lang['visitors_today'] = "Visitors Today";
$lang['unique_visitors'] = "Unique Visitors";
$lang['total_visitors'] = "Total Visitors";
$lang['total_unique_visitors'] = "Total Unique Visitors";
$lang['visits_per_day'] = "Visits Per Day";
$lang['registered_users_today'] = "Registered Users Today";
$lang['unvalidated_users'] = "Unvalidated Users";
$lang['banned_users'] = "Banned Users";
$lang['total_amount_of_users'] = "Total Ammount of Users";
$lang['registered_users_per_day'] = "Registered Users Per Day";
$lang['php_version'] = "PHP Version";
$lang['mysql_version'] = "MySQL Version";
$lang['cms_version'] = "CMS Version";
$lang['latest'] = "Latest";
$lang['update_required'] = "Required";
$lang['update'] = "Update";
$lang['version'] = "Version";
$lang['available'] = "Available";
$lang['download'] = "Download";
$lang['admin_panel'] = "Admin Panel";
$lang['powered_by'] = "Powered by";
$lang['dashboard'] = "Dashboard";
$lang['website'] = "Website";
$lang['accounts'] = "Accounts";
$lang['tools'] = "Tools";
$lang['upload'] = "Upload";
$lang['modules'] = "Modules";
$lang['plugins'] = "Plugins";
$lang['statistics'] = "Statistics";
$lang['themes'] = "Themes";
$lang['languages'] = "Languages";
$lang['info'] = "Info";
$lang['logout'] = "Logout";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}