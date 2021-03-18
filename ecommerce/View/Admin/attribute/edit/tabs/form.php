<?php $attribute = $this->getTableRow(); ?>
<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form method="POST" id="form" action="<?php echo $this->getUrl()->getUrl('save','Attribute'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Entity Type Id:</label>
                <input type="text" class="form-control" name="attribute[entityTypeId]" id="entityTypeId"
                    value="<?php echo $attribute->entityTypeId; ?>">
            </div>
            <div class="col">
                <label>Name:</label>
                <input type="text" class="form-control" name="attribute[name]" id="name"
                    value="<?php echo $attribute->name; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Code:</label>
                <input type="text" class="form-control" name="attribute[code]" id="code"
                    value="<?php echo $attribute->code; ?>">
            </div>
            <div class="col">
                <label>Input Type:</label>
                <select name="attribute[inputType]" class="form-control">
                    <option value="">Select</option>
                    <?php foreach ($attribute->getInputTypeOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if ($attribute->inputType == $key): ?> selected
                        <?php endif; ?>>
                        <?php echo $value;?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>BackendType:</label>
                <select name="attribute[backendType]" class="form-control">
                    <option value="">Select</option>
                    <?php foreach ($attribute->getBackendTypeOptions() as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if ($attribute->backendType == $key): ?> selected
                        <?php endif; ?>>
                        <?php echo $value;?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label>SortOrder:</label>
                <input type="number" class="form-control" name="attribute[sortOrder]" id="sortOrder"
                    value="<?php echo $attribute->sortOrder; ?>">
            </div>
        </div>
        <br><br>

        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>