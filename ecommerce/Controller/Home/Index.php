<?php

namespace Controller\Home;

use Exception;

\Mage::getController('Controller\Core\Customer');


class Index extends \Controller\Core\Customer
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
    }
    public function gridAction()
    {
        echo 'hello!!!';
    }
}

?>