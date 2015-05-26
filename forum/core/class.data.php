<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for forum related functions <br/>
 * Extends the class.database.php in order to
 * operate with information stored in the
 * database
 *
 * @name	: class.data.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Data extends Database{

	/**
	 * Gets the menu by part (top / bar)
	 * 
	 * @param	: $part (string)
	 * @return	: $return (array)
	 */
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
	
	/**
	 * Gets all the posts
	 * 
	 * @return	: $return (array)
	 */
	public function getPosts(){
		$query = "SELECT *
		FROM ". DBFORUM .".". FORUM_TBL_TOPICS ."
		WHERE ";
		
		$return =$this->SimpleQuery($query);
		
		return $return;
	}
	
}