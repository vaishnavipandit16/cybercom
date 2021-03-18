<?php 

namespace Block\Admin\Payment\Edit;

\Mage::getController('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs{

    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct(){
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab(){
        $this->addTab('payment',['label'=>'Payment Form','block'=>'Block\Admin\Payment\Edit\Tabs\Payment']);
        $this->setDefaultTab('payment');
        return $this;
   }

}

?>