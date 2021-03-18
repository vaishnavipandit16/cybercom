<?php
    $payments = $this->getPayments();   
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Payment');?>').resetParams().load();">Add
                Payment</button>
        </div>
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Method Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$payments) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($payments->getData() as $key => $payment):
                        ?>
                <tr>
                    <td><?php echo $payment->methodId; ?></td>
                    <td><?php echo $payment->name;?></td>
                    <td><?php echo $payment->code;?></td>
                    <td><?php echo $payment->description;?></td>
                    <td><?php if ($payment->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $payment->createdDate;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Payment',['updateId'=>$payment->methodId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Payment',['deleteId'=>$payment->methodId]);?>').resetParams().load();">Delete</button>
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