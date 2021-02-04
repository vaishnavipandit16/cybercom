<head>
    <link rel="stylesheet" href="form3style.css">
    <script src="form3.js"></script>
</head>

<body onload="addOption_list()">
    <div class="over">
        <div class="yellow-color size margins">
            &nbsp;&nbsp;<div class="margin-left-head">Sign Up</div>
        </div>
        <div class="blue-color">
            <form name="register_form" action="form3redirect.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td class="align-right"><label for="fname" class="left-margin label-color">First
                                    Name</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="text" id="fname" name="fname"
                                    class="name-password left-margin">
                            </td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="lname" class="left-margin label-color">Last Name</label>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="text" id="lname" name="lname"
                                    class="name-password left-margin">
                            </td>
                        </tr>
                        <tr>
                            <td class="align-right"><label class="top-margin label-color">D.O.B</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<select name="day_list" id="day_list"
                                    class="finput-margin top-margin">
                                    <option value="">Day</option>
                                </select>&nbsp;

                                <select name="month_list" id="month_list" class="finput-margin top-margin">
                                    <option value="">Month</option>
                                </select>&nbsp;

                                <select name="year_list" id="year_list" class="finput-margin top-margin">
                                    <option value="">Year</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="gender" class="top-margin label-color">Gender</label>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="male" value="male"
                                    class="top-margin"><label class="label-color">Male</label>&nbsp; <input type="radio"
                                    name="gender" id="female" value="female" class="top-margin"><label
                                    class="label-color">Female</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="country" class="label-color">Country</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<select id="country" name="country">
                                    <option value="0">Country</option>
                                    <option value="india">India</option>
                                    <option value="canada">Canada</option>
                                    <option value="usa">USA</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="mail" class="top-margin label-color">Email</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="email" name="mail" id="mail" class="top-margin"></td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="phone" class="top-margin label-color">Phone</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="number" name="phone" id="phone" class="top-margin"></td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="pass" class="top-margin label-color">Password</label>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="password" name="pass" id="pass" class="top-margin"></td>
                        </tr>
                        <tr>
                            <td class="align-right"><label for="cpass" class="top-margin label-color">Confirm
                                    Password</label></td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="password" name="cpass" id="cpass" class="top-margin">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="agree" id="agree" value="YES"><label
                                    class="label-color">I agree to
                                    the
                                    terms of use</label>
                            </td>
                        </tr>
                    </tbody>
        </div>
        <tfoot class="yellow-color size align-right">
            <tr>
                <td colspan="2"><input type="submit" class="btn-size submit-color" value="Submit" name="submit"
                        onclick="validation();" />
                    <input type="reset" class="btn-size cancel-color" value="Cancel" />
                </td>
            </tr>
        </tfoot>
        </table>
        </form>
    </div>
</body>

<?php

require 'connection.php';

//select query for retriving data
$user_check_query = "SELECT * FROM registration";
$result = mysqli_query($db, $user_check_query);

?>

<table border="1">
    <tr>
        <th>First_Name</th>
        <th>Last_Name</th>
        <th>Date_Of_Birth</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Confirm_Password</th>
    </tr>
    <?php
        //fetching the data from the table
        while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['firstName'].'<br>';?></td>
        <td><?php echo $row['lastName'].'<br>';?></td>
        <td><?php echo $row['dateofbirth'].'<br>';?></td>
        <td><?php echo $row['gender'].'<br>';?></td>
        <td><?php echo $row['contry'].'<br>';?></td>
        <td><?php echo $row['email'].'<br>';?></td>
        <td><?php echo $row['phone'].'<br>';?></td>
        <td><?php echo $row['password'].'<br>';?></td>
        <td><?php echo $row['confirmPassword'].'<br>';?></td>
    </tr>
    <?php } ?>
</table>