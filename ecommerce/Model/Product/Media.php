<?php

namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Model\Core\Table{
	
	public function __construct(){
		parent::__construct();
		$this->primaryKey = 'imageId';
		$this->tableName = 'product_media';

	}
	public function getImagePath($subPath = null){
		return \Mage :: getBaseDir('Image\Product\\');
	}
}

?>