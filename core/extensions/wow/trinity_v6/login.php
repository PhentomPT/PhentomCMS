 <?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

$username = $_POST['username'];
$password = sha_password($username,$_POST['password']);

$mysqli -> select_db($acc_db);

$check_account = $mysqli -> query("SELECT * FROM `battlenet_accounts` WHERE email='$email' and sha_pass_hash='$password'") or die( $mysqli -> error );
$count = $check_account -> num_rows;
 
if ($count > 0){
    $_SESSION['username'] = $username;
    header("Location: index.php");
}
else{
    echo "<div class='fail'>Wrong User/Password</div>";
}
?> 
