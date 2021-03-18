<?php

namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class GroupPrice extends \Model\Core\Table{
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('entityId');
       $this->setTableName('product_group_price');                                              
   }
}
?>