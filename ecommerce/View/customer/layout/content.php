<?php 
// $children = $this->getChildren();
// foreach ($children as $child) {
//     echo $child->toHtml();
// }
?>

<div id="contentGrid">
    <script type="text/javascript">
    var object = new Base();
    $(document).ready(function() {
        object.setUrl("<?php echo $this->getUrl()->getUrl('gridHtml',null);?>");
        object.load();
    });
    </script>
</div>