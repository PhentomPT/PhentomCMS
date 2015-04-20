<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Gets IP and Location details for statistics use
$statistics->get_client_ip();
$statistics->geoCheckIP();
$statistics->saveStatistics();