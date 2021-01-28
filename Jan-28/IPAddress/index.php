<?php

require 'conf_inc.php';

foreach ($ip_blocked as $ip) {
    if ($ip === $ip_address) {
        echo 'You IP address '.$ip_address.' has been blocked';
    }
}

?>
