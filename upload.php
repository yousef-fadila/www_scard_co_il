<?php
$dest_dir =  './uploads/';

$result = 0;
 
$file_name = $dest_dir . rand() . basename( $_FILES['myfile']['name']);
 
if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $file_name)) {
$result = 1;
}

$type = array_shift(explode('/' , $_FILES['myfile']['type']));

if($result == 1 && $type == 'image'){
    echo '<p class="res">' . $file_name . '</p>';
}else{
    echo '<p class="res">error</p>';
}

sleep(1);
?>
