<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	echo "<div class='fail'>Sorry but you must fist login to view this page.</div>";
}
else{
	?>
	<div class="fail">
	We're sorry but the page your trying to access its not available in this CMS version.<br />
	This feature will be added in future versions.
	</div>
	<?php
}
?>