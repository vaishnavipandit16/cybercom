<?php

// $filename_or = 'iamge.jpg';
// $filename = rand(1000, 9999).md5($filename_or).rand(1000, 9999);
// echo $filename;

$filename = 'file.txt';

if (file_exists($filename)) {
    echo 'File already exist';
} else {
    $handle = fopen($filename, 'w');
    fwrite($handle, 'Nothing');
    fclose($handle);
}


?>