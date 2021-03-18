<?php

namespace Block\Customer;

\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/customer/layout.php');
        $this->prepareChildren();
    }

    public function prepareChildren(){
        $this->addChild(new \Block\Core\Layout\Header(),'header');
        $this->addChild(new \Block\Core\Layout\Left(),'left');
        $this->addChild(new \Block\Core\Layout\Content(),'content');
        $this->addChild(new \Block\Core\Layout\Footer(),'footer');
    }
}

?>