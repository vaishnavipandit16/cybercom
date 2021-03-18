<?php
    $shipments = $this->getShipments();
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Shipment');?>').resetParams().load();">Add
                Shipment</button>
        </div>

        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Method Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$shipments) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($shipments->getData() as $key => $shipment):
                        ?>
                <tr>
                    <td><?php echo $shipment->methodId; ?></td>
                    <td><?php echo $shipment->name;?></td>
                    <td><?php echo $shipment->code;?></td>
                    <td><?php echo $shipment->amount;?></td>
                    <td><?php echo $shipment->description;?></td>
                    <td><?php if ($shipment->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $shipment->createdDate;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Shipment',['updateId'=>$shipment->methodId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Shipment',['deleteId'=>$shipment->methodId]);?>').resetParams().load();">Delete</button>
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