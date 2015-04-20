<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "../../content/include/db.php";

$mysqli -> query("INSERT INTO news (title,media,user,content) VALUES ('".$_POST['newstitle']."','".$_POST['newsimg']."','".$_SESSION['adminuser']."','".$_POST['newscontent']."')");
header("Location: index.php");
echo "Done!";

?>