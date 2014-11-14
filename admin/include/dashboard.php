<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/dashboard.php";

?>
<div class="content_b">
	<div class="box">
		<h3 class="box_title"><?php echo $lang['visits']; ?></h3>
		<div class="separator"></div><p/>
		<?php echo $lang['visitors']." ".$lang['today']; ?>: 1<br />
		<?php echo $lang['unique']." ".$lang['visitors']; ?>: 1<p/>
		<?php echo $lang['total']." ".$lang['visitors']; ?>: 0<br />
		<?php echo $lang['total']." ".$lang['unique']." ".$lang['visitors']; ?>: 1<p/>
		<?php echo $lang['visits']." ".$lang['per_day']; ?>: 1
	</div>
	<div class="box">
		<h3 class="box_title">Accounts</h3>
		<div class="separator"></div><p/>
		<?php echo $lang['registered']." ".$lang['users']." ".$lang['today']; ?>: 1<p />
		<?php echo $lang['unvalidated']." ".$lang['users']; ?>: 0<br />
		<?php echo $lang['banned']." ".$lang['users']; ?>: 0<p/>
		<?php echo $lang['total']." ".$lang['amount_of']." ".$lang['users']; ?>: 1<br/>
		<?php echo $lang['registered']." ".$lang['users']." ".$lang['per_day']; ?>: 1
	</div>
	<div class="box">
		<h3 class="box_title">System</h3>
		<div class="separator"></div><p/>
		PHP <?php echo $lang['version'].": ".PHP_VERSION ;?><br />
		MySQL <?php echo $lang['version'].": ".mysql_get_server_info();?><p/>
		CMS <?php echo $lang['version'].": ".$cms_version; ?><br />
		<?php
		$file = file_get_contents("http://www.phentom.net/wow_cms_version.txt");
		if ($file == $cms_version){
			echo $lang['update'].": <a style='color: green;'>".$lang['latest']."</a> <p/>
			<a href='index.php'><button>Check</button></a>";
		}
		else{
			echo $lang['update'].": <a style='color: red;'>".$lang['required']."</a>, ".$lang['version']." ".$file." ".$lang['available']."<p/>
			<a href='index.php'><button>".$lang['check']."</button></a>
			<a target='_blank' href='http://phentom.net/downloads/wow_cms_1.0_beta.rar'><button>".$lang['download']."</button></a>";
		}
		?>
	</div>
	<div class="clear"></div>
</div>
<div id="content_left">
	<div class="content_s_l">
		<h3><?php echo $lang['right_now']; ?></h3>
		<div class="box2">
			<h4><?php echo $lang['extensions']; ?></h4>
			<?php echo $lang['enabled']; ": ".
			$path = '../core/extensions/';
			foreach (new DirectoryIterator($path) as $file){
			    if($file->isDot()) continue;
			
			    if($file->isDir()){
			        print ucfirst($file->getFilename()) . '.';
			    }
			}
			?>
		</div>
		<div class="box2">
			<h4><?php echo $lang['modules']; ?></h4>
			<?php echo $lang['enabled']; ?>: News, Blog, Forum, Account.
		</div>
		<div class="box2">
			<h4><?php echo $lang['plugins']; ?></h4>
			<?php echo $lang['enabled']; ?>: Tooltip, Sidebar_login, Sidebar_realmstatus.
		</div>
		<div class="box2">
			<h4><?php echo $lang['themes']; ?></h4>
			<?php echo $lang['enabled'] .": ". ucfirst($style); ?>.
		</div>
		<div class="box2">
			<h4><?php echo $lang['language']; ?></h4>
			<?php echo $lang['enabled'] .": ". ucfirst($_SESSION['lang']); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content_s_l">
		<h3><?php echo $lang['acp_performance']; ?></h3>
		<?php
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		echo $lang['load_time'].": ".$total_time." ".$lang['seconds']."<br/>";
		echo $lang['memory_usage'].": ".formatBytes(memory_get_peak_usage());
		?>
	</div>
</div>
<div id="content_right">
	<div class="content_s">
		<h3><?php echo $lang['post_news']; ?></h3>
		<form action="" method="post">
			<?php echo $lang['title']; ?><br /><input type="text" name="newstitle" required="required" autocomplete="off"/><br />
			<?php echo $lang['image']; ?><br /><input type="text" name="newsimg" autocomplete="off"/><br />
			<?php echo $lang['content']; ?><br /><textarea rows="5" required="required" name="newscontent" required="required" autocomplete="off"></textarea><p />
			<input type="hidden" name="submit_news" value="post_news" />
			<input type="submit" value="<?php echo $lang['post']; ?>"/>
		</form>
		<?php
			if (isset($_POST['submit_news']) && !empty($_POST['submit_news']) && $_POST['submit_news'] == "post_news"){
				include_once "include/postnews.php";
			}
		?>
	</div>
</div>