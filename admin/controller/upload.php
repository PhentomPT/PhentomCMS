<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$uploads = $admin->getUploads();
$system->assign("upload_files", $uploads);

$system->display(VIEW_PATH ."/upload.html");