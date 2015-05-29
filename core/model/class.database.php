<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for database connection and related functions <br/>
 *
 * @name	: class.database.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */


class Database{
	
	/**
	 * Class constructor to created the database connection
	 *
	 * @return	: displays an error if connection fails
	 */
	public function __construct(){
		if (defined("DBHOST")){
			$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT);
				
			if ($con->connect_errno){
				ob_clean();
				include INCLUDE_PATH ."/db_error.php";
				die();
			}
			else{
		    	$this->con = $con;
			}
		}
	}
	
	/**
	 * Selects a database by a given name to use
	 * 
	 * @param	: $db_name (string)
	 * @return	: $result (boolean)
	 */
	public function SelectDb($db_name){
		$result = $this->con->select_db($db_name);
		
		return $result;
	}
	
	/**
	 * Escapes a given string or array
	 * 
	 * @param	: $string (string / array)
	 * @return	: $string (string / array)
	 */
	public function escapeString($string){
		if (is_array($string)){
			foreach ($string as $key => $value){
				$string[$key] = $this->con->real_escape_string($value);
			}
			return $string;
		}
		else{
			return $this->con->real_escape_string($string);
		}
	}
	
	/**
	 * Executes a query written by hand <br/>
	 * Displays an error if query fails <br/>
	 * Used to retrieve values
	 * 
	 * @param	: $query (string)
	 * @return	: $values (array)
	 */
	public function SimpleQuery($query){
		$values = array();
		
		$array = $this->con->query($query);
	
		if ($array == FALSE){
			ob_clean();
			$query_error = $this->con->error;
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	
		while ($fields = $array->fetch_array(MYSQL_ASSOC)){
			$values[] = $fields;
		}
	
		return $values;
	}
	
	/**
	 * Executes a query witten by hand <br/>
	 * Displays an error if query fails <br/>
	 * Used for UPDATE or INSERT
	 * 
	 * @param	: $query (string)
	 */
	public function SimpleUpdateQuery($query){
		$stmt = $this->con->query($query);
		
		if (!$stmt){
			ob_clean();
			$query_error = $this->con->error;
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	}

	/**
	 * Generates a query with the given parameters
	 * 
	 * @param	: $fields (string)
	 * @param	: $table (string)
	 * @param	: $where (string)
	 * @param	: $groupBy (string)
	 * @param	: $orderBy (string)
	 * @param	: $limit (string)
	 * @return	: $values (array) 
	 */
	public function SelectQuery($fields, $table, $where="", $groupBy="", $orderBy="", $limit=""){
		$values = array();
		$fieldArray = explode(",", $fields);
		
		if (!empty($where)){
			$where = "WHERE $where";
		}
		if(!empty($limit)){
			$limit = "LIMIT ".$limit;
		}
		if (!empty($groupBy)){
			$groupBy = "GROUP BY $groupBy";
		}
		if(!empty($orderBy)){
			$orderBy = "ORDER BY ".$orderBy;
		}
	
		$query = "SELECT $fields FROM $table $where $groupBy $orderBy $limit";
		
		$array = $this->con->query($query);
	
		if ($array == false){
			ob_clean();
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	
		while ($fields = $array->fetch_array(MYSQL_ASSOC)){
			$values[] = $fields;
		}
	
		return $values;
	}
	
	/**
	 * Gets the database version
	 * 
	 * @return	: $mysql_version (string)
	 */
	public function getDbVersion(){
		$mysql_version = $this->SimpleQuery("SELECT VERSION();");
		
		$mysql_version = $mysql_version[0]['VERSION()'];
		
		return $mysql_version;
	}
	
	/**
	 * Gets the server info (table info)
	 * 
	 * @return	: $server_info (array)
	 */
	public function serverInfo(){
		$server_info = $this->SimpleQuery("SELECT title, slogan, style, onplayers, slider, core, acc_db as accounts, char_db as characters, world_db as world, realmlist 
		FROM ". DBNAME .".". WEB_TBL_INFO ."");
		
		return $server_info;
	}
}
