<?php

$number = 10500;
$upper = 1000;
$lower = 500;

if ($number <= $lower ||  $number >= $upper) {
    echo 'Number must be between '.$lower.' and'.$upper.'.<br>';
}

$number2 = 10;
$canbe1 = 2;
$canbe2 = 4;

if (!($number2 === $canbe1) && !($number2 === $canbe2)) {
    echo 'Ok.';
} else {
    echo 'Not Ok.';
}

?>