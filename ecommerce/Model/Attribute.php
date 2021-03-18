<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Model\Core\Table{
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('attributeId');
       $this->setTableName('attribute');                                              
   }
   
   public function getInputTypeOptions() {
       return [
           'textbox' => 'textbox',
           'textarea'=> 'textarea',
           'number'=> 'number',
           'checkbox'=> 'checkbox',
           'radio'=> 'radio',
           'select'=> 'select',
           'select multiple' => 'select multiple',
       ];
   }

   public function getBackendTypeOptions()
	{
		return[
			'text' => "text",
			'varchar(256)' => "varchar",
			'decimal(10,2)'=>'decimal',
			'int(11)'=>'Integer',

		];
	}

   public function getOptions()
   {
        if (!$this->attributeId) {
            return false;
        }
        $attributeOption = \Mage::getModel('Model\Attribute\Options');
        $key = $this->getPrimaryKey();
        $query = "SELECT * FROM `{$attributeOption->getTableName()}` WHERE {$key} = '{$this->$key}'";
        $options = $attributeOption->fetchAll($query);
        return $options;
    }
}

?>