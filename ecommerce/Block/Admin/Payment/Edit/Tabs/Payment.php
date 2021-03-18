<?php

namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Payment extends \Block\Core\Template{
    protected $payment = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/payment/edit/tabs/form.php');
    }
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Payment Add/Edit';
    }
   }
?>