<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

class Database{
	
	public function __construct(){
		if (is_string(DBHOST)){
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
	
	//Selects a database for use
	public function SelectDb($db_name){
		$result = $this->con->select_db($db_name);
		
		return $result;
	}
	
	//Escapes a string or an array
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
	
	//Returns the values (in a array) from a query written by hand
	public function SimpleQuery($query){
		$values = array();
		$array = $this->con->query($query);
	
		if ($array == false){
			ob_end_clean();
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	
		while ($fields = $array->fetch_array(MYSQL_ASSOC)){
			$values[] = $fields;
		}
	
		return $values;
	}
	
	//Simple update query (returns only an error if it happens)
	public function SimpleUpdateQuery($query){
		$stmt = $this->con->query($query);
		
		if (!$stmt){
			ob_end_clean();
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	}

	//Returns the values (in a array) from a query generated with the fields that are inputed
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
			ob_end_clean();
			include INCLUDE_PATH ."/db_error.php";
			die();
		}
	
		while ($fields = $array->fetch_array(MYSQL_ASSOC)){
			$values[] = $fields;
		}
	
		return $values;
	}
	
	//Gets the DB version
	public function getDbVersion(){
		$mysql_version = $this->SimpleQuery("SELECT VERSION();");
		
		$mysql_version = $mysql_version[0]['VERSION()'];
		
		return $mysql_version;
	}
	
	//Returns the server info
	public function serverInfo(){
		$server_info = $this->SimpleQuery("SELECT title, slogan, style, onplayers, slider, core, acc_db as accounts, char_db as characters, world_db as world, realmlist 
		FROM ". DBNAME .".". WEB_TBL_INFO ."");
		
		return $server_info;
	}
}
