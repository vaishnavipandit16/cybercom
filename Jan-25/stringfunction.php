<?php

//Counting of a word in a string
$string = 'This is an example string & this is a tutorial .';
$string_word_count = str_word_count($string, 1, '&.');
print_r($string_word_count).'<br>';

//Shuffling of a characters in a string
$string_shuffled = str_shuffle($string);
echo $string_shuffled.'<br>';

//display some length of string
$half = substr($string_shuffled, 0, strlen($string) / 2);
echo $half.'<br>';

//Reverse a string
$string_reversed = strrev($string);
echo $string_reversed.'<br>';

$stringimg = 'image.jpeg';
$string_rev = strrev($stringimg);
echo $string_rev.'<br>';

//Check the similarty between two strings
$string_one = 'This is my essay. I\'m going to be talking about php.';
$string_two = 'This is my essay. I will be talking about the subject php.';

similar_text($string_one, $string_two, $result);
echo 'The similarity between is, '.$result.'<br>';

//Check the length of the string
$string_length = strlen($string);
echo $string_length.'<br>';

//Trim the string
$stringeg = ' This is an example string. ';
echo strlen($stringeg).'<br>';
$string_trimmed = trim($stringeg);
echo $string_trimmed.'<br>';
echo strlen($string_trimmed).'<br>';

//left trim the string
$string_ltrimmed = ltrim($stringeg);
echo $string_ltrimmed.'<br>';
echo strlen($string_ltrimmed).'<br>';

//Right trim the string
$string_rtrimmed = rtrim($stringeg);
echo $string_rtrimmed.'<br>';
echo strlen($string_rtrimmed).'<br>';

//Add slash and remove the slash from the string
$stringslash = 'This is a <img src="iamge.jpg"> string.';
$string_slashes = htmlentities(addslashes($stringslash));
echo stripslashes($string_slashes).'<br>';

?>