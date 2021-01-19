<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Page</title>
</head>
<body>
    <?php
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $day_list = $_POST["day_list"];
        $month_list = $_POST["month_list"];
        $year_list = $_POST["year_list"];
        $gender = $_POST["gender"];
        $email = $_POST["mail"];
        $pass = $_POST["pass"];
        $squestion = $_POST["squestion"];
        $sanswer = $_POST["sanswer"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip_code = $_POST["zip-code"];
        $phone = $_POST["phone"];
        $option = $_POST["option"];
        ?>
    <h1>Here is the information you have submitted:</h1>
    

    <table border="1">
        <tr>
            <th>First Name:</th>
            <td><?php echo $fname; ?></td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td><?php echo $lname; ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?php echo $day_list; ?>-<?php echo $month_list; ?>-<?php echo $year_list;?></td>
        </tr>
        <tr>
            <th>Gender:</th>
            <td><?php echo $gender;?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $email;?></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><?php echo $pass;?></td>
        </tr>
        <tr>
            <th>security Question:</th>
            <td><?php echo $squestion; ?></td>
        </tr>
        <tr>
            <th>Security Answer:</th>
            <td><?php echo $sanswer;?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo $address; ?>,<?php echo $city; ?>,<?php echo $state;?>,<?php echo $zip_code;?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?php echo $phone;?></td>
        </tr><tr>
            <th>Option:</th>
            <td><?php echo $option;?></td>
        </tr>
    </table>
    
</body>
</html>