<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

class Data extends Database{

	//Gets the menu by part (top / bar)
	public function getMenu($part){
		if (empty($part)){
			$error[] .= "error_menu";
			return $error;
		}
		
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
			$logged = "AND logged IN (1,2)";
		}
		else{
			$logged = "AND logged IN (0,2)";
		}
		
		$query = "SELECT name, link, icon
		FROM ". DBFORUM .".". WEB_TBL_MENU ."
		WHERE position = '". $part ."' ". $logged ." ORDER BY link_order";
		
		$return = $this->SimpleQuery($query);
		
		return $return;
	}
	
	//Gets Posts
	public function getPosts(){
		$query = "SELECT *
		FROM ". DBFORUM .".". FORUM_TBL_TOPICS ."
		WHERE ";
		
		$return =$this->SimpleQuery($query);
		
		return $return;
	}
	
}