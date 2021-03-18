<?php

namespace Model;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class CmsPage extends \Model\Core\Table{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('pageId');
       $this->setTableName('cms_page');                                              
   }

   public function getStatusOptions() {
       return [
           self :: STATUS_DISABLED => "DISABLED",
           self :: STATUS_ENABLED => "ENABLED",
       ];
   }
}

?>