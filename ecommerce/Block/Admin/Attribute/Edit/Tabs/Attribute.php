<?php

namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Attribute extends \Block\Core\Template {

    protected $attribute = null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('View/Admin/attribute/edit/tabs/form.php');
    }

    public function setAttribute($attribute = null) {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = \Mage::getModel('Model\Attribute');
        if ($id = $this->getRequest()->getGet('updateId')) {
            $attribute = $attribute->load($id);
        }
        $this->attribute = $attribute;
        return $this;
    }

    public function getAttribute() {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }
    
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Attribute Add/Edit';
    }

}

?>