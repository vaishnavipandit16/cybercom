<?php

$time = time();
$time_now = date('d m Y @ H:i:s', $time);
$time_modified = date('d m Y @ H:i:s', strtotime('+1 week 2 hours 30 seconds'));

echo 'The curent date/time is :'.$time_now.'<br>';
echo 'The time modified is :'.$time_modified;

?>