<?php

namespace Block\Admin\Shipment;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    
    protected $shipments = null;
	protected $template = null;

	public function __construct(){
		$this->setTemplate('View/Admin/shipment/grid.php');
	}

    public function setShipments($shipments = null){
		if(!$shipments){
			$shipments = \Mage::getController('Model\Shipment');
			$shipments = $shipments->fetchAll();

		}
		$this->shipments = $shipments;
		return $this;

	}

	public function getShipments(){
		if(!$this->shipments){
			$this->setShipments();
		}

		return $this->shipments;
	}  
}

?>