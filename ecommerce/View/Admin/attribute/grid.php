<?php $attributes = $this->getAttributes(); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <button class="btn btn-success" style="margin-top: 20px;"
            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Attribute');?>').resetParams().load();">Add
            Attribute</button><br><br>

        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Attribute Id</th>
                    <th>Entity Type Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>Backend Type</th>
                    <th>sortOrder</th>
                    <th>Backend Model</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$attributes) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($attributes->getData() as $key => $attributes):
                     ?>
                <tr>
                    <td><?php echo $attributes->attributeId; ?></td>
                    <td><?php echo $attributes->entityTypeId; ?></td>
                    <td><?php echo $attributes->name; ?></td>
                    <td><?php echo $attributes->code; ?></td>
                    <td><?php echo $attributes->inputType; ?></td>
                    <td><?php echo $attributes->backendType; ?></td>
                    <td><?php echo $attributes->sortOrder; ?></td>
                    <td><?php echo $attributes->backendModel; ?></td>

                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Attribute',['updateId'=>$attributes->attributeId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Attribute',['deleteId'=>$attributes->attributeId]);?>').resetParams().load();">Delete</button>
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