<?php 

namespace Block\Admin\Customer\Edit;

\Mage::getController('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs{

    public function __construct(){
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab(){
        $this->addTab('customer',['label'=>'Customer Form','block'=>'Block\Admin\Customer\Edit\Tabs\Customer']);
        if ($id = $this->getRequest()->getGet('updateId')) {
            $this->addTab('address',['label'=>'Customer Address','block'=>'Block\Admin\Customer\Edit\Tabs\Address']);
        }
        $this->setDefaultTab('customer');
        return $this;
   }

}

?>