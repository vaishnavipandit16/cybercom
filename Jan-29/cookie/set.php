<?php

$time = time();
setcookie('username', 'alex', $time + 10);
setcookie('username', 'alex', $time - 10);


?>