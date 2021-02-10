<?php

include 'connection.php';

if ($conn) {
    if (isset($_POST['submit'])) {
        $prefix = $_POST['prefix'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $info = $_POST['info'];
        if (isset($_POST['agree'])) {
            $agree = "checked";
        } else {
            $agree = "";
        }

        $patForName = "/^[A-Za-z]*[A-Za-z]$/";

        //Pattern for password
        $patForPass = '/^[A-Za-z]\w{7,14}$/';

        //pattern for email
        $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

        function count_digit($mobile)
        {
            return strlen((string) $mobile);
        }

        //Store the length of phone number
        $phone_length = count_digit($mobile);

        // echo "prefix:" . $prefix . "<br>";
        // echo "fname:" . $fname . "<br>";
        // echo "lname:" . $lname . "<br>";
        // echo "Mopbile:" . $mobile . "<br>";
        // echo "email" . $email . "<br>";
        // echo preg_match($emailPattern, $email) . "<br>";
        // echo !empty($password), preg_match($patForPass, $password), $cpassword, $cpassword === $password, $info, preg_match($patForName, $fname), preg_match($patForName, $lname);

        if (!empty($prefix) && !empty($fname) && preg_match($patForName, $fname) &&
            !empty($lname) && preg_match($patForName, $lname) &&
            !empty($mobile) && $phone_length == 10 &&
            !empty($email) && preg_match($emailPattern, $email) &&
            !empty($password) && preg_match($patForPass, $password) &&
            !empty($cpassword) && $cpassword === $password &&
            !empty($info) && !empty($agree)) {

            echo 'jjojojoo';

            //If all the conditions are true then convert the password and confirm password to the hash
            $password = md5($password);
            $cpassword = md5($cpassword);

            //$craeted_at = new Date();

            //Query to insert the form data to the table registration
            $query = "INSERT INTO user (prefix, first_name, last_name, mobile, email, password_hash, information)
                                 VALUES('$prefix','$fname', '$lname', $mobile, '$email', '$password', '$info')";

            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                header("location:login.php");
            } else {
                header("location:registration.php");
            }
        }
    }
}