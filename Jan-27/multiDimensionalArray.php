<?php

$food = array('Healthy' => 
                array('Salad', 'Vegetables', 'Pasta'),
              'Unhealthy' => 
                array('Pizza', 'Ice cream'));

echo $food['Healthy'][0];
echo '<br>'.$food['Unhealthy'][1].'<br>';
print_r($food);

?>