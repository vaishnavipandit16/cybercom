<?php

$browser = get_browser(null, true);
print_r($browser);

$browser = strtolower($browser['browser']);

if ($browser != 'chrome') {
    echo "<br>".'You\'re not using Google Chrome. Please do!';
}

?>