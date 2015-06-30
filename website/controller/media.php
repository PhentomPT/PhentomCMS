<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$media = $objData->getMedia();
$system->assign("media", $media);

$system->display(VIEW_PATH ."/media.html");