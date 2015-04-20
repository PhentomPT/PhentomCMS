<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/vote.php";

?>
<div class="box">
	<h3><?php echo $lang['vote']; ?></h3>
	<a href="?page=vote"><img src="content/images/vote.png" width="150"/></a>
	<p><?php echo $lang['vote_ad']; ?></p>
</div>