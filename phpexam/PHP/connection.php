<?php

$conn = mysqli_connect('localhost', 'root', '', 'exam');
// $db = mysqli_select_db($conn, 'exam');

if ($conn) {
    echo 'connected';
}