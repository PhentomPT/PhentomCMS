<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for account related functions <br/>
 * Extends the class.database.php in order to
 * operate with account information stored in the
 * database
 *
 * @name	: class.account.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Account extends Database{
	
	/**
	 * Returns the logged user account id
	 * 
	 * @return	: $_SESSION['account_id'] (int)
	 */
	static function user_logged_id(){
		return $_SESSION['account_id'];
	}
	
	/**
	 * Returns the logged user username
	 * 
	 * @return	: $_SESSION['username'] (string)
	 */
	static function user_logged_name(){
		return $_SESSION['username'];
	}
	
	/**
	 * Returns the logged user email
	 * 
	 * @return	: $_SESSION['account_email'] (string)
	 */
	static function user_logged_mail(){
		return $_SESSION['account_email'];
	}
	
	/**
	 * Checks user login from a given username and password
	 * and saves session values if information is right
	 * 
	 * @param	: $username (string)
	 * @param	: $password (string)
	 * @return	: lang_token names 'logged' OR 'user_wrong_pass' (string)
	 */
	public function login($username,$password){
		$username = $this->escapeString($username);
		$password = $this->escapeString($password);
		
		$core = $this->serverInfo();
		
		switch ($core[0]['core']){
			case "arcemu":
				$check_account = $this->SimpleQuery("SELECT acct as id, login as username, email FROM ". $core[0]['accounts'] .".accounts WHERE login='$username' AND encrypted_password='$password'");
				break;
			case "trinity":
			case "trinity_v6":
				$check_account = $this->SimpleQuery("SELECT id, username, email FROM ". $core[0]['accounts'] .".account WHERE username='$username' AND sha_pass_hash='$password'");
				break;
			case "mangos":
				$check_account = $this->SimpleQuery("SELECT id, username, email FROM ". $core[0]['accounts'] .".account WHERE username='$username' AND sha_pass_hash='$password'");
				break;
			default:
				$check_account = $this->SimpleQuery("SELECT id, username, email FROM ". $core[0]['accounts'] .".account WHERE username='$username' AND sha_pass_hash='$password'");
				break;
		}
		
		if (count($check_account) > 0){
			$_SESSION['username'] = $check_account[0]['username'];
			$_SESSION['account_id'] = $check_account[0]['id'];
			$_SESSION['account_email'] = $check_account[0]['email'];
			return "logged";
		}
		else{
			return "user_wrong_pass";
		}
	}
	
	/**
	 * Registers a user from a given username, password and email
	 * 
	 * @param	: $username (string)
	 * @param	: $password (string)
	 * @param	: $email (string)
	 * @return	: lang_token name 'registered' (string)
	 */
	public function register($username,$password,$email){
		$username = $this->escapeString($username);
		$password = $this->escapeString($password);
		$email = $this->escapeString($email);
		
		$core = $this->serverInfo();
				
		switch ($core[0]['core']){
			case "arcemu":
				$check = $this->SimpleQuery("SELECT acct as id FROM ". $core[0]['accounts'] .".accounts WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".accounts (login,email,encrypted_password) VALUES ('$username','$email','$password')");
				$result = $this->SimpleQuery("SELECT acct as id, login as username FROM ". $core[0]['accounts'] .".accounts ORDER BY acct DESC LIMIT 1");
				break;
			case "trinity":
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".account WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".account (username,email,sha_pass_hash) VALUES ('$username','$email','$password')");
				$result = $this->SimpleQuery("SELECT id,username FROM ". $core[0]['accounts'] .".account ORDER BY id DESC LIMIT 1");
				break;
			case "trinity_v6":
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".account WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".account (username,email,sha_pass_hash) VALUES ('$username','$email','$password')");
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".battlenet_accounts (email,sha_pass_hash) VALUES ('$email','$password')");
				$result = $this->SimpleQuery("SELECT id,username FROM ". $core[0]['accounts'] .".account ORDER BY id DESC LIMIT 1");
				break;
			case "mangos":
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".account WHERE email='$email'");
			
				if (count($check) > 0){
					return "user_exists";
				}
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".account (username,email,sha_pass_hash) VALUES ('$username','$email','$password')");
				$result = $this->SimpleQuery("SELECT id,username FROM ". $core[0]['accounts'] .".account ORDER BY id DESC LIMIT 1");
				break;
			default:
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".account WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".account (username,email,sha_pass_hash) VALUES ('$username','$email','$password')");
				$result = $this->SimpleQuery("SELECT id,username FROM ". $core[0]['accounts'] .".account ORDER BY id DESC LIMIT 1");
				break;
		}
			
		$this->SimpleUpdateQuery("INSERT INTO ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." (account_id,username) VALUES ('". $result[0]['id'] ."', '". $result[0]['username'] ."')");
		return "registered";
	}
	
	/**
	 * Returns the user information from a given username
	 * 
	 * @param	: $username (string)
	 * @return	: $account_info (array)
	 */
	public function userInfo($username=""){
		if (empty($username)){
			$username = $_SESSION['username'];
			$email = "AND a.email='". $_SESSION['account_email']."'";
		}
		else{
			$username = $this->escapeString($username);
			$email = "";
		}
		
		$core = $this->serverInfo();
		
		switch ($core[0]['core']){
			case "arcemu":
				$query = "SELECT a.login as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".accounts a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.login='". $username ."' $email";
				break;
			case "trinity":
			case "trinity_v6":
				$query = "SELECT a.username as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".account a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.username='". $username ."' $email";
				break;
			case "mangos":
				$query = "SELECT a.username as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".account a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.username='". $username ."' $email";
				break;
			default:
				$query = "SELECT a.username as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".account a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.username='". $username ."' $email";
				break;
		}
		
		$account_info = $this->SimpleQuery($query);
		
		return $account_info;
	}
}
