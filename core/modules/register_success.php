<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/register_success.php";
?>
<h2 class="user"><?php echo $lang['created']; ?></h2>
<?php echo $lang['created_success']; ?>