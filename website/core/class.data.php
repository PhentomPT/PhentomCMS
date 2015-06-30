<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for website related functions <br/>
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
	 * Gets the menu by part (left / right)
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
		FROM `". DBNAME ."`.". WEB_TBL_MENU ."
		WHERE position = '". $part ."' ". $logged ." ORDER BY link_order";
		
		$return = $this->SimpleQuery($query);
		
		return $return;
	}
	
	/**
	 * Gets all the media images/videos from database
	 * 
	 * @return	: $result (array)
	 */
	public function getMedia(){
		$query = "SELECT title, img
		FROM `". DBNAME ."`.". WEB_TBL_MEDIA;
		
		$return = $this->SimpleQuery($query);
		
		return $return;
	}
	
	/**
	 * Returns total of online players
	 * 
	 * @return	: $return (array)
	 */
	public function getOnlinePlayers(){
		$info = $this->serverInfo();
		
		switch ($info[0]['core']){
			//Arcemu
			case "arcemu":
				$query = "SELECT COUNT(id) as total_online_players FROM ". $info[0]['accounts'] .".account WHERE online=1";
				break;
			//Trinity
			case "trinity":
			case "trinity_v6":
				$query = "SELECT COUNT(id) as total_online_players FROM ". $info[0]['accounts'] .".account WHERE online=1";
				break;
			//Mangos
			case "mangos":
				$query = "SELECT COUNT(id) as total_online_players FROM ". $info[0]['accounts'] .".account WHERE active_realm_id IN (1,2,3,4,5,6,7,8,9,10)";
				break;
			default:
				$query = "SELECT COUNT(id) as total_online_players FROM ". $info[0]['accounts'] .".account WHERE online=1";
				break;
		}
		
		$return = $this->SimpleQuery($query);
		
		return $return;
	}
	
	/**
	 * Returns the realm status <br/>
	 * Online	: true <br/>
	 * Offline	: false
	 * 
	 * @return	: (boolean) 
	 */
	public function realmStatus(){
		$info = $this->serverInfo();
		
		switch ($info[0]['core']){
			//Arcemu
			case "arcemu":
				$realm_port = 8129;
				break;
				//Trinity
			case "trinity":
			case "trinity_v6":
				$realm_port = 8085;
				break;
				//Mangos
			case "mangos":
				$realm_port = 8085;
				break;
			default:
				$realm_port = 8085;
				break;
		}
		
		$fp = @fsockopen ($_SERVER['SERVER_ADDR'], $realm_port,$errno,$errstr, 0.5);
		if ($fp){ 
			return true;
		}
		else {
			return false;
		}
	}
	
	/**
	 * ## WARNING THIS IS EXPERIMENTAL ##
	 * Checks and processes the vote action
	 * 
	 */
	public function checkVote(){
		
		//List of servers accepted to vote
		$accepted_servers = array(
				'openwow' => "159.253.128.82",
				'topg' => "192.99.101.31",
				'top100arena' => "209.59.143.11",
				'arenatop100' => "198.20.70.235"
		);
	
		if (in_array($_SERVER['REMOTE_ADDR'],$accepted_servers)){
			
			//Retrieve the name of the voted server
			foreach ($accepted_servers as $key => $value) {
				if ($_SERVER['REMOTE_ADDR'] == $value){
					$server = $key;
					break;
				}
			}
	
			//Retrieve the variable from the callback
			if ($_SERVER['REQUEST_METHOD'] === "POST"){
				foreach ($_POST as $name => $val){
					$user_id = $val;
				}
			}
			elseif($_SERVER['REQUEST_METHOD'] === "GET"){
				foreach ($_GET as $name => $val){
					$user_id = $val;
				}
			}
			elseif($_SERVER['REQUEST_METHOD'] === "REQUEST"){
				foreach ($_REQUEST as $name => $val){
					$user_id = $val;
				}
			}
			else{
				echo 'Sorry but you can`t do that.';
				die;
			}
	
			//Transform Account ID in Account Username
			if (is_numeric($user_id)){
				$this->SelectDb($acc_db);
				$account_name = $this->SimpleQuery("SELECT username FROM account WHERE id = '$user_id'");
				$user_id = $account_name[0]['username'];
			}
	
			//Sets the timezone to the server timezone location
			date_default_timezone_set(date_default_timezone_get());
	
			$this->SelectDb(DBNAME);
	
			//Gets how many votepoints for the vote link
			$points_check = $this->SimpleQuery("SELECT * FROM vote_links WHERE name = '$server'");
			$points = $points_check[0]['value'];
	
			$last_time = $this->SimpleQuery("SELECT * FROM voted_cooldown WHERE username = '$user_id' AND voted_link = '$server'");
			$now = date("Y/m/d H:i:s", time());
	
			if (count($last_time) == 0){
				$this->SimpleQuery("INSERT INTO voted_cooldown (username,voted_link,voted_time) VALUES('$user_id','$server','$now')");
				$this->SelectDb($acc_db);
				$this->SimpleQuery("UPDATE account SET vp = vp+$points WHERE username = '$user_id'");
				echo "Success!";
			}
			else{
				foreach ($last_time as $key => $value){
					$last_time_voted[$key] = date("Y/m/d H:i:s", strtotime($row['voted_time']));
				}
					
				$can_vote = date("Y/m/d H:i:s",strtotime("+12 Hours", strtotime($last_time_voted)));
				$time_to_vote_again = date("H:i:s",strtotime($can_vote) - strtotime($now));
					
				//Debug to vote again
				//$can_vote = $now;
					
				if ($now >= $can_vote){
					$this->SimpleQuery("UPDATE voted_cooldown SET voted_time = '$now' WHERE username = '$user_id' AND voted_link = '$server'");
					$this->SelectDb($acc_db);
					$this->SimpleQuery("UPDATE account SET vp = vp+$points WHERE username = '$user_id'");
					echo "Success!";
				}
				else {
					echo 'Sorry but you can`t vote yet';
				}
			}
		}
		else{
			//Debug to get address from server
			//$now = date("Y/m/d H:i:s", time());
			//$user_id = "debug";
			//$this->SelectDb(DBNAME);
			//$this->SimpleQuery("INSERT INTO voted_cooldown (username,voted_link,voted_time) VALUES('$user_id','".$_SERVER['REMOTE_ADDR']."','$now')");
			//echo "Your not allowed here...";
		}
	}
}
