<?php

include 'connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    echo '<br>' . $password . '<br>';

    if ($conn) {
        $query = "select * from user where email = '" . $email . "' and password_hash = '" . $password . "'";
        $query_run = mysqli_query($conn, $query);
        $num = mysqli_num_rows($query_run);
        echo $num;
        if ($num == 1) {
            header('location:blog.php');
        } else {
            header('location:login.php');
        }

    }
}