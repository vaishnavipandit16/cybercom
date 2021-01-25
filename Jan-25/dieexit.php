<?php

echo 'Hello ';
//die("ERROR MESSAGE");
//exit("Error Message using exit");
echo 'World';

@mysqli_connect('localhost','alex','') || die('Not connected.');
echo 'connected';

?>