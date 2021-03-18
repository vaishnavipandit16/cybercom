<div class="center mt-2">
    <div class="col-12">
        <?php if($success=$this->getMessage()->getSuccess()) { ?>
        <div class="alert alert-success" role="alert">
            <?=$success?>
        </div>
        <?php $this->getMessage()->clearSuccess(); } ?>

        <?php if($failure=$this->getMessage()->getFailure()) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $failure; ?>
        </div>
        <?php $this->getMessage()->clearFailure(); } ?>

    </div>
</div>