<?php
//Refuses Direct Access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used to store common functions
 *
 * @name	: class.common.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Common{
	
	/**
	 * Checks if the CMS is installed and redirects if its not
	 * 
	 */
	public function __construct(){
		if (dirname($_SERVER['REQUEST_URI']) ."/install/" !== $_SERVER['REQUEST_URI'] && is_dir("../install")){
			$this->redirect("../");
		}
	}
	
	/**
	 * Encrypts a string to SHA1 format using a salt
	 * 
	 * @param	: $salt (string)
	 * @param	: $password (string)
	 * @return	: $encrypted (string)
	 */
	public function encryptSha1($salt,$password){
		$salt = strtoupper($salt);
		$password = strtoupper($password);
		$encrypted = SHA1($salt.':'.$password);
		return $encrypted;
	}

	/**
	 * Redirects to a given URL or to a callback link
	 * defined as a parameter in the url
	 * 
	 * @param	: $link (string) 
	 */
	public function redirect($link=""){
		if (empty($link) || $link==""){
			$link = "index.php";
		}
		
		if (isset($_GET['callback_link'])){
			$link = $_GET['callback_link'];
		}
		
		return header("Location: $link");
	}

	/**
	 * Generates a random string with any given size <br/>
	 * If the size is not determined it will generate
	 * a 30 character string
	 * 
	 * @param	: $size (integer)
	 * @return	: $string (string)
	 */
	public function randomString($size="30"){
		$length = $size;
		$string = "";
		$characters = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPkKrRsStTuUvVwWxXzZ0123456789";
			while ($length > 0) {
				$string .= $characters[mt_rand(0,strlen($characters)-1)];
				$length -= 1;
			}
	   return $string;
	}

	/**
	 * Generates a captcha code and can have a background image
	 * 
	 * @param	: $image (string)
	 * @return	: ImagePNG (image)
	 */
	public function captchaCode($image=""){
		//header("Content-Type: image/png"); 
  		$ttf = "franconi.ttf";
		$_SESSION["captcha_id"] = "";
		$zufallszahl = mt_rand(30000,60000);
		$_SESSION["captcha_id"] = $zufallszahl;
		$bild = imagecreatefromgif($image);
		$weisser = imagecolorallocate($bild, 255, 255, 255);
		imagettftext($bild, 11, 10, 5, 20, $weisser, $ttf, $_SESSION["captcha_id"]);
		return ImagePNG($bild);  
	}
	
	/**
	 * Calculates the time since a starting time and an ending time (generaly used for MySQL given times) <br/>
	 * If the ending time is not given, it is set to 
	 * the present time
	 * 
	 * @param	: $time_start (integer)
	 * @param	: $time_end (integer)
	 * @return	: time & identified (string)
	 * @todo	: Replace units with lang_tokens
	 */
	public function humanTiming ($time_start,$time_end=""){
		if (empty($time_end)){
			$time_end = time();
		}
		
		$time_start = strtotime($time_start);
		
		$time = ($time_end - $time_start)  + 3600;
		$tokens = array (
			31536000 => 'year',
		    2592000 => 'month',
		    604800 => 'week',
		    86400 => 'day',
		    3600 => 'hour',
		    60 => 'minute',
		    1 => 'second',
		);
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}
	
	/**
	 * Converts a given size and adds the unit
	 * 
	 * @param	: $size (integer)
	 * @return	: $size & unit (string)
	 */
	public function convertSize($size){
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
	
	/**
	 * Starts counting the loading time
	 * 
	 * @return	: $this->start (integer)
	 */
	public function microTimeStart(){
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$this->start = $time;
	}
	
	/**
	 * Stops counting the loading time and returns the result
	 * 
	 * @return	: $total_time (integer)
	 */
	public function microTimeStop(){
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $this->start), 4);
		return $total_time;
	}
	
	/**
	 * Gets the expansion number from a detemine expansion 
	 * (0..5) and core (arcemu,trinity,mangos,trinity_v6)
	 * 
	 * @param	: $expansion (integer)
	 * @param	: $core (string)
	 * @return	: $expansion (integer)
	 */
	public function selectExpansion($expansion,$core){
		if ($core == "arcemu"){
			switch ($expansion) {
				case "0":
					$expansion = 0;
					break;
				case "1":
					$expansion = 8;
					break;
				case "2":
					$expansion = 24;
					break;
				case "3":
					$expansion = 32;
					break;
				default:
					$expansion = 8;
					break;
			}	
		}
		
		return $expansion;
	}
	
	/**
	 * Gets the user session_id
	 * 
	 * @return	: $session_id (integer) 
	 */
	public function getSessionID(){
		$session_id = session_id();
		return $session_id;
	}
	
	/**
	 * ## WARNING THIS IS IN DEVELOPMENT ## <br/>
	 * Gets a image/video from a url (youtube link included)
	 *
	 * @param	: $link (string)
	 * @return	: $link (string)
	 */
	public function getLink($link){
		$youtube = "/(((youtu\\.be\\/)|(www\\.\\/\\/youtube\\.com\\/watch\\?v=)|(youtube\\.com\\/watch\\?v=))(\\w{11}))/";
		
		preg_match($youtube, $link, $match, 6);
		
		if (!empty($match)){
			$link = "https://www.youtube.com/embed/". $match;
		}
		else{
			$extract_first = "/(((http:\\/\\/)|(https:\\/\\/)|(www.))(.*))/";
			$extract_last = "/((\\s).*)/";
			
			if(preg_match($extract_first, $link, $match)){
				$link = preg_replace($extract_last, "", $match[1]);
			}
			else{
				$link = $link;
			}
		}
		
		return $link;
	}
	
	/**
	 * ## WARNING THIS IS IN DEVELOPMENT ## <br/>
	 * This function will transform some string with BBCode 
	 * to HTML tags
	 * 
	 * @param	: $str (string)
	 * @return	: $str (string)
	 */
	public function bbcodeHtml($str) {
	  // delete 'http://' because will be added when convert the code
	  $str = str_replace('[url=http://', '[url=', $str);
	  $str = str_replace('[url]http://', '[url]', $str);
	
	  // Array with RegExp to recognize the code that must be converted
	  $bbcode_smiles = array(
	    // RegExp for [b]...[/b], [i]...[/i], [u]...[/u], [block]...[/block], [color=code]...[/color], [br]
	    '/\[b\](.*?)\[\/b\]/is',
	    '/\[i\](.*?)\[\/i\]/is',
	    '/\[u\](.*?)\[\/u\]/is',
	    '/\[cite\](.*?)\[\/cite\]/is',
	    '/\[block\](.*?)\[\/block\]/is',
	    '/\[code\](.*?)\[\/code\]/is',
	    '/\[color=(.*?)\](.*?)\[\/color\]/is',
	    '/\[br\]/is',
	
	    // RegExp for [url=link_address]..link_name..[/url], or [url]..link_address..[/url]
	    '/\[url\=(.*?)\](.*?)\[\/url\]/is',
	    '/\[url\](.*?)\[\/url\]/is',
	
	    // RegExp for [img=image_address]..image_title[/img], or [img]..image_address..[/img]
	    '/\[img\=(.*?)\](.*?)\[\/img\]/is',
	    '/\[img\](.*?)\[\/img\]/is',
	
	    // RegExp for sets of characters for smiles: :), :(, :P, :P, ...
	    '/:\)/i', '/:\(/i', '/:P/i', '/:S/i', '/:O/i', '/=D\>/i', '/\>:D\</i', '/:D/i', '/:-\*/i'
	  );
	
	  // Array with HTML that will replace the bbcode tags, defined in the same order
	  $html_tags = array(
	    // <b>...</b>, <i>...</i>, <u>...</u>, <blockquote>...</blockquote>, <span>...</span>, <br/>
	    '<b>$1</b>',
	    '<i>$1</i>',
	    '<u>$1</u>',
	    '<cite><a class="user">$1</a> wrote:<br/></cite>',
	    '<blockquote><div class="quote"><div>$1</blockquote>',
	    '<blockquote><div class="code"><div><xmp>$1</xmp></blockquote>',
	    '<span style="color:$1;">$2</span>',
	    '<br/>',
	
	    // a href...>...</a>, and <img />
	    '<a target="_blank" href="http://$1">$2</a>',
	    '<a target="_blank" href="http://$1">$1</a>',
	    '<img src="$1" alt="$2" />',
	    '<img src="$1" alt="$1" />',
	
	    // The HTML to replace smiles. Here you must add the address of the images with smiles
	    '<img src="image/bbcode/0.gif" alt=":)" border="0" />',
	    '<img src="image/bbcode/1.gif" alt=":(" border="0" />',
	    '<img src="image/bbcode/2.gif" alt=":P" border="0" />',
	    '<img src="image/bbcode/3.gif" alt=":D" border="0" />',
	    '<img src="image/bbcode/4.gif" alt=":S" border="0" />',
	    '<img src="image/bbcode/5.gif" alt=":O" border="0" />',
	    '<img src="image/bbcode/6.gif" alt="=D&gt;" border="0" />',
	    '<img src="image/bbcode/7.gif" alt="&gt;: D&lt;" border="0" />',
	    '<img src="image/bbcode/8.gif" alt=": D" border="0" />',
	    '<img src="image/bbcode/9.gif" alt=":-*" border="0" />'
	  );
	
	  // replace the bbcode
	  $str = preg_replace($bbcode_smiles, $html_tags, $str);
	
	  return $str;
	}
}
