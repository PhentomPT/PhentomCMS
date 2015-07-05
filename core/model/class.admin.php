<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for administration related functions <br/>
 * Extends the class.database.php in order to <br/>
 * operate with information stored in the <br/>
 * database
 *
 * @name	: class.admin.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Admin extends Database{
	
	/**
	 * CMS Version
	 *
	 * @var string
	 */
	public $cms_version = "2.0 Beta";
	
	/**
	 * Gets all the news
	 *
	 * @return : $result (array)
	 */
	public function getNews(){
		$query = "SELECT * FROM ". WEB_TBL_NEWS .";";
		
		$result = $this->SimpleQuery($query);
		
		return $result;
	}
	
	/**
	 * Posts a news with a given title, user, content and media
	 *
	 * @param	: $title (string)
	 * @param	: $user (string)
	 * @param	: $content (string)
	 * @param	: $media (string)
	 */
	public function postNews($title,$user,$content,$media){
		$title = $this->escapeString($title);
		$user = $this->escapeString($user);
		$content = $this->escapeString($content);
		$media = $this->escapeString($media);
		
		$query = "INSERT INTO ". WEB_TBL_NEWS ." (title, user, content, media) VALUES ('". $title ."','". $user ."','". $content ."','". $media ."');";
		
		$this->SimpleUpdateQuery($query);
	}
	
	/**
	 * Deletes a specific or multiple news from the given id / ids
	 *
	 * @param	: $news_id (integer / array)
	 */
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
	
	/**
	 * Edits a news from a given id
	 *
	 * @param	: $fields (array)
	 */
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
	
	/**
	 * Gets all the files inside the upload folder
	 *
	 * @return : $files (array)
	 */
	public function getUploads(){
		$files = array_diff(scandir(UPLOAD_PATH),array("index.html",".",".."));
		
		return $files;
	}
	
	/**
	 * Gets all the accounts with a where condition and a page <br/>
	 * Generally used to list accounts in multiple pages
	 *
	 * @param	: $where (string)
	 * @param	: $page (string)
	 * @return	: $result (array)
	 */
	public function getAccounts($where,$page=""){
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
	
	/**
	 * Checks for CMS updates
	 * 
	 * @return	: $version (string)
	 */
	public function getCmsUpdate(){
		$version = file_get_contents("http://www.phentom.net/wow_cms_version.txt");
		
		if ($version == $this->cms_version){
			$version = "";
		}
		
		return $version;
	}
}