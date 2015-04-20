<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/realm_status.php";
?>
<div class="box">
	<h3><?php echo $lang['realm']; ?></h3>
	<p class="realmlist">
		<?php echo $lang['set_realm']; ?><br />
		world-of-wow.com</p>
	<div class="on_players_bar"></div>
	<div class="on_players">
		<?php echo $lang['players_online']; ?>: <a><?php echo $on_players; ?></a>
	</div>
</div>