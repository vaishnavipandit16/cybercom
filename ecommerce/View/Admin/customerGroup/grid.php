<?php
    $customerGroups = $this->getCustomerGroups();   
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','CustomerGroup');?>').resetParams().load();">Add
                Customer Group</button>

        </div>
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Group Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$customerGroups) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($customerGroups->getData() as $key => $customerGroup) :
                        ?>
                <tr>
                    <td><?php echo $customerGroup->groupId; ?></td>
                    <td><?php echo $customerGroup->name;?></td>
                    <td><?php if ($customerGroup->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $customerGroup->createdDate;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','CustomerGroup',['updateId'=>$customerGroup->groupId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','CustomerGroup',['deleteId'=>$customerGroup->groupId]);?>').resetParams().load();">Delete</button>
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