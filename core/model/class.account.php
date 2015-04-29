<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

class Account extends Database{
	
	//Returns the user id
	static function user_logged_id(){
		return $_SESSION['account_id'];
	}
	
	//Return the user username
	static function user_logged_name(){
		return $_SESSION['username'];
	}
	
	//returns the user email
	static function user_logged_mail(){
		return $_SESSION['account_email'];
	}
	
	//Checks user login
	public function login($username,$password){
		$username = $this->escapeString($username);
		$password = $this->escapeString($password);
		
		$core = $this->serverInfo();
		
		switch ($core[0]['core']){
			//Arcemu
			case "arcemu":
				$check_account = $this->SimpleQuery("SELECT acct as id, login as username, email FROM ". $core[0]['accounts'] .".accounts WHERE login='$username' AND encrypted_password='$password'");
				break;
			//Trinity v6 and Up
			/*case "trinity_v6":
				$check_account = $this->SimpleQuery("SELECT *, email as username FROM ". $core[0]['accounts'] .".battlenet_accounts WHERE email='$username' AND sha_pass_hash='$password'");
				break;*/
			//Trinity
			case "trinity":
			case "trinity_v6":
				$check_account = $this->SimpleQuery("SELECT id, username, email FROM ". $core[0]['accounts'] .".account WHERE username='$username' AND sha_pass_hash='$password'");
				break;
			//Mangos
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
	
	//Registers a user
	public function register($username,$password,$email){
		$username = $this->escapeString($username);
		$password = $this->escapeString($password);
		$email = $this->escapeString($email);
		
		$core = $this->serverInfo();
				
		switch ($core[0]['core']){
			//Arcemu
			case "arcemu":
				$check = $this->SimpleQuery("SELECT acct as id FROM ". $core[0]['accounts'] .".accounts WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".accounts (login,email,encrypted_password) VALUES ('$username','$email','$password')");
				$result = $this->SimpleQuery("SELECT acct as id, login as username FROM ". $core[0]['accounts'] .".accounts ORDER BY acct DESC LIMIT 1");
				break;
			//Trinity v6 and Up
			/*case "trinity_v6":
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".battlenet_accounts WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".battlenet_accounts (email,sha_pass_hash) VALUES ('$email','$password')");
				$result = $this->SimpleQuery("SELECT id,email as username FROM battlenet_accounts ORDER BY id DESC LIMIT 1");
				break;*/
			//Trinity
			case "trinity":
			case "trinity_v6":
				$check = $this->SimpleQuery("SELECT id FROM ". $core[0]['accounts'] .".account WHERE email='$email'");
				
				if (count($check) > 0){
					return "user_exists";
				}
				
				$this->SimpleUpdateQuery("INSERT INTO ". $core[0]['accounts'] .".account (username,email,sha_pass_hash) VALUES ('$username','$email','$password')");
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
				$result = $this->SimpleQuery("SELECT id,username FROM account ORDER BY id DESC LIMIT 1");
				break;
		}
			
		$this->SimpleUpdateQuery("INSERT INTO ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." (account_id,username) VALUES ('". $result[0]['id'] ."', '". $result[0]['username'] ."')");
		return "registered";
	}
	
	//Returns the user info
	public function userInfo($username){
		$username = $this->escapeString($username);
		
		if (empty($username)){
			$username = $_SESSION['username'];
			$email = "AND a.email='". $_SESSION['account_email']."'";
		}
		else{
			$email = "";
		}
		
		$core = $this->serverInfo();
		
		
		switch ($core[0]['core']){
			//Arcemu
			case "arcemu":
				$query = "SELECT a.login as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".accounts a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.login='". $username ."' $email";
				break;
			//Trinity v6 and Up
			/*case "trinity_v6":
				$query = "SELECT a.email as username, ai.join_date as join_date, COUNT(t.id) + COUNT(r.id) as total_posts, ai.vote_points as vp, ai.donation_points as dp, ai.avatar as avatar, ai.rank as rank, ai.special as special_rank
				FROM ". $core[0]['accounts'] .".battlenet_accounts a
					LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_TOPICS ." t ON ai.username = t.posted_by
					LEFT JOIN ". DBFORUM .".". FORUM_TBL_REPLYS ." r ON ai.username = r.posted_by
				WHERE a.username='". $username ."' $email";
				break;*/
			//Trinity
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