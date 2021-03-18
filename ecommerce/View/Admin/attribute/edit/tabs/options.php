<?php $option = $this->getOptions(); ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" action="<?php echo $this->getUrl()->getUrl('save','Attribute\Options'); ?>" method="POST">
        <input type="button" class="btn btn-warning" name="update" value="Update"
            onclick="object.resetParams().setForm('#form').load();">
        <input type="button" class="btn btn-success" name="addOption" value="Add Option" onclick="addRow()" ?>

        <table id="existingOption" class="table caption-top">
            <tbody>
                <?php if($option): 
                    foreach ($option->getData() as $key => $value): ?>
                <tr>
                    <td><input type="text" name="exist[<?php echo $value->optionId; ?>][name]"
                            value="<?php echo $value->name; ?>"></td>
                    <td><input type="number" name="exist[<?php echo $value->optionId; ?>][sortOrder]"
                            value="<?php echo $value->sortOrder; ?>"></td>
                    <td><input type="button" class="btn btn-danger" name="removeOption" value="Remove Option"
                            onclick="removeRow(this)"></td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </form>

    <div style="display:none">
        <table id="newOption" class="table caption-top">
            <tbody>
                <tr>
                    <td><input type="text" name="new[]"></td>
                    <td><input type="number" name="new[]"></td>
                    <td><input type="submit" class="btn btn-danger" name="removeOption" value="Remove Option"
                            onclick="removeRow(this);"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
function addRow() {
    var newOptionTable = document.getElementById('newOption');
    var existingOptionTable = document.getElementById('existingOption').children[0];
    existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
}

function removeRow(button) {
    var objTr = button.parentElement.parentElement;
    objTr.remove();
}
</script>