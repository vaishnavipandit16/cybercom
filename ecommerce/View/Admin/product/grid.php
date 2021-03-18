<?php
    $products = $this->getProducts();   
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Product');?>').resetParams().load();">Add
                Product</button>

        </div>
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$products) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($products->getData() as $key => $product) :
                        ?>
                <tr>
                    <td><?php echo $product->productId; ?></td>
                    <td><?php echo $product->productName;?></td>
                    <td><?php echo $product->price;?></td>
                    <td><?php echo $product->discount;?></td>
                    <td><?php echo $product->sku;?></td>
                    <td><?php echo $product->quantity;?></td>
                    <td><?php echo $product->description;?></td>
                    <td><?php if ($product->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $product->createdDate;?></td>
                    <td><?php echo $product->updatedDate;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','Product',['updateId'=>$product->productId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Product',['deleteId'=>$product->productId]);?>').resetParams().load();">Delete</button>
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