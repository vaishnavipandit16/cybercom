<?php
    $customer = $this->getTableRow();
    $group = $this->getGroupOptions();
?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','Customer'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Customer Group:</label>
                <select name="customer[customerGroup]" class="form-control">
                    <option value=0>select</option>
                    <?php if ($group) :  ?>
                    <?php foreach ($group as $groupId=>$name) : ?>
                    <option value="<?php echo $groupId; ?>" selected><?php echo $name;  ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="col">
                <label>First Name:</label>
                <input type="text" class="form-control" name="customer[firstName]" id="firstName"
                    value="<?php echo $customer->firstName; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Last Name:</label>
                <input type="text" class="form-control" name="customer[lastName]" id="lastName"
                    value="<?php echo $customer->lastName; ?>">
            </div>
            <div class="col">
                <label>Email:</label>
                <input type="email" class="form-control" name="customer[email]" id="email"
                    value="<?php echo $customer->email; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Mobile:</label>
                <input type="number" class="form-control" name="customer[mobile]" id="mobile"
                    value="<?php echo $customer->mobile; ?>">
            </div>
            <div class="col">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" id="password"
                    value="<?php echo $customer->password; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="customer[status]">
                    <?php foreach($customer->getStatusOptions() as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php if ($customer->status == $key) { ?> selected <?php } ?>>
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