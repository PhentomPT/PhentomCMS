<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/news.php";

$mysqli -> select_db("wowcms");
$result = $mysqli -> query("SELECT * FROM news ORDER BY id DESC LIMIT 5");

while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
	echo "<div class='announce'>
	<h3>".$row['title']."</h3>";
	if ($row['media']==""){}
	else{
		echo "<img src='content/images/".$row['media']."' width='700px' height='300px' />";	
	}
	echo "<p>Posted by: <a class='user'>".$row['user']."</a>, ". humanTiming(strtotime($row['posttime']))." ago.</p>
	<p>".$row['content']."</p>
	<div class='news_div'></div>
	</div>";
}
?>	