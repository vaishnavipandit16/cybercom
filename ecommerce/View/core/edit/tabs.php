<?php

$tabs = $this->getTabs();
foreach($tabs as $key => $tab):?>
<button class="btn btn-primary"
    onclick="object.setUrl('<?php  echo $this->getUrl()->getUrl('edit',null,['tab'=>$key]);?>').resetParams().load();"><?php echo $tab['label']; ?></button>
<br><br>
<?php
endforeach;
?>