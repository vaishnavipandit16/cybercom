<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/JS/jquery-3.5.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/JS/mage.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/ckeditor.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/sample.js');?>"></script>
    <script src="./JS/script.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark navi">
    <a class="navbar-brand" href="#">QuestCom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left:700px;" id="navbarNav">
        <ul class="navbar-nav nav-body">
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Product'); ?>').resetParams().load();"
                    href="javascript:void(0);">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Category'); ?>').resetParams().load();"
                    href="javascript:void(0);">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Customer'); ?>').resetParams().load();"
                    href="javascript:void(0);">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Shipment'); ?>').resetParams().load();"
                    href="javascript:void(0);">Shipment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Payment'); ?>').resetParams().load();"
                    href="javascript:void(0);">Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','Admin'); ?>').resetParams().load();"
                    href="javascript:void(0);">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','CustomerGroup'); ?>').resetParams().load();"
                    href="javascript:void(0);">Customer Group</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','attribute'); ?>').resetParams().load();"
                    href="javascript:void(0);">Attribute</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml','CmsPage'); ?>').resetParams().load();"
                    href="javascript:void(0);">CMS Pages</a>
            </li>
        </ul>
    </div>
</nav>
<script type="text/javascript">
var object = new Base();
</script>