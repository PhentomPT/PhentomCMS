<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$system->display(PLUGIN_PATH . "/realm_status/view/realm_status.html");
