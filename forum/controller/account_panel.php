<?php
//Refuses Direct Access
if(!defined("PhentomForum")){ echo "You don't have permission to access this file."; exit; }

//Checks if Logged
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	include_once "fail_request.php";
}
else{
?>
<h1>Account - <?php echo $_SESSION['username']; ?></h1>
<div class="info">
	<div class="left">
		<?php
		$userinfo = $mysqli -> query("SELECT * FROM accounts WHERE username='".$_SESSION['username']."'");
		while($row_userinfo = $userinfo -> fetch_array(MYSQLI_ASSOC)){
			echo "<img class='avatar' src='images/avatars/".$row_userinfo['avatar']."' alt='profile-photo' /><br />";
			
			if(!empty($row_userinfo['special_rank'])){
				echo "<img src='images/ranks/".$row_userinfo['special_rank'].".png' alt='special-rank' /><br />";
			}
			
			if($row_userinfo['rank'] >= 0 && $row_userinfo['rank'] < 10){
				$rank = "newbie";
			}
			elseif($row_userinfo['rank'] >= 10 && $row_userinfo['rank'] < 30){
				$rank = "senior";
			}
			elseif($row_userinfo['rank'] >= 30 && $row_userinfo['rank'] < 60){
				$rank = "veteran";
			}
			elseif($row_userinfo['rank'] >= 60 && $row_userinfo['rank'] < 100){
				$rank = "super_user";
			}
			elseif($row_userinfo['rank'] >= 100 && $row_userinfo['rank'] < 150){
				$rank = "heroic_user";
			}
			elseif($row_userinfo['rank'] >= 200){
				$rank = "mythical";
			}
			echo "<img src='images/ranks/".$rank.".png' alt='rank' />";
		}
		?>
	</div>
	<div class="left">
		Username: <a class="user"><?php echo $_SESSION['username']; ?></a><br /><br />
		<h3>User Info</h3>
	<p>Joined: 16 Feb 2014 17:21</p>
	<p>Last visited: 07 Nov 2014 19:43</p>
	<p>Total posts: 30</p>
	</div>
	<div class="clear"> </div>
</div>
<div class="info">
	<div class="left">
		<h3>Contact Info</h3>
	</div>
	<div class="left">
	<h3>User Statistics</h3>
	Joined: 16 Feb 2014 17:21<br />
	Last visited: 07 Nov 2014 19:43<br />
	Total posts: 30 | Search user’s posts (100.00% of all posts / 0.11 posts per day)<br />
	Most active forum: First forum (27 Posts / 90.00% of user’s posts)<br />
	Most active topic: Announce [Few Pages]	(22 Posts / 73.33% of user’s posts)<br />
	</div>
	<div class="clear"> </div>
</div>
<?php
}
?>