<?php

include 'connection.php';

?>
<html>

<head>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/blog.js"></script>
</head>

<body>
    <div class="main-section">
        <form method="POST" action="categoryRedirect.php">
            <table>
                <tr>
                    <td colspan="2" class="align-center">Add New Category</td>
                </tr>
                <tr>
                    <td class="align-right">Title</td>
                    <td><input class="full-width" type="text" id="title" name="title">
                        <label class="e-color" id="e-title" name="e-title"></label>
                    </td>
                </tr>
                <tr>
                    <td class="align-right">Content</td>
                    <td><textarea id="content" name="content" cols="50" rows="3"></textarea>
                        <label class="e-color" id="e-content" name="e-content"></label>
                    </td>
                </tr>
                <tr>
                    <td class="align-right">URL</td>
                    <td><input class="full-width" type="text" name="url" id="url">
                        <label class="e-color" name="e-url" id="e-url"></label>
                    </td>
                </tr>
                <tr>
                    <td class="align-right">Meta Title</td>
                    <td><input class="full-width" type="text" name="mtitle" id="mtitle">
                        <label class="e-color" name="e-mtitle" id="e-mtitle"></label>
                    </td>
                </tr>
                <tr>
                    <td class="align-right">Parent Category</td>
                    <td><select id="pcat" name="pcat">
                            <option value=""></option>
                            <?php

if ($conn) {
    $query = "select * from category";
    $query_run = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        echo $row['parent_category_id'];
        ?>
                            <option value="<?php echo $row['parent_category_id'] ?>">
                                <?php echo $row['parent_category_id'] ?>
                            </option>
                            <?php
}
}

?>
                        </select>
                        <label class="e-color" name="e-pcat" id="e-pcat"></label>
                    </td>
                </tr>
                <tr>
                    <td class="align-right">Image</td>
                    <td><input class="full-width" type="file" name="image" id="image">
                        <label class="e-color" name="e-image" id="e-image"></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="align-center"><input type="submit" name="submit" id="submit" value="Submit"
                            onclick="validate();"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>