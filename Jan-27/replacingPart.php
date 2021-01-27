<?php

$string = 'This part don\'t search. This part serach.';
$string_new = substr_replace($string, 'alex', 29, 4);

echo $string_new.'<br>';

$find = array('is', 'string', 'example');
$replace = array('IS', 'STRING', '');
$string_one = 'This is a string, and is an example.';

$new_string = str_replace('is', '', $string_one);
$new_string = str_replace('string', '', $new_string);

$new_string1 = str_replace($find, '', $string_one); 
$new_string2 = str_replace($find, $replace, $string_one); 

echo $new_string.'<br>';
echo $new_string1.'<br>';
echo $new_string2.'<br>';

?>