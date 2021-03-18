<?php

namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Options extends \Block\Core\Template {

    protected $options = null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('View/Admin/attribute/edit/tabs/options.php');
    }

    public function setOptions($options=null){
		if(!$options){
			$options = \Mage::getModel('Model\Attribute\Options');
			$id = $this->getTableRow()->attributeId;
			$query = "select * from attribute_option where attributeId = $id";
			$options = $options->fetchAll($query);
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
        return 'Options Edit';
    }

}

?>