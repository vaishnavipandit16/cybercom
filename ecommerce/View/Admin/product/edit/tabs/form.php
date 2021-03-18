<?php $product = $this->getTableRow(); 
//echo '<pre>';
//print_r($product);?>
<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','Product'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Product Name:</label>
                <input type="text" class="form-control" name="product[productName]" id="productName"
                    value="<?php echo $product->productName; ?>">
            </div>
            <div class="col">
                <label>Price:</label>
                <input type="number" class="form-control" name="product[price]" id="price"
                    value="<?php echo $product->price; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Discount:</label>
                <input type="number" class="form-control" name="product[discount]" id="discount"
                    value="<?php echo $product->discount; ?>">
            </div>
            <div class="col">
                <label>Quantity:</label>
                <input type="number" class="form-control" name="product[quantity]" id="quantity"
                    value="<?php echo $product->quantity; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Description:</label>
                <textarea rows="3" class="form-control" cols="30" id="desciption"
                    name="product[description]"><?php echo $product->description; ?></textarea>
            </div>
            <div class="col">
                <label>SKU:</label>
                <input type="text" class="form-control" name="product[sku]" id="sku"
                    value="<?php echo $product->sku; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="product[status]">
                    <?php foreach($product->getStatusOptions() as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php if ($product->status == $key) : ?> selected
                        <?php endif; ?>>
                        <?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
            </div>
        </div>
        <br><br>

        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>