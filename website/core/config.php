<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This file stores all the main system
 * constants for the website application as
 * well as session start or resume
 *
 * @name	: config.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

//Starts session
session_start();
ob_start();

//System constants
define("WEB_PATH", dirname(__DIR__)); //This is the primary path of the system
define("CONTROLLER_PATH", APP_PATH ."/controller");
define("VIEW_PATH", APP_PATH ."/view");
define("CORE_PATH", APP_PATH ."/core");
define("PLUGIN_PATH", APP_PATH ."/plugin");
define("SCRIPT_PATH", APP_PATH ."/script");
define("STYLE_PATH", APP_PATH ."/style");
define("LANGUAGE_PATH", APP_PATH ."/language");
define("IMAGE_PATH", APP_PATH ."/image");
define("INCLUDE_PATH", APP_PATH ."/include");
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
define("WEB_TBL_MEDIA", "media");
define("WEB_TBL_SOAP_RA", "soap_ra");

//Forum table constants
define("FORUM_TBL_ACCOUNTS", "accounts");
define("FORUM_TBL_CATEGORYS", "categorys");
define("FORUM_TBL_FORUMS", "forums");
define("FORUM_TBL_REPLYS", "replys");
define("FORUM_TBL_TOPICS", "topics");
define("FORUM_TBL_MENU", "menu");
