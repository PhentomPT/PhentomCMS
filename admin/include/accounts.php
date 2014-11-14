<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
?>
<!-- Content -->
<?php echo $lang['not_available']; ?>
<!--Content
<div class="content_b">
	<div class="box">
		<h3 class="box_title">Accounts</h3>
		<div class="separator"></div><p/>
		Visitors today: 1<br />
		Unique visitors: 1<p/>
		Total visitors: 0<br />
		Total unique visitors: 1<p/>
		Visits per day: 1
	</div>
	<div class="box">
		<h3 class="box_title">Characters</h3>
		<div class="separator"></div><p/>
		Registered users today: 1<p />
		Unvalidated users: 0<br />
		Banned users: 0<p/>
		Total amount of users: 1<br/>
		Registered users per day: 1
	</div>
	<div class="box">
		<h3 class="box_title">System</h3>
		<div class="separator"></div><p/>
		PHP version: <?php echo PHP_VERSION; ?><br />
		MySQL version: <?php echo $mysqli -> get_server_info(); ?><p/>
		CMS version: 0.5 Alpha<br />
		<?php
		$file = file_get_contents("http://www.phentom.net/wow_cms_version.txt");
		if ($file == "0.5 Alpha"){
			echo "Update: <a style='color: green;'>Latest</a> <p/>
			<a href='index.php'><button>Check</button></a>";
		}
		else{
			echo "Update: <a style='color: red;'>Required</a>, version ".$file." available<p/>
			<a href='index.php'><button>Check</button></a>
			<a target='_blank' href='http://phentom.net/downloads/wow_cms_2.0.rar'><button>Download</button></a>";
		}
		?>
	</div>
	<div class="clear"></div>
</div>
<div id="content_left">
	<div class="content_s_l">
		<h3>Right Now</h3>
		<div class="box2">
			<h4>Extensions</h4>
			Enabled: Wow.
		</div>
		<div class="box2">
			<h4>Modules</h4>
			Enabled: News, Blog, Forum, Account
		</div>
		<div class="box2">
			<h4>Plugins</h4>
			Enabled: Tooltip, Sidebar_login, Sidebar_realmstatus.
		</div>
		<div class="box2">
			<h4>Themes</h4>
			Enabled: Phentom WoWCMS
		</div>
		<div class="box2">
			<h4>Language</h4>
			Enabled: English
		</div>
		<div class="clear"></div>
	</div>
	<div class="content_s_l">
		<h3>ACP Performance</h3>
		<?php
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		echo 'Load time '.$total_time.' seconds.<br/>';
		echo "Memory Usage: ". formatBytes(memory_get_peak_usage());
		?>
	</div>
</div>
<div id="content_right">
	<div class="content_s">
		<h3>Post News</h3>
		<form action="include/postnews.php" method="post">
			Title<br /><input type="text" name="newstitle" required="required" /><br />
			Image<br /><input type="text" name="newsimg" /><br />
			Content<br /><textarea rows="5" required="required" name="newscontent" required="required"></textarea><p />
			<input type="submit" />
		</form>
	</div>
</div>-->