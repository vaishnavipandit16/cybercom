<?php

$match = 'pass123';

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if (!empty($password)) {
        if ($password === $match) {
             'That is correct';
        } else {
            echo 'That is incorrect';
        }
    } else {
        echo 'Please enter the password';
    }
}

?>

<form action = 'postVariable.php' method = 'POST'>
    Password:<input type = 'password' name = 'password'><br><br>
    <input type = 'submit' value = 'submit'>
</form>