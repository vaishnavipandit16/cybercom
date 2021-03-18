<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Media extends \Block\Core\Template{
    protected $product = null;
    protected $image = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/product/edit/tabs/media.php');
    }

    public function getImage()
    {
        if(!$this->image){
            $this->setImage();
        }
        return $this->image;
    }

    public function setImage($image = null){
        if(!$image){
            $image = \Mage::getModel('Model\Product\Media');
            $id = $this->getRequest()->getGet('updateId');
            $query = "select * from `{$image->getTableName()}` where productId= $id";
            $row=$image->fetchAll($query);
         }
        $this->image = $row;
        return $this;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Media Add/Edit';
    }
}

?>