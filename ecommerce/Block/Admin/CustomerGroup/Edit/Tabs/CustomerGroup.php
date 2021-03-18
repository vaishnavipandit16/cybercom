<?php

namespace Block\Admin\CustomerGroup\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class CustomerGroup extends \Block\Core\Template{
    protected $customerGroup = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/customerGroup/edit/tabs/form.php');
    }

	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'CustomerGroup Add/Edit';
    }
   }
?>