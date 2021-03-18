<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    
    protected $payments = null;
	protected $template = null;
	public function __construct(){
		$this->setTemplate('View/Admin/payment/grid.php');
	}

    public function setPayments($payments = null){
		if(!$payments){
			$payments = \Mage::getController('Model\Payment');
			$payments = $payments->fetchAll();

		}
		$this->payments = $payments;
		return $this;

	}

	public function getPayments(){
		if(!$this->payments){
			$this->setPayments();
		}
		return $this->payments;
	}  
}

?>