<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/donate.php";
?>
<div class="box">
	<h3><?php echo $lang['donate']; ?></h3>
	<a href="?page=donate"><img src="content/images/donate.png" width="200"/></a>
	<p><?php echo $lang['donate_ad']; ?></p>
</div>