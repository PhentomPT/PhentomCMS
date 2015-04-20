<?php
//Refuses Direct Access
if(!defined("PhentomCMS")){ exit; };
?>
<div class="block">
	<h3><img src="<?php echo install; ?>/images/server.png" /> <?php echo $lang['title'];?></h3>
	<form action="" method="post" autocomplete="off">
		<p><?php echo $lang['success']; ?></p>
		<p><input type="submit" name="submit" value="<?php echo $lang['next_step']; ?>" /></p>
	</form>
	<p><a href="index.php?page=web"><button><?php echo $lang['go_back']; ?></button></a></p>
</div>
<?php
if(!isset($_POST['submit'])){}
else{
	rename ("install/", "trash/");
	header("Location: index.php");
}
?>