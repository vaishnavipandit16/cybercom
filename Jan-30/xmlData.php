<?php

$xml = simplexml_load_file('xmlFile.xml');

foreach ($xml->producer as $producer) {
    echo $producer->name.' is '.$producer->age.'<br>';
}

?>