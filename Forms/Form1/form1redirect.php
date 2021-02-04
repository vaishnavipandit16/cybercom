<?php

require 'connection.php';

$data = "";

//check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    $name = @$_POST['name'];
    $password = @$_POST['pass'];
    $address = @$_POST['address'];
    $game = @$_POST['game'];
    $age = @$_POST['age'];
    $file = @$_POST['file'];
    $gender = @$_POST['gender'];

    //Pattern for name
    $patForName = "/^[A-Za-z]*[A-Za-z]$/";

    //Pattern for password
    $patForPass = '/^[A-Za-z]\w{7,14}$/';

    //Check if all the fields are not emty and satisfied all the condition otherwise print the error message
    if (!empty($name) && preg_match($patForName, $name) &&
    !empty($password) && preg_match($patForPass, $password) &&
    !empty($address) && !empty($game) && !empty($gender) && !empty($age) && !empty($file)) {

        //If all the conditions are true then convert the password to the hash
        $password = md5($password);

        //Store all the selected games in $data
        foreach ($game as $select) {
            $data = $data.' '.$select;
        }

        //Query to insert the form data to the table userform
        $query = "INSERT INTO userform (name, password, address, game, gender, age, file) 
                VALUES('$name', '$password', '$address', '$data', '$gender', '$age', '$file')";
                
        //If data are inserted then go back to the form page otherwise stay on that page
  	    if (mysqli_query($db, $query)) {
              echo "<br><br>Inserted Successfully.";
              header("location:form1.php");
        } else {
              echo "<br><br>Not inserted.";
        }
    }  else {
        echo 'Enter proper data.';
    }
}

?>

<br>
<!-- If the data are not inserted and stay on this page then for go back to form page one button is there -->
<section>
    <form method="POST" action="form1.php">
        <input type="submit" name="backtoform" id="backtoform" value="Back To Form">
    </form>
</section>