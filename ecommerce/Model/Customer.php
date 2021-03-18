<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Model\Core\Table{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const RETAILOR = 1;
    const WHOLESALER = 2;
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('customerId');
       $this->setTableName('customer');                                              
   }

   public function getStatusOptions() {
       return [
           self :: STATUS_DISABLED => "DISABLED",
           self :: STATUS_ENABLED => "ENABLED",
       ];
   }

   public function getGroupOptions() {
    return [
        self :: RETAILOR => "RETAILOR",
        self :: WHOLESALER => "WHOLESALER",    
    ];
}
   
   
}

?>