<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for account related functions <br/>
 * Extends the class.common.php
 *
 * @name	: class.statistics.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Statistics extends Common{
	
	/**
	 * Class constructor for the database
	 *
	 */
	public function __construct(){
		$this->db = new Database();
	}
	
	/**
	 * Gets the user ip adress
	 * 
	 * @var	: ip (string)
	 */
	public function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    $this->ip = $ipaddress;
	}
	
	/**
	 * Gets the details from the users ip
	 * 
	 * @var		: locations (array)
	 * @return	: On error (string)
	 */
	public function geoCheckIP() {
		if (!filter_var($this->ip, FILTER_VALIDATE_IP)) {
			return "IP is not valid";
		}
		
		$response = file_get_contents('http://www.netip.de/search?query=' . $this->ip);
		if (empty($response)) {
			return "Error contacting Geo-IP-Server";
		}
		
		$patterns = array();
		$patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
		$patterns["country"] = '#Country: (.*?)&nbsp;#i';
		$patterns["state"] = '#State/Region: (.*?)<br#i';
		$patterns["town"] = '#City: (.*?)<br#i';
	
		$ipInfo = array();
	
		foreach ($patterns as $key => $pattern) {
			$ipInfo[$key] = preg_match($pattern, $response, $value) && !empty($value[1]) ? $value[1] : 'not found';
		}
	
		$this->locations = $ipInfo;
	}
	
	/**
	 * Saves statistic information in the database
	 * 
	 */
	public function saveStatistics(){
		$your_session = $this->getSessionID();
		
		$this->db->SelectDb(DBNAME);
		$get_session = $this->db->SimpleQuery("SELECT * FROM statistics WHERE session='$your_session'");
		
		if (count($get_session) < 1){
			$this->db->SimpleQuery("INSERT INTO statistics (session,ip,country,state,town) VALUES ('$your_session','$this->ip','".$this->locations['country']."','".$this->locations['state']."','".$this->locations['town']."')");
		}
	}
	
	/**
	 * ## WARNING THIS IS IN DEVELOPMENT ##
	 * Gets the true views with a where condition if given
	 * 
	 * @param	: $where (string)
	 * @return	: $total (integer)
	 */
	public function getTrueViews($where=""){
		if (!empty($where)){
			$where = "WHERE ".$where;
		}
		
		$this->db->SelectDb(DBNAME);
		$true_viewers = $this->db->SimpleQuery("SELECT * FROM statistics $where");
		
		$ips = array();
		
		foreach ($true_viewers as $key => $value){
			if (!in_array($true_viewers[$key]['ip'], $ips)){
				array_push($ips,$true_viewers[$key]['ip']);
				$this->total = $this->total + 1;
			}
		}
		return $this->total;
	}
	
	/**
	 *  ## WARNING THIS IS IN DEVELOPMENT ##
	 * Counts the views by today, yesterday, 2days_ago, 3days_ago, 4days_ago and other
	 * 
	 * @var	: today (integer)
	 * @var	: yesterday (integer)
	 * @var	: day2ago (integer)
	 * @var	: day3ago (integer)
	 * @var	: day4ago (integer)
	 * @var	: other (integer)
	 */
	public function viewsCount(){
		$statistics = $this->db->SimpleQuery("SELECT * FROM statistics");
		$todaydate = date("Y-m-d");
		
		foreach ($statistics as $key => $value){
			if ($todaydate == date("Y-m-d", strtotime($statistics[$key]['last_seen'])) ){
				$this->today = 1 + $this->today;
			}
			elseif (date("Y-m-d",strtotime("-1 day",strtotime($todaydate))) == date("Y-m-d", strtotime($statistics[$key]['last_seen']))){
				$this->yesterday = 1 + $this->yesterday;
			}
			elseif (date("Y-m-d",strtotime("-2 day",strtotime($todaydate))) == date("Y-m-d", strtotime($statistics[$key]['last_seen']))){
				$this->day2ago = 1 + $this->day2ago;
			}
			elseif (date("Y-m-d",strtotime("-3 day",strtotime($todaydate))) == date("Y-m-d", strtotime($statistics[$key]['last_seen']))){
				$this->day3ago = 1 + $this->day3ago;
			}
			elseif (date("Y-m-d",strtotime("-4 day",strtotime($todaydate))) == date("Y-m-d", strtotime($statistics[$key]['last_seen']))){
				$this->day4ago = 1 + $this->day4ago;
			}
			else {
				$this->other = 1 + $this->other;
			}
		}	
	}
}