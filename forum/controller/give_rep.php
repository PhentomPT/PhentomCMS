<?php
if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ echo "You should not be doing this..."; exit; }
else{
	//Get Variables
	$user_gave = $_GET['by'];
	$user_recive = $_GET['rep'];
	
	//Checks if rep is for Topic or Reply
	if(!isset($_GET['reply'])){
		$id_post = $_GET['topic'];
		$id_reply = "";
		
		//Checks if rep was given before
		$check_rep = $mysqli -> query("SELECT * FROM rep_given WHERE user_gave='$user_gave' AND user_recived='$user_recive' AND id_topic='$id_post'");
		if($verify = $check_rep -> num_rows > 0){
			echo "You already gave rep.";
			header("Location: ?forum=".$_GET['forum']."&topic=".$_GET['topic']."");
		}
		else{
			$mysqli -> query("INSERT INTO rep_given (user_gave,user_recived,id_topic,id_reply) VALUES ('$user_gave','$user_recive','$id_post','$id_reply')");
			$mysqli -> query("UPDATE accounts SET rank= rank + 1 WHERE username='$user_recive'");
			header("Location: ?forum=".$_GET['forum']."&topic=".$_GET['topic']."");
		}
	}
	else{
		$id_post = "";
		$id_reply = $_GET['reply'];
		
		//Checks if rep was given before
		$check_rep = $mysqli -> query("SELECT * FROM rep_given WHERE user_gave='$user_gave' AND user_recived='$user_recive' AND id_reply='$id_reply'");
		if($verify = $check_rep -> num_rows > 0){
			echo "You already gave rep.";
			header("Location: ?forum=".$_GET['forum']."&topic=".$_GET['topic']."");
		}
		else{
			$mysqli -> query("INSERT INTO rep_given (user_gave,user_recived,id_topic,id_reply) VALUES ('$user_gave','$user_recive','$id_post','$id_reply')");
			$mysqli -> query("UPDATE accounts SET rank= rank + 1 WHERE username='$user_recive'");
			header("Location: ?forum=".$_GET['forum']."&topic=".$_GET['topic']."");
		}
	}
}
?>