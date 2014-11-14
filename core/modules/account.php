<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/account.php";

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	echo "<div class='fail'>Sorry but you must fist login to view this page.</div>";
}
else{
	?>
	<table align='center'>
		<tr>
			<th>User</th>
			<th>Email</th>
			<th>Vote Points</th>
			<th>Donation Points</th>
		</tr>
		<tr>
			<td>Phentom</td>
			<td>Carlos@gmail.com</td>
			<td>100</td>
			<td>50</td>
		</tr>
	</table>
	<a href="?page=store" class="user"><div class="acc_opt"><img src="content/images/global_icons/store.png" />STORE</div></a>
	<a href="?page=revive" class="user"><div class="acc_opt"><img src="content/images/global_icons/ress.png" />REVIVE</div></a>
	<a href="?page=unstuck" class="user"><div class="acc_opt"><img src="content/images/global_icons/unstuck.png" />UNSTUCK</div></a>
	<a href="?page=teleport" class="user"><div class="acc_opt"><img src="content/images/global_icons/tele.png" />TELEPORT</div></a>
	<a href="?page=changef" class="user"><div class="acc_opt"><img src="content/images/global_icons/changef.png" />CHANGE FACTION</div></a>
	<a href="?page=changen" class="user"><div class="acc_opt"><img src="content/images/armor.jpg" />CHANGE NAME</div></a>
	<a href="?page=donate" class="user"><div class="acc_opt"><img src="content/images/global_icons/donate.png" />DONATE</div></a>
	<a href="?page=vote" class="user"><div class="acc_opt"><img src="content/images/global_icons/vote.png" />VOTE</div></a>
	<?php
}
?>