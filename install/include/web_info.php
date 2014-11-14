<?php
//Refuses Direct Access
if(!defined("PhentomCMS")){ exit; };
?>
<div class="block">
	<h3><img src="<?php echo install; ?>/images/web.png" /> <?php echo $lang['title'];?></h3>
	<form action="" method="post" autocomplete="off">
		<p><?php echo $lang['web_title']; ?><br /><input type="text" name="title" required="required" /></p>
		<p><?php echo $lang['web_slogan']; ?><br /><input type="text" name="slogan"/></p>
		<p><?php echo $lang['server_core']; ?><br />
		<select name="core">
			<option value="trinity">Trinity</option>
			<option value="mangos">Mangos</option>
			<option value="arcemu">Arcemu</option>
		</select></p>
		<p><?php echo $lang['server_expansion']; ?><br />
		<select name="expansion">
			<option value="0">Vanilla</option>
			<option value="1">The Burning Crusade</option>
			<option value="2">Wrath of the Lich King</option>
			<option value="3">Cataclysm</option>
			<option value="4">Mists of Pandaria</option>
			<option value="5">Warlords of Draenor</option>
		</select></p>
		<p><?php echo $lang['server_max_players']; ?><br /><input type="number" name="mplayers" required="required" /></p>
		<p><?php echo $lang['web_slider']; ?><br />
		<select name="slider">
			<option value="off">Off</option>
			<option value="on">On</option>
		</select></p>
		<p><input type="submit" name="submit" value="<?php echo $lang['next_step']; ?>" /></p>
	</form>
	<p><a href="index.php"><button><?php echo $lang['go_back']; ?></button></a></p>
</div>
<?php
if(!isset($_POST['submit'])){}
else{
	switch ($_POST['expansion']) {
		case '0':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 0;
			}
			else{
				$expansion = 0;
			}
			break;
		case '1':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 1;
			}
			else{			
				$expansion = 8;
			}
			break;
		case '2':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 2;
			}
			else{
				$expansion = 24;
			}
			break;
		case '3':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 3;
			}
			else{
				$expansion = 32;
			}
			break;
		case '4':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 4;
			}
			else{
				$expansion = 32;
			}
			break;
		case '5':
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 5;
			}
			else{
				$expansion = 32;
			}
			break;
		default:
			if($_POST['core'] == "trinity" || $_POST['core'] == "mangos"){
				$expansion = 3;
			}
			else{
				$expansion = 32;
			}
			break;
	}
	
	if($_POST['core'] == "trinity"){
		$acc_db = "auth";
		$char_db = "characters";
		$world_db = "world";
	}
	elseif($_POST['core'] == "mangos"){
		$acc_db = "realmdb";
		$char_db = "characters";
		$world_db = "world";
	}
	else{
		$acc_db = "logon";
		$char_db = "characters";
		$world_db = "world";
	}
	
	@include_once "content/include/db.php";
	$mysqli -> query("INSERT INTO info (title, slogan, core, expansion, acc_db, char_db, world_db, style, onplayers, slider) VALUES ('".$_POST['title']."','".$_POST['slogan']."','".$_POST['core']."','".$expansion."','".$acc_db."','".$char_db."','".$world_db."','default','".$_POST['mplayers']."','".$_POST['slider']."')");
	$mysqli -> close();
	header("Location: ?page=server");
}
?>