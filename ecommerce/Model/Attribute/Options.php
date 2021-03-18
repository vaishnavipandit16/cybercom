<?php

namespace Model\Attribute;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Options extends \Model\Core\Table{
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('optionId');
       $this->setTableName('attribute_option');                                              
   }
   
}
?>