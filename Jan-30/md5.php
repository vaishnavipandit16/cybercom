<?php

if (isset($_POST['user_password'])) {
    if(!empty($_POST['user_password'])) {
        $user_password = md5($_POST['user_password']);
        
        $filename = 'md5txt.txt';
        $handle = fopen($filename, 'r');
        $file_password = fread($handle, filesize($filename));
        if ($user_password === $file_password) {
            echo 'Password ok!';
        } else {
            echo 'Incorrect Password.';
        }
    } else {
        echo 'Please enter a password.';
    }
}

?>

<form action="md5.php" method="POST">
    Password: <input type="text" name="user_password"><br><br>
    <input type="submit" value="Submit">
</form>