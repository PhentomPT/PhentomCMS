<?php
$target_path = "../image/uploads/";

for($i=0; $i<count($_FILES['files']['name']); $i++){
    $ext = explode('.', basename($_FILES['files']['name'][$i]));
    $target_path = $target_path . $_FILES['files']['name'][$i]; 

    
    move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_path);
}
?>