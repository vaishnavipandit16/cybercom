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
        <table>
            <tr>
                <td class="align-right">
                    <form>
                        <input type="button" value="Manage Category" id="mb_post" name="mb_post"
                            onclick="manage_post();">
                        <input type="button" value="Logout" id="logout" name="logout" onclick="logout();">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Blog Post</td>
            </tr>
            <tr>
                <td><input type="button" value="Add Blog Post" id="blog_post" name="blog_post" onclick="blog_post();">
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>Title</td>
                            <td>Content</td>
                            <td>URL</td>
                        </tr>
                        <?php
                        if ($conn) {
                            $query = "select title,content,url from category";
                            $query_run = mysqli_connect($conn, $query);

                            while($row = mysqli_fetch_assoc($query_run)) { ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['content']; ?></td>
                                <td><?php echo $row['url']; ?></td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>
</table>