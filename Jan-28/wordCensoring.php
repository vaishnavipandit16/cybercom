<?php

$find = array('alex', 'billy', 'dale');
$replace = array('a**x', 'b***y', 'd**e');

$user_input = '';
if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
    $user_input = $_POST['user_input'];
    $user_input_new = str_ireplace($find, $replace, $user_input);
    echo $user_input_new;
}

?>

<hr>

<form action = 'wordCensoring.php' method = 'POST'>
    <textarea id = 'user_input' name = 'user_input' rows = '6' cols = '30'><?php echo $user_input; ?></textarea><br><br>
    <input type = 'submit' value = 'submit'>
</form>


