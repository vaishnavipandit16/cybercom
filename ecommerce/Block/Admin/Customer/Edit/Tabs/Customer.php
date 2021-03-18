<?php

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Customer extends \Block\Core\Template{
    protected $customer = null;
	protected $groupOptions = [];

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/customer/edit/tabs/form.php');
    }

    public function setCustomer($customer=null){
		if($customer){
			$this->customer = $customer;
			return $this;
		}
		$customer = \Mage::getModel('Model\Customer');
		if($id = $this->getRequest()->getGet('updateId')){	
			$customer = $customer->load($id);
		}
		$this->customer = $customer;
		return $this;
	}

	public function getCustomer(){
		if(!$this->customer){
			$this->setCustomer();
		}
		return $this->customer;
	}
	
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Customer Add/Edit';
    }

	public function getGroupOptions(){
        if(!$this->groupOptions){
            $query = "SELECT `groupId`,`name` from `customer_group`";
            $this->groupOptions = $this->getCustomer()->getAdapter()->fetchPairs($query);
		}
		return $this->groupOptions;
	}
}
?>