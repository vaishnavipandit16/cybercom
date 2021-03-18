<?php $cmsPage=$this->getTableRow(); ?>
<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <form id="form" method="post" action="<?php echo $this->getUrl()->getUrl('save','CmsPage'); ?>">
        <div class="form-row">
            <div class="col">
                <label>Title:</label>
                <input type="text" class="form-control" name="cms_page[title]" id="title"
                    value="<?php echo $cmsPage->title; ?>">
            </div>
            <div class="col">
                <label>Identifier:</label>
                <input type="varchar" class="form-control" name="cms_page[identifier]" id="idebtifier"
                    value="<?php echo $cmsPage->identifier; ?>">
            </div>
        </div>
        <br><br>

        <div class="form-row">
            <div class="col">
                <label class="form-control-label">Content :</label>
                <input type="hidden" id="myContent" name="cms_page[content]">
                <input type="hidden" id="setContent" value="<?php echo htmlentities($cmsPage->content); ?>">

                <div class="adjoined-bottom">
                    <div class="grid-container">
                        <div class="grid-width-100">
                            <div id="editor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <label>Status:</label>
                <select class="form-control" name="cms_page[status]">
                    <?php foreach($cmsPage->getStatusOptions() as $key => $value): ?>
                    <option value="<?php echo $key ?>" <?php if ($cmsPage->status == $key): ?> selected <?php endif; ?>>
                        <?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>

        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-left: 400px;"
            onclick="getContent();object.resetParams().setForm('#form').load();">Save</button>
    </form>
</div>
<script>
initSample();

function getContent() {
    var data = CKEDITOR.instances['editor'].getData();
    document.getElementById("myContent").value = data;
}
var setdata = document.getElementById("setContent").value;
CKEDITOR.instances['editor'].setData(setdata);
</script>