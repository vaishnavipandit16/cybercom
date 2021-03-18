<?php 

namespace Block\Admin\Attribute\Edit;
\Mage::getController('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs{
    
    public function __construct(){
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab(){
        $this->addTab('attribute',['label'=>'Attribute Form','block'=>'Block\Admin\Attribute\Edit\Tabs\Attribute']);
        if ($id = $this->getRequest()->getGet('updateId')) {
            $attribute = \Mage::getModel('Model\Attribute');
            $data = $attribute->load($id);
            if($data->inputType != 'textbox' && $data->inputType != 'textarea'){
                $this->addTab('options',['label'=>'Options Data','block'=>'Block\Admin\Attribute\Edit\Tabs\Options']);
            }
        }
        $this->setDefaultTab('attribute');
        return $this;
   }
}

?>