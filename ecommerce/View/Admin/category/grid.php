<?php
    $categories = $this->getCategories(); 
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Category');?>').resetParams().load();">Add
                Category</button>
        </div>

        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$categories) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($categories->getData() as $key => $category):
                        ?>
                <tr>
                    <td><?php echo $category->categoryId; ?></td>

                    <td><?php echo $this->getName($category);?></td>
                    <td><?php if ($category->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $category->featured;?></td>
                    <td><?php echo $category->description;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Category',['updateId'=>$category->categoryId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Category',['deleteId'=>$category->categoryId]);?>').resetParams().load();">Delete</button>
                    </td>
                </tr>
                <?php        
                endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>