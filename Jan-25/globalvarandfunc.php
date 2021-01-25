<?php

//Return the server address
$user_ip = $_SERVER['REMOTE_ADDR'];

echo $string = 'Your IP address is: '.$user_ip;

function echo_ip() {
    //declaration of global variable
    global $user_ip;
    $string = 'Your IP address is: '.$user_ip;
    echo $string;
}
echo_ip();

?>