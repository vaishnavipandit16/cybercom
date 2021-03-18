<?php 

namespace Block\Admin\Product\Edit;

\Mage::getController('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs{

    public function __construct(){
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab(){
        $this->addTab('product',['label'=>'Product Form','block'=>'Block\Admin\Product\Edit\Tabs\Product']);
        if ($id = $this->getRequest()->getget('updateId')) {
            $this->addTab('media',['label'=>'Media Gallery','block'=>'Block\Admin\Product\Edit\Tabs\Media']);
            $this->addTab('groupPrice',['label'=>'Category Groups','block'=>'Block\Admin\Product\Edit\Tabs\GroupPrice']);
            $this->addTab('attribute',['label'=>'Attribute Form','block'=>'Block\Admin\Product\Edit\Tabs\Attribute']);
        }
        $this->setDefaultTab('product');
        return $this;
   }

   
}

?>