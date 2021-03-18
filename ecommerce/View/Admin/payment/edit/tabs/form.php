<?php $payment = $this->getTableRow(); ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form method="post" id="form" action="<?php echo $this->getUrl()->getUrl('save','Payment'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Name:</label>
                <input type="text" class="form-control" name="payment[name]" id="name"
                    value="<?php echo $payment->name; ?>">
            </div>
            <div class="col">
                <label>Description:</label>
                <textarea class="form-control" rows="3" cols="30" id="desciption"
                    name="payment[description]"><?php echo $payment->description; ?></textarea>
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="payment[status]">
                    <?php foreach($payment->getStatusOptions() as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php if ($payment->status == $key) : ?> selected
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