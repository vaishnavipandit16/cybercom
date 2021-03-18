<?php
    $cmsPages = $this->getCmsPages();   
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="add">
            <button class="btn btn-success" style="margin-top: 20px;"
                onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','CmsPage');?>').resetParams().load();">Add
                Cms Pages</button>
        </div>
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Page Id</th>
                    <th>Title</th>
                    <th>Identifier</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$cmsPages){ ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($cmsPages->getData() as $key => $cmsPage):
                        ?>
                <tr>
                    <td><?php echo $cmsPage->pageId; ?></td>
                    <td><?php echo $cmsPage->title;?></td>
                    <td><?php echo $cmsPage->identifier;?></td>
                    <td><?php echo $cmsPage->content;?></td>
                    <td><?php if ($cmsPage->status == 1) {?>
                        <button class="btn btn-warning btn-sm">ENABLED</button>
                        <?php } else { ?>
                        <button class="btn btn-secondary btn-sm">DISABLED</button>
                        <?php } ?>
                    </td>
                    <td><?php echo $cmsPage->createdDate;?></td>
                    <td>
                        <button class="btn btn-primary" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('edit','CmsPage',['updateId'=>$cmsPage->pageId]);?>').resetParams().load();">Update</button>
                        <button class="btn btn-danger" style="margin-top: 20px;"
                            onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','CmsPage',['deleteId'=>$cmsPage->pageId]);?>').resetParams().load();">Delete</button>
                    </td>
                </tr>
                <?php        
               endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>