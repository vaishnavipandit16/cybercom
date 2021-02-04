<?php

require 'connection.php';

?>

<head>
    <link rel="stylesheet" href="form1style.css">
</head>

<body>
    <form action="form1redirect.php" method="POST">
        <table border='1'>
            <thead>
                <tr>
                    <td colspan="2">User Form</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="name" class="left-margin">Enter Name</label></td>
                    <td><input type="text" id="name" name="name" class="name-password left-margin"></td>
                </tr>
                <tr>
                    <td><label for="pass" class="left-margin">Enter Password</label></td>
                    <td><input type="password" name="pass" id="pass" class="name-password left-margin"></td>
                </tr>
                <tr>
                    <td><label for="address" class="left-margin">Enter Address</label></td>
                    <td><textarea name="address" rows="2" cols="50" id="address" class="left-margin"></textarea></td>
                </tr>
                <tr>
                    <td><label class="left-margin">Select Game</label></td>
                    <td>
                        <input type="checkbox" id="hockey" name="game[]" value="Hockey">Hockey<br>
                        <input type="checkbox" id="football" name="game[]" value="Football">Football<br>
                        <input type="checkbox" id="badminton" name="game[]" value="Badminton">Badminton<br>
                        <input type="checkbox" id="cricket" name="game[]" value="Cricket">Cricket<br>
                        <input type="checkbox" id="vollyball" name="game[]" value="Vollyball">Vollyball
                    </td>
                </tr>
                <tr>
                    <td><label for="gender" class="left-margin">Gender</label></td>
                    <td><input type="radio" name="gender" id="male" value="male">Male&nbsp;
                        <input type="radio" name="gender" id="female" value="female">Female
                    </td>
                </tr>
                <tr>
                    <td><label for="age" class="left-margin">Select your age</label></td>
                    <td><select name="age" id="age" class="left-margin">
                            <option value="0">Select</option>
                            <option value="less18">
                                less than 18 </option>
                            <option value="18to50">greater than equal to 18 & less tha equal to 50</option>
                            <option value="greater50">greater than 50</option>
                        </select>
                    </td>
                </tr>
                <tr class="align-center">
                    <td colspan="2">
                        <input type="file" name="file" id="file">
                    </td>
                </tr>
            </tbody>
            <tfoot class="align-center">
                <tr>
                    <td colspan="2">
                        <input type="reset" class="btn-size" value="Reset">
                        <input type="submit" class="btn-size" value="Submit Form" name="submit" onclick="validation();">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
    <script src="form1.js"></script>
</body>

<br><br><br>

<?php

require 'connection.php';

//select query for retriving data
$select_query = "SELECT * FROM userform";
$result = mysqli_query($db, $select_query);

?>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Password</th>
        <th>Address</th>
        <th>Game</th>
        <th>Gender</th>
        <th>Age</th>
        <th>File</th>
    </tr>
    <?php
        //fetching the data from the table
        while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['name'].'<br>';?></td>
        <td><?php echo $row['password'].'<br>';?></td>
        <td><?php echo $row['address'].'<br>';?></td>
        <td><?php echo $row['game'].'<br>';?></td>
        <td><?php echo $row['gender'].'<br>';?></td>
        <td><?php echo $row['age'].'<br>';?></td>
        <td><?php echo $row['file'].'<br>';?></td>
    </tr>
    <?php } ?>
</table>