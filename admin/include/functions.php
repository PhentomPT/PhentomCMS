<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

//Real_escape_string Function 
function escape($value){ 
   return $mysql -> real_escape_string($value);
}

//logout Function
function logout(){
	$_SESSION['adminuser'] = "";
	session_destroy();
	echo "Done!";
	header("Location: index.php");
}

//Encrypt SHA1
function sha_password($user,$pass){
    $user = strtoupper($user);
    $pass = strtoupper($pass);
    return SHA1($user.':'.$pass);
}

//Format Bytes Function
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

     $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 
?>