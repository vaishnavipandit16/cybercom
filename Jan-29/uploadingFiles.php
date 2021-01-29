<?php

if (isset($_FILES['file'])){
    $name = $_FILES['file']['name'];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $max_size = 100;
    //$error = $_FILES['file']['error'];

    if (!empty($name)) {
        if (($extension === 'jpg' || $extension === 'jpeg') && ($type === 'image/jpeg' || $type === 'image/jpg') && $size <= $max_size) {
            $location = 'uploaded/';

            if (move_uploaded_file($tmp_name, $location.$name)) {
                echo 'Uploaded!';
            } else {
                echo 'There was an error.';
            }
        } else {
            echo 'File must be jpg/jpeg and must be 2mb or less.';
        }
    }else {
        echo 'Please choose a file';
    }
}

?>

<form action = 'uploadingFiles.php' method = 'POST' enctype = 'multipart/form-data'>
    <input type = 'file' name = 'file'><br><br>
    <input type = 'submit' value = 'Submit'>
</form>