<?php $admin = $this->getTableRow(); ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p>
    <br>
    <form method="post" id="form" action="<?php echo $this->getUrl()->getUrl('save','Admin'); ?>">
        <div class="form-row">
            <div class="col">
                <label>User Name:</label>
                <input type="text" class="form-control" name="admin[userName]" id="userName"
                    value="<?php echo $admin->userName; ?>">
            </div>
            <div class="col">
                <label>Password:</label>
                <input type="password" class="form-control" name="admin[password]" id="password"
                    value="<?php echo $admin->password; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="admin[status]">
                    <?php foreach($admin->getStatusOptions() as $key => $value): ?>
                    <option value="<?php echo $key ?>" <?php if ($admin->status == $key): ?> selected <?php endif; ?>>
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