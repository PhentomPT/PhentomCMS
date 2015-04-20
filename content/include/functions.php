<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

//Real_escape_string Function 
function escape($value){ 
   return mysql_real_escape_string($value);
}

//HTML Special Chars Function
function special($value){
	return htmlspecialchars($value);
}

//Encrypt SHA1
function sha_password($user,$pass){
    $user = strtoupper($user);
    $pass = strtoupper($pass);
    return SHA1($user.':'.$pass);
}

//Login Function
function login($email,$password){
	echo "<div class='auth'>";
	if (!isset($email) && !isset($password)){}
	elseif (!empty($email) && !empty($password)){
		$s_email = escape($email);
		$loginquery = $mysqli -> query("SELECT * FROM accounts WHERE email='".$s_email."' AND password='".$password."'");
		$verify = mysqli_num_rows($loginquery);
		
		if ($verify > 0){
			while ($row=mysqli_fetch_array($loginquery)) {
				$user=$row['username'];
			}
			$_SESSION['username'] = $user;
			header("Location: index.php");
		}
		else{
			echo "<div class='fail'>Wrong Email/Password</div>";
		}
	}
	else {
		echo "<div class='fail'>Wrong Email/Password</div>";
	}
	echo "</div>";
}

//LogOut Function
function logout(){
	$_SESSION['username'] = "";
	session_destroy();
	header("Location: index.php");
}

//Time Function
function humanTiming($time){
	$time = (time() - $time) - 3599; // to get the time since that moment
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
?>