<?php 
    $category = $this->getTableRow();
    $categories = $this->getCategoryOptions();
 ?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','Category'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Parent Category:</label>
                <select name="category[parentId]" class="form-control">
                    <option value=0>select</option>
                    <?php if ($categories):  ?>
                    <?php foreach ($categories as $categoryId=>$categoryName): ?>
                    <option value="<?php echo $categoryId; ?>" <?php if($category->parentId==$categoryId):?>selected
                        <?php endif; ?>><?php echo $categoryName;  ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="col">
                <label>Category Name</label>
                <input type="text" class="form-control" name="category[categoryName]" id="categoryName"
                    value="<?php echo $category->categoryName; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="category[status]">
                    <?php foreach($category->getStatusOptions() as $key => $value) { ?>
                    <option value="<?php echo $key ?>" <?php if ($category->status == $key) { ?> selected <?php } ?>>
                        <?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col">
                <label>Featured:</label>
                <select class="form-control" name="category[featured]">
                    <?php foreach($category->getFeaturedOptions() as $key => $value) { ?>
                    <option value="<?php echo $key ?>" <?php if ($category->featured == $key) { ?> selected <?php } ?>>
                        <?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label>Description:</label>
                <textarea class="form-control" rows="3" cols="30" id="desciption"
                    name="category[description]"><?php echo $category->description; ?></textarea>
            </div>
            <div class="col">
            </div>
        </div>
        <br><br>

        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>