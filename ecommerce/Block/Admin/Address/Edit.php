<?php

namespace Block\Admin\Address;

\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template{
    protected $address = null;
    protected $template = null;
	public function __construct(){
		$this->setTemplate('View/Admin/customer/addressForm.php');
	}

    public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
		$tabs  = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab,$tabs)){
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}
}

?>