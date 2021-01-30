<?php

$to = 'vaishnavipandit168@gmail.com';
$subject = 'Thi is an email.';
$body = 'This is a test email\n\n Hope you got it.';
$headers = 'From:khushipandit000@gmail.com';

if (mail($to, $subject, $body, $headers)) {
    echo 'Email has been sent to '.$to;
} else {
    echo 'There was an error sending the email';
}

?>