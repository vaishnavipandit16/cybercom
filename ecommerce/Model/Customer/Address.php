<?php

namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Address extends \Model\Core\Table{

	public function __construct(){
		parent::__construct();
		$this->primaryKey = 'addressId';
		$this->tableName = 'customer_address';

	}
}
?>