<?php 
    $attribute = $this->getAttributes();
    $attributeData = $this->getAttribute();
    //$options = $this->getOptions();
    // echo '<pre>';
    // print_r($attribute);
    // echo 'Hello';
     //print_r($options);
 ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','Category\Attribute'); ?>">
        <?php if ($attribute):
            foreach ($attribute->getData() as $key => $value) :
                $options = $value->getOptions();
                if ($value->entityTypeId == 'category'):?>


        <div class="form-row">
            <div class="col">
                <label><?php echo $value->name; ?>:</label>
                <!--TEXTBOX -->
                <?php if ($value->inputType == 'textbox') : ?>
                <input class="form-control" type="<?php echo $value->inputType; ?>" name="<?php echo $value->code; ?>"
                    value="<?php echo $attributeData->{$value->name}; ?>">
                <?php endif; ?>

                <!--TEXTAREA -->
                <?php if ($value->inputType == 'textarea') : ?>

                <textarea class=" form-control"
                    name="<?php echo $value->code; ?>"><?php echo $attributeData->{$value->name}; ?></textarea>

                <?php endif; ?>

                <!--SELECT -->
                <?php if ($value->inputType == 'select') : ?>
                <<?php echo $value->inputType; ?> class="form-control" name="<?php echo $value->name; ?>">
                    <?php foreach ($options->getData() as $key => $option) : ?>
                    <option value="<?php echo $option->name; ?>"
                        <?php if ($attributeData->{$value->name} == $option->name) : ?> selected <?php endif; ?>>
                        <?php echo $option->name; ?></option>
                    <?php endforeach; ?>
                </<?php echo $value->inputType; ?>>
                <?php endif; ?>

                <!--SELECT Multiple-->
                <?php if ($value->inputType == 'select multiple') : ?>
                <<?php echo $value->inputType; ?> class="form-control" name="<?php echo $value->name; ?>[]">
                    <?php foreach ($options->getData() as $key => $option) : ?>
                    <option value="<?php echo $option->name; ?>"
                        <?php $attributeData1 = explode(',', $attributeData->{$value->name}); ?>
                        <?php foreach ($attributeData1 as $key => $row) : ?> <?php if ($row == $option->name) : ?>
                        selected <?php endif; ?> <?php endforeach; ?>><?php echo $option->name; ?></option>
                    <?php endforeach; ?>
                </<?php echo $value->inputType; ?>>
                <?php endif; ?>

                <!--CHECKBOX-->
                <?php if ($value->inputType == 'checkbox') : ?>
                <?php foreach ($options->getData() as $key => $name) : ?>
                <label><?php echo $name->name; ?></label>
                <input type="<?php echo $value->inputType; ?>" name="<?php echo $value->name; ?>[]"
                    value="<?php echo $name->name; ?>"
                    <?php $attributeData1 = explode(',', $attributeData->{$value->name}); ?>
                    <?php foreach ($attributeData1 as $key => $row) : ?> <?php if ($row == $name->name) : ?> checked>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <?php endif; ?>

                <!--RADIO-->

                <?php if ($value->inputType == 'radio') : ?>
                <?php foreach ($options->getData() as $key => $name) : ?>
                <label><?php echo $name->name; ?></label>
                <input type="<?php echo $value->inputType; ?>" name="<?php echo $value->code; ?>"
                    value="<?php echo $options->name; ?>" <?php if ($attributeData->{$value->name} == $name->name) : ?>
                    checked <?php endif; ?>>
                <label></label>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>

        <button type=" button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>