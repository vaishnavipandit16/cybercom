<?php
    $customers = $this->getCustomers();  
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Customer');?>').resetParams().load();">Add
                Customer</button>

        </div>
        <div class="table-div">
            <table class="table caption-top">
                <thead class="table-dark">
                    <tr>
                        <td>Customer Id</td>
                        <td>Customer Group</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Mobile</td>
                        <td>Password</td>
                        <td>ZipCode</td>
                        <td>Status</td>
                        <td>CreatedDate</td>
                        <td>UpdatedDate</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$customers) { ?>
                    <tr>
                        <td colspan="4">NO data Found</td>
                    </tr>
                    <?php
                    } else {
                        foreach ($customers->getData() as $key=>$customer) : ?>
                    <tr>
                        <td><?php echo $customer->customerId; ?></td>
                        <td><?php echo $customer->customerGroup; ?></td>
                        <td><?php echo $customer->firstName; ?></td>
                        <td><?php echo $customer->lastName; ?></td>
                        <td><?php echo $customer->email; ?></td>
                        <td><?php echo $customer->mobile; ?></td>
                        <td><?php echo $customer->password; ?></td>
                        <td><?php echo $customer->zipCode; ?></td>
                        <td><?php if ($customer->status == 1) {?>
                            <button class="btn btn-warning btn-sm">ENABLED</button>
                            <?php } else { ?>
                            <button class="btn btn-secondary btn-sm">DISABLED</button>
                            <?php } ?>
                        </td>
                        <td><?php echo $customer->createdDate; ?></td>
                        <td><?php echo $customer->updatedDate; ?></td>
                        <td>
                            <button class="btn btn-primary" style="margin-top: 20px;"
                                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Customer',['updateId'=>$customer->customerId]);?>').resetParams().load();">Update</button>
                            <button class="btn btn-danger" style="margin-top: 20px;"
                                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Customer',['deleteId'=>$customer->customerId]);?>').resetParams().load();">Delete</button>
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