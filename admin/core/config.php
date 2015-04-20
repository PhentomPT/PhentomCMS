<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Stats session
session_start();
ob_start();

//System constants
define("DIR", dirname(__DIR__));
define("WEB_PATH", dirname(DIR)); //This is the primary path of the system
define("CONTROLLER_PATH", DIR ."/controller");
define("VIEW_PATH", DIR ."/view");
define("CORE_PATH", DIR ."/core");
define("PLUGIN_PATH", DIR ."/plugin");
define("SCRIPT_PATH", DIR ."/script");
define("STYLE_PATH", DIR ."/style");
define("LANGUAGE_PATH", DIR ."/language");
define("IMAGE_PATH", DIR ."/image");
define("INCLUDE_PATH", DIR ."/include");
define("UPLOAD_PATH", IMAGE_PATH ."/uploads");

//Website table constants
define("WEB_TBL_ACCOUNT_INFO", "account_info");
define("WEB_TBL_CHAT", "chat");
define("WEB_TBL_INFO", "info");
define("WEB_TBL_MENU", "menu");
define("WEB_TBL_NEWS", "news");
define("WEB_TBL_STATISTICS", "statistics");
define("WEB_TBL_VOTED_COOLDOWN", "voted_cooldown");
define("WEB_TBL_VOTE_LINKS", "vote_links");

//Forum table constants
define("FORUM_TBL_ACCOUNTS", "accounts");
define("FORUM_TBL_CATEGORYS", "categorys");
define("FORUM_TBL_FORUMS", "forums");
define("FORUM_TBL_REPLYS", "replys");
define("FORUM_TBL_TOPICS", "topics");
define("FORUM_TBL_MENU", "menu");

