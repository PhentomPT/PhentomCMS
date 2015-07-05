<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for Soap or RA connection <br/>
 * to the game server and related functions.
 *
 * @name	: class.soap_ra.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 * 
 */
class Soap_RA extends Database{
	
	/**
	 * Connection of the Soap or RA
	 * 
	 * @var	: connection
	 */
	private $game_connection;
	
	/**
	 * Connection type (SOAP or RA)
	 * 
	 * @var	: string
	 */
	private $connection_type;
	
	/**
	 * Host for the Soap or RA connection
	 * 
	 * @var	: string
	 */
	private $connection_host;
	
	/**
	 * Port for the Soap or RA connection
	 *
	 * @var	: string
	 */
	private $connection_port;
	
	/**
	 * Username for Soap or RA connection
	 *
	 * @var	: string
	 */
	private $connection_username;
	
	/**
	 * Password for the Soap or RA connection
	 *
	 * @var	: string
	 */
	private $connection_password;
	
	/**
	 * Creates a Soap or RA connection
	 */
	protected function __construct(){
		$server_info = $this->serverInfo();
		
		$this->server_core = $server_info[0]['core'];
		$this->connection_type = $server_info[0]['connection_type'];
		
		$this->game_credentials($this->connection_type);
		
		if ($this->connection_type == "SOAP"){
			$this->game_connection = new SoapClient(NULL, array(
					'location' => "http://". $this->soap_host .":". $this->soap_port ."/",
					'uri'      => 'urn:TC',
					'style'    => SOAP_RPC,
					'login'    => $this->soap_username,
					'password' => $this->soap_password,
			));
		}
		
		if ($this->connection_type == "RA"){
			$this->game_connection = fsockopen($this->ra_host, $this->ra_port, $error, $error_str, 30);
		}
	}
	
	/**
	 * Retrieves the server connection <br/>
	 * credentials from the database
	 * 
	 * @param	: $type (string)
	 */
	private function game_credentials($type){
		$query = "SELECT host, port, username, password
		FROM ". DBNAME .".". WEB_TBL_SOAP ." 
			WHERE type = '". $type ."'
		LIMIT 1";
		
		$soap_info = $this->SimpleQuery($query);
		
		$this->connection_host = $soap_info[0]['host'];
		$this->connection_port = $soap_info[0]['port'];
		$this->connection_username = $soap_info[0]['username'];
		$this->connection_password = $soap_info[0]['password'];
	}
	
	/**
	 * Executes a given GM command <br/>
	 * through the Soap or RA connection.
	 * 
	 * @param	: $command (string)
	 * @return	: multitype: on success (boolean) | on error (string)
	 */
	private function execute_command($command){
		if ($this->connection_type == "SOAP"){
			try{
				$result = $this->game_connection->executeCommand(new SoapParam($command, "command"));
			}
			catch(Exception $e){
				return $e->getMessage();
			}
			
			return true;
		}
		
		if ($this->connection_type == "RA"){
			if(!$this->game_connection){
				return $error ." - ". $error_str;
			}
			else {
				fputs($this->game_connection, $this->connection_username ."\n");
				sleep(2);
				fputs($this->game_connection, $this->connection_password ."\n");
				sleep(2);
				fputs($this->game_connection,  $command ."\n");
				sleep(2);
				fclose($this->game_connection);
				return true;
			}
		}
	}
	
	/**
	 * Registers and in-game account.
	 * 
	 * @param	: $username (string)
	 * @param	: $password (string)
	 * @param	: $email (string)
	 * @return	: $return (string)
	 */
	public function register($username, $password, $email){
		switch ($this->server_core) {
			case "arcemu" :
				$command = "";
				break;
			case "trinity" :
			case "trinity_v6" :
				$command = "account create $username $password $mail";
				break;
			case "mangos" :
				$command = "";
				break;
			default :
				break;
		}
		
		$return = $this->execute_command($command);
		
		return $return;
	}
	
	/**
	 * Unstucks an in-game character, <br/>
	 * revives and unstucks
	 * 
	 * @param	: $character (string)
	 * @return	: $return (string)
	 */
	public function unstuck($character){
		$character = $this->escapeString($character);
		
		switch ($this->server_core) {
			case "arcemu" :
				$unstuck = "";
				$revive = "";
				break;
			case "trinity" :
			case "trinity_v6" :
				$unstuck = "unstuck $character startzone";
				$revive = "revive $character";
				break;
			case "mangos" :
				$unstuck = "";
				$revive = "";
				break;
			default :
				break;
		}
		
		$result = $this->execute_command($command);
		$result2 = $this->execute_command($command);
		
		return $result ." | ". $result2;
	}
	
	/**
	 * Sends items to a specific <br/>
	 * character via in-game email.
	 * 
	 * @param	: $subject (string)
	 * @param	: $message (string)
	 * @param	: $character (string)
	 * @param	: $items (array)
	 * @return	: $return (string)
	 */
	public function send_items($subject,$message,$character,$items=""){
		$subject = $this->escapeString($subject);
		$message = $this->escapeString($message);
		$character = $this->escapeString($character);
		$list_items = "";
		
		if (!empty($items)){
			foreach ($items as $item){
				$list_items .= $this->escapeString($item) .",";
			}
		}
		
		switch ($this->server_core) {
			case "arcemu" :
				$command = "";
				break;
			case "trinity" :
			case "trinity_v6" :
				$command = "send items $character \"$subject\" \"$message\" $list_items";
				break;
			case "mangos" :
				$command = "";
				break;
			default :
				break;
		}
		
		$result = $this->execute_command($command);
		
		return $result;
	}
	
	/**
	 * Teleports an in-game character <br/>
	 * to a specific location.
	 * 
	 * @param	: $character (string)
	 * @param	: $location (string)
	 * @return	: $return (string)
	 */
	public function teleport($character,$location){
		$character = $this->escapeString($character);
		$location = $this->escapeString($location);
		
		switch ($this->server_core) {
			case "arcemu" :
				$command = "";
				break;
			case "trinity" :
			case "trinity_v6" :
				$command = "tele name $character $location";
				break;
			case "mangos" :
				$command = "";
				break;
			default :
				break;
		}
	
		$result = $this->execute_command($command);
		
		return $result;
	}
}