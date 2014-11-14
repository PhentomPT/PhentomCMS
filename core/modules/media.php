<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/media.php";
?>
<div class="fail">
	<?php echo $lang['not_available']; ?>
</div>