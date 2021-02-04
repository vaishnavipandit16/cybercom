<?php

//Connect to the server and database
//Here localhost is server name
//root is the username
//'' is the password
//form is the database name
$db = mysqli_connect('localhost', 'root', '', 'form');

//if successfully connected then print the message otherwise show the error message.
if ($db) {
    echo 'Connected';
} else {
    echo 'Not connected';
}

?>