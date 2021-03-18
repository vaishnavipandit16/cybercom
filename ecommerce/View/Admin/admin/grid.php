<?php
    $admins = $this->getAdmins();    
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Admin');?>').resetParams().load();">Add
                Admin</button>
        </div>
        <div class="table-div">
            <table class="table caption-top">
                <thead class="table-dark">
                    <tr>
                        <td>Admin Id</td>
                        <td>User Name</td>
                        <td>Password</td>
                        <td>Status</td>
                        <td>CreatedDate</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$admins) { ?>
                    <tr>
                        <td colspan="4">NO data Found</td>
                    </tr>
                    <?php
                    } else {
                        foreach ($admins->getData() as $key=>$admin): ?>
                    <tr>
                        <td><?php echo $admin->adminId; ?></td>
                        <td><?php echo $admin->userName; ?></td>
                        <td><?php echo $admin->password; ?></td>
                        <td><?php if ($admin->status == 1) {?>
                            <button class="btn btn-warning btn-sm">ENABLED</button>
                            <?php } else { ?>
                            <button class="btn btn-secondary btn-sm">DISABLED</button>
                            <?php } ?>
                        </td>
                        <td><?php echo $admin->createdDate; ?></td>
                        <td>
                            <button class="btn btn-primary" style="margin-top: 20px;"
                                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Admin',['updateId'=>$admin->adminId]);?>').resetParams().load();">Update</button>
                            <button class="btn btn-danger" style="margin-top: 20px;"
                                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Admin',['deleteId'=>$admin->adminId]);?>').resetParams().load();">Delete</button>
                        </td>
                    </tr>
                    <?php
                endforeach;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>