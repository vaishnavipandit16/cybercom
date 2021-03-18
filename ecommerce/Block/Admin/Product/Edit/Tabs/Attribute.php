<?php

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Attribute extends \Block\Core\Template{
    protected $attribute = null;
    protected $options = [];

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/product/edit/tabs/attribute.php');
    }

    public function setAttribute($attribute = null)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = \Mage::getModel('Model\Attribute');
        $id = $this->getTableRow()->productId;
        $query = "SELECT * fROM `product` WHERE productId = '$id' ";
        $attribute1 = $attribute->fetchRow($query);
        $this->attribute = $attribute1;
        return $this;
    }
    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }
   

	public function getAttributes() {
		$sql = "select * from `attribute` where entityTypeId = 'product'";
		$attribute = \Mage::getModel('Model\Attribute');
		return $attribute->fetchAll($sql);
	}

    public function setOptions($options=null){
		if(!$options){
			$options = \Mage::getModel('Model\Attribute\Options');
			$options = $options->fetchAll();
		}
		$this->options = $options;
		return $this;
	}

	public function getOptions(){
		if(!$this->options){
			$this->setOptions();
		}
		return $this->options;
	}
    
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Attribute Option Add/Edit';
    }
}
?>