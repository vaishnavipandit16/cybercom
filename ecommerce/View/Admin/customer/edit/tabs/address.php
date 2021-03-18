<?php 

$billingAddress = $this->getBillingAddress();
$shippingAddress = $this->getShippingAddress();

?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>

    <form method="post" action="<?php echo $this->getUrl()->getUrl('save','Customer\Address'); ?>">
        <p class="h4">Billing Address</p><br>
        <input type="hidden" name="shippingId" <?php if($shippingAddress):?>
            value="<?php echo $shippingAddress->addressId; endif;?>">
        <input type="hidden" name="billingId" <?php if($billingAddress):?>
            value="<?php echo $billingAddress->addressId;endif;?>">

        <div class="form-row">
            <div class="col">
                <label>Address:</label>
                <input type="text" class="form-control" name="billing[address]" id="address"
                    <?php if ($billingAddress): ?> value="<?php echo $billingAddress->address; ?>" <?php endif; ?>>
            </div>
            <div class="col">
                <label>City:</label>
                <input type="text" class="form-control" name="billing[city]" id="city"
                    <?php if ($billingAddress) :?>value="<?php echo $billingAddress->city; ?>" <?php endif; ?>>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>State:</label>
                <input type="text" class="form-control" name="billing[state]" id="lastName"
                    <?php if ($billingAddress) :?> value="<?php echo $billingAddress->state; ?>" <?php endif; ?>>
            </div>
            <div class="col">
                <label>Zip Code:</label>
                <input type="number" class="form-control" name="billing[zipCode]" id="zipCode"
                    <?php if ($billingAddress) :?> value="<?php echo $billingAddress->zipCode; ?>" <?php endif; ?>>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Country:</label>
                <input type="text" class="form-control" name="billing[country]" id="country"
                    <?php if ($billingAddress):?> value="<?php echo $billingAddress->country; ?>" <?php endif; ?>>
            </div>
            <div class="col">
            </div>
        </div>
        <br><br>

        <p class="h4">Shipping Address</p><br>
        <div class="form-row">
            <div class="col">
                <label>Address:</label>
                <input type="text" class="form-control" name="shipping[address]" id="shippingAddress"
                    <?php if ($shippingAddress): ?> value="<?php echo $shippingAddress->address; ?>" <?php endif; ?>>
            </div>
            <div class="col">
                <label>City:</label>
                <input type="text" class="form-control" name="shipping[city]" id="shippingCity"
                    <?php if ($shippingAddress) :?> value="<?php echo $shippingAddress->city; ?>" <?php endif; ?>>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>State:</label>
                <input type="text" class="form-control" name="shipping[state]" id="shippingState"
                    <?php if ($shippingAddress) :?> value="<?php echo $shippingAddress->state; ?>" <?php endif; ?>>
            </div>
            <div class="col">
                <label>Zip Code:</label>
                <input type="number" class="form-control" name="shipping[zipCode]" id="shippingZipCode"
                    <?php if ($shippingAddress) :?> value="<?php echo $shippingAddress->zipCode; ?>" <?php endif; ?>>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Country:</label>
                <input type="text" class="form-control" name="shipping[country]" id="shippingCountry"
                    <?php if ($shippingAddress) :?> value="<?php echo $shippingAddress->country; ?>" <?php endif; ?>>
            </div>
            <div class="col">
            </div>
        </div>
        <br><br>

        <input class="btn btn-success" type="submit" id="update" name="update" value="Update">
    </form>
</div>