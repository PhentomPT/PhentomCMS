 <?php
//Refuse direct access
if(!defined("PhentomCMS")){ exit; }

if (isset($_POST['remail']) and isset($_POST['rpassword'])){
    if ($_POST['rpassword'] == $_POST['vpassword']){
        $email = $_POST['remail'];
        $password = sha_password($email,$_POST['rpassword']);
        
        $mysqli -> select_db($acc_db);
        $check = $mysqli -> query("SELECT id FROM `battlenet_accounts` WHERE email='$email'") or die($mysqli -> error); 
        $count = $check -> num_rows;
        
        if ($count > 0){
            echo "<p class='fail'>Username already exists.</p>";
        }
        else{ 
            $mysqli -> query("INSERT INTO `battlenet_accounts` (email, sha_pass_hash) VALUES ('$email', '$password')") or die($mysqli -> error);
            header("Location: ?page=register_success");
        }
    }
    else{
        echo "<p class='fail'>Password missmatch.</p>";
    }
}

?>
