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