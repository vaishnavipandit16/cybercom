<?php

require 'connection.php';

//check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    $fname = @$_POST['fname'];
    $lname = @$_POST['lname'];
    $day = @$_POST['day_list'];
    $month = @$_POST['month_list'];
    $year = @$_POST['year_list'];
    $gender = @$_POST['gender'];
    $country = @$_POST['country'];
    $email = @$_POST['mail'];
    $phone = @$_POST['phone'];
    $password = @$_POST['pass'];
    $cpassword = @$_POST['cpass'];
    $agree = @$_POST['agree'];

    $date = $day.'-'.$month.'-'.$year;

    //Pattern for first name and last name
    $patForName = "/^[A-Za-z]*[A-Za-z]$/";

    //Pattern for password
    $patForPass = '/^[A-Za-z]\w{7,14}$/';

    //pattern for email
    $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

    //function for counting the digit of phone number
    function count_digit($phone) {
        return strlen((string) $phone);
    }

    //Store the length of phone number
    $phone_length = count_digit($phone);

    //Check if all the fields are not emty and satisfied all the condition otherwise print the error message
    if (!empty($fname) && preg_match($patForName, $fname) &&
    !empty($lname) && preg_match($patForName, $lname) &&
    !empty($email) && preg_match($emailPattern, $email) &&
    !empty($password) && preg_match($patForPass, $password) &&
    !empty($cpassword) && $cpassword === $password &&
    !empty($phone) && $phone_length == 10 && !empty($gender) && !empty($country) 
    && !empty($day) && !empty($month) && !empty($year) && !empty($agree)) {

         //If all the conditions are true then convert the password and confirm password to the hash
        $password = md5($password);
        $cpassword = md5($cpassword);
        
        //Query to insert the form data to the table registration
        $query = "INSERT INTO registration (firstName, lastName, dateofbirth, gender, contry, email, phone, password, confirmPassword) 
                VALUES('$fname', '$lname', '$date', '$gender', '$country', '$email', $phone, '$password', '$cpassword')";
                
        //If data are inserted then go back to the form page otherwise stay on that page
  	    if (mysqli_query($db, $query)) {
              echo "<br><br>Inserted Successfully.";
              header("location:form3.php");
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
    <form method="POST" action="form3.php">
        <input type="submit" name="backtoform" id="backtoform" value="Back To Form">
    </form>
</section>