<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Model\Customer\Message');
\Mage::loadFileByClassName('Controller\Core\Abstracts');


class Customer extends \Controller\Core\Abstracts
{
    protected $request = null;
    protected $message = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setLayout();
        $this->setMessage();
    }

    public function setLayout(Block\Customer\Layout $layout = null) {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Customer\Layout');
        }
        $this->layout = $layout;
        return $this;
    }


    public function setMessage()
    {
        $this->message = \Mage::getController('Model\Customer\Message');
        return $this;
    }
}

?>