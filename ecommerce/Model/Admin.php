<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Admin extends \Model\Core\Table{
	
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct(){
		parent::__construct();
		$this->primaryKey = 'adminId';
		$this->tableName = 'admin';

	}

	public function getStatusOptions(){
		return [
			self :: STATUS_DISABLED => "Disable",
			self :: STATUS_ENABLED => "Enable"
		];
	}
}
?>