<?php

$string =  'This is a string.';

//Check if there is a 'is' exist in the string
if (preg_match('/is/', $string)){
    echo 'Match found';
} else {
    echo 'Not found';
}

?>