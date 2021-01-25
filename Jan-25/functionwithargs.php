<?php

$inumber1 = 10;
$inumber2 = 5;

function add($number1, $number2) {
    echo $number1 + $number2;
}

add($inumber1, $inumber2);

function displayDate($day, $date, $year) {
    echo $day.' '.$date.' '.$year;
}

displayDate('Monday', 25, 2021);

?>