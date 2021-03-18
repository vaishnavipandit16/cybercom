<?php 

namespace Block\Admin\CmsPage\Edit;

\Mage::getController('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs{

    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct(){
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab(){
        $this->addTab('cmsPage',['label'=>'CmsPage Form','block'=>'Block\Admin\CmsPage\Edit\Tabs\CmsPage']);
        $this->setDefaultTab('cmsPage');
        return $this;
   }

}

?>