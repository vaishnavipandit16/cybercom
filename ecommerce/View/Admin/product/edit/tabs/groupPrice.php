<?php $data = $this->getCustomerGroup(); ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="POST" action="<?php echo $this->getUrl()->getUrl('save','Product\GroupPrice'); ?>">
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <td>groupId</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Group Price</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->getData() as $key=>$value) : ?>
                <tr>
                    <?php  $rawstatus =($value->groupPrice)?'exist':'new'; ?>
                    <td><?php echo $value->groupId ?></td>
                    <td><?php echo $value->name ?></td>
                    <td><?php echo $value->price ?></td>
                    <td><input type="text" name="data[<?php echo $rawstatus;?>][<?php echo $value->groupId;?>]"
                            value="<?php echo $value->groupPrice;?>"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>