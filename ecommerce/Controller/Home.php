<?php

namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');
\Mage::loadFileByClassName('Block\Core\Layout');

class Home extends Core\Customer {
    public function indexAction() {
        $layout = \Mage::getBlock('Block\Core\Layout');
		$content=$layout->getChild('content');
		echo $layout->toHtml();
    }
}

?>