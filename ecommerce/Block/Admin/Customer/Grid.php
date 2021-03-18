<?php

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    
    protected $customers = null;
	protected $template = null;
	public function __construct(){
		$this->setTemplate('View/Admin/customer/grid.php');
	}

    public function setCustomers($customers=null){
		if(!$customers){
			$customers = \Mage::getController('Model\Customer');
			$customers = $customers->fetchAll();
		}
		$this->customers = $customers;
		return $this;

	}

	public function getCustomers(){
		if(!$this->customers){
			$this->setCustomers();
		}

		return $this->customers;
	}

   
}

?>