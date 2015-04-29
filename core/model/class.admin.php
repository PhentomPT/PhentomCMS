<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

class Admin extends Database{
	
	public $cms_version = "2.0 Beta";
	
	public function getNews(){
		$query = "SELECT * FROM ". WEB_TBL_NEWS .";";
		
		$result = $this->SimpleQuery($query);
		
		return $result;
	}
	
	public function postNews($title,$user,$content,$media){
		$title = $this->escapeString($title);
		$user = $this->escapeString($user);
		$content = $this->escapeString($content);
		$media = $this->escapeString($media);
		
		$query = "INSERT INTO ". WEB_TBL_NEWS ." (title, user, content, media) VALUES ('". $title ."','". $user ."','". $content ."','". $media ."');";
		
		$this->SimpleUpdateQuery($query);
	}
	
	public function deleteNews($news_id){
		if (is_array($news_id)){
			$where = "WHERE id IN (". explode(",", $news_id) .")";
		}
		else{
			$where = "WHERE id=". $news_id ."";
		}
		
		$query = "DELETE FROM ". WEB_TBL_NEWS ." ". $where .";";
		
		$this->SimpleUpdateQuery($query);
	}
	
	public function editNews($fields){
		$max = count($fields);
		$x = 0;
		
		foreach ($fields as $key => $value){
			$x = $x + 1;
			if ($max = $x){ $end=""; } else { $end=","; }
			$where_fields .= $key ."=". $value . $end;
		}
		
		$query = "UPDATE ". WEB_TBL_NEWS ." SET ". $where_fields ." WHERE id=". $news_id .";";
		
		$this->SimpleUpdateQuery($query);
	}
	
	public function getUploads(){
		$files = array_diff(scandir(UPLOAD_PATH),array("index.html",".",".."));
		
		return $files;
	}
	
	public function getAccounts($where,$page=""){
		//$page = $this->escape_string($page);
	
		if (!empty($where)){
			$where = "WHERE ". $where;
		}
	
	
		if (!empty($page)){
			if ($page == 0 || $page == 1){
				$limit = "LIMIT 0,30";
			}
			else{
				$limit = "LIMIT ". ($page * 30) .",30";
			}
		}
		else{
			$limit = "LIMIT 0,30";
		}
		
		$server_info = $this->serverInfo();
		
		//Arcemu
		if ($server_info[0]['core'] == "arcemu"){
			$query = "SELECT a.acct as id, a.login as username , a.email as email, ai.joindate as joindate, ai.vote_points as vote_points, ai.donation_points as donation_points, ai.avatar as avatar, ai.rank as rank, ai.special as special 
			FROM ". $server_info[0]['accounts'] .".accounts a
				LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
			". $where ." ORDER BY a.id ";
		}
		else{
			$query = "SELECT a.id as id, a.username as username, a.email as email, a.joindate as joindate, ai.vote_points as vote_points, ai.donation_points as donation_points, ai.avatar as avatar, ai.rank as rank, ai.special as special
			FROM ". $server_info[0]['accounts'] .".account a
				LEFT JOIN ". DBNAME .".". WEB_TBL_ACCOUNT_INFO ." ai ON ai.account_id = a.id
			". $where ." ORDER BY a.id ";
		}
		
		$total = $this->SimpleQuery($query);
		
		$_SESSION['total'] = count($total);
	
		$query .= $limit;
	
		$result = $this->SimpleQuery($query);
		return $result;
	}
	
	public function addAccount(){
		
	}
	
	public function deleteAccount(){
	
	}
	
	public function editAccount(){
	
	}
	
	public function banAccount(){
	
	}
	
	public function changeTheme(){
	
	}
	
	public function changeLanguage(){
	
	}
	
	public function enablePlugin(){
	
	}
	
	public function disablePlugin(){
	
	}
	
	public function addToShop(){
	
	}
	
	public function removeFromShop(){
	
	}
	
	public function editShopItem(){
	
	}
	
	public function uploadFile(){
	
	}
	
	public function deleteFile(){
	
	}
	
	public function addPage(){
	
	}
	
	public function deletePage(){
	
	}
	
	//Checks for CMS updates
	public function getCmsUpdate(){
		$file = file_get_contents("http://www.phentom.net/wow_cms_version.txt");
		if ($file == $this->cms_version){
			$file = "";
		}
		return $file;
	}
}