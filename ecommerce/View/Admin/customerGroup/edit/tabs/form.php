<?php $customerGroup=$this->getTableRow(); ?>
<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','CustomerGroup'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Customer Group:</label>
                <input type="text" class="form-control" name="customergroup[name]" id="name"
                    value="<?php echo $customerGroup->name; ?>">
            </div>
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="customergroup[status]">
                    <?php foreach($customerGroup->getStatusOptions() as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php if ($customerGroup->status == $key) : ?> selected
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