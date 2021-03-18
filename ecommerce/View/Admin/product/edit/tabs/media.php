<?php 
    $image = $this->getImage();
?>

<div class="main">
    <p class="h2"><?php echo $this->getTitle(); ?></p><br>
    <button id="delete" class="btn btn-danger" type="button"
        onclick="object.resetParams().setForm('#form').load();">Delete</button>
    <form id="form" method="POST" action="<?php echo $this->getUrl()->getUrl('update','Product\ProductMedia'); ?>">

        <button class="btn btn-primary" type="button"
            onclick="object.resetParams().setForm('#form').load();">Update</button>
        <br><br>
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <td>Image</td>
                    <td>Label</td>
                    <td>Thumb</td>
                    <td>Small</td>
                    <td>Base</td>
                    <td>Gallery</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <?php  if($image):?>
                <?php foreach($image->getData() as $key=>$value): ?>

                <tr>
                    <td><img style="height:100px; width:100px;" src="Image/Product/<?php echo $value->image;?>"></td>
                    <td><input type="text" name="img[data][<?php echo $value->imageId; ?>][label]"
                            value="<?php echo $value->label; ?>"></td>
                    <td><input type="radio" name="img[thumb]" value="<?php  echo  $value->imageId; ?>"
                            <?php if($value->thumb==1):echo "checked"; endif;?>></td>
                    <td><input type="radio" name="img[small]" value="<?php  echo  $value->imageId; ?>"
                            <?php if($value->small==1):echo "checked";endif;?>></td>
                    <td><input type="radio" name="img[base]" value="<?php  echo  $value->imageId; ?>"
                            <?php if($value->base==1):echo "checked"; endif;?>></td>
                    <td><input type="checkbox" name="img[data][<?php echo $value->imageId; ?>][gallery]"
                            <?php if($value->gallery==1):echo "checked";endif;?>></td>
                    <td><input type='checkbox' name="remove" value="<?php echo $value->imageId ?>"></td>

                </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </form>
    <form method="POST" id="imageUploadForm"
        action="<?php echo $this->getUrl()->getUrl('save','Product\ProductMedia'); ?>" enctype='multipart/form-data'>

        <input type='file' name='file' />
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
    <script>
    $(document).ready(function(e) {
        $('#imageUploadForm').on('submit', (function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (typeof response.element == "object") {
                        $(response.element).each(function(i, element) {
                            $(element.selector).html(element.html);
                        });
                    }
                    alert('Successfully Uploaded');
                },
            });
        }));
    });

    $(document).ready(function() {
        $('#delete').click(function() {
            if (confirm('Are you sure you want to delete?')) {
                var id = [];
                $(':checkbox:checked').each(function(i) {
                    id[i] = $(this).val();
                });
                if (id.length == 0) {
                    alert('select atleast one checkbox');
                } else {
                    $.ajax({
                        url: 'http://localhost/PHP/ecommerce/index.php?c=Product\\ProductMedia&a=delete',
                        method: 'Post',
                        data: {
                            id: id,
                        },
                        success: function() {
                            for (var i = 0; i < id.length; i++) {
                                $('tr#' + id[i] + '').css('background-color', 'white');
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });
    });
    </script>
</div>