<div id="leftHtml">
    <?php

$children = $this->getChildren();
foreach ($children as $child) {
    echo $child->toHtml();
}
?>
</div>

<script type="text/javascript">
var object = new Base();
$(document).ready(function() {
    object.setUrl("<?php echo $this->getUrl()->getUrl('edit',null)?>");
    object.load();
});
</script>