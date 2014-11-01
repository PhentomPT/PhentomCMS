<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
?>
<div class="box">
	<h3>Realm</h3>
	<p class="realmlist">
		set realmlist<br />
		world-of-wow.com</p>
	<div class="on_players_bar"></div>
	<div class="on_players">
		Players online: <a><?php echo $on_players; ?></a>
	</div>
</div>