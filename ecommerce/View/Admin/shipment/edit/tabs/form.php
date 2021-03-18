<?php $shipment = $this->getTableRow(); ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','Shipment'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Name:</label>
                <input type="text" class="form-control" name="shipment[name]" id="name"
                    value="<?php echo $shipment->name; ?>">
            </div>
            <div class="col">
                <label>Amount:</label>
                <input type="number" class="form-control" name="shipment[amount]" id="amount"
                    value="<?php echo $shipment->amount; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Description:</label>
                <textarea class="form-control" rows="3" cols="30" id="desciption"
                    name="shipment[description]"><?php echo $shipment->description; ?></textarea>
            </div>
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="shipment[status]">
                    <?php foreach($shipment->getStatusOptions() as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php if ($shipment->status == $key) : ?> selected
                        <?php endif; ?>>
                        <?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>