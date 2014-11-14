<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/donate.php";

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	echo "<div class='fail'>".$lang['login_first']."</div>";
}
else{
	?>
	<div class="fail">
	<?php echo $lang['not_available']; ?>
	</div>
	<?php
}
?>