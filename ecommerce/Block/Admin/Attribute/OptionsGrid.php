<?php

namespace Block\Admin\Options;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template {
    protected $options = [];

    public function __construct() {
        $this->setTemplate('View/Admin/attribute/form.php');
    }

    public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
		$tabs  = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab,$tabs)){
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}
}

?>