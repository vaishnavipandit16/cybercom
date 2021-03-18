<?php

namespace Block\Admin\Shipment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Shipment extends \Block\Core\Template{
    protected $shipment = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/shipment/edit/tabs/form.php');
    }
	
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Shipment Add/Edit';
    }
   }
?>