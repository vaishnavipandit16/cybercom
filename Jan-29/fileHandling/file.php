<?php

if (isset($_POST['fname'])) {
    $name = $_POST['fname'];
    if (!empty($name)) {
        $handle = fopen('names.txt', 'a');
        fwrite($handle, $name."\n");
        fclose($handle);

        echo 'Current name in file: ';
        $count = 1;
        $readin = file('names.txt');
        $readin_count = count($readin);

        foreach ($readin as $name) {
            echo trim($name);
            if ($count < $readin_count) {
                echo ', ';
            }
            $count++;
        }
    } else {
        echo 'Please type a name';
    }


}
// $handle = fopen('names.txt', 'w');

// fwrite($handle, 'Alex'."\n");
// fwrite($handle,'Billy');

// fclose($handle);

// echo 'written.';

?>

<form method = "POST" action = 'file.php'>
    Name:<input type = 'text' name = 'fname'><br><br>
    <input type = 'submit' value = 'Submit'>
</form>