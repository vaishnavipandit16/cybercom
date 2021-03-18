<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Model\Core\Table{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const Y = 1;
    const N = 0;
    
   public function __construct() {
       parent::__construct();
       $this->setPrimaryKey('categoryId');
       $this->setTableName('category');                                              
   }

   public function getStatusOptions() {
       return [
           self :: STATUS_DISABLED => "DISABLED",
           self :: STATUS_ENABLED => "ENABLED",
       ];
   }

   public function getFeaturedOptions() {
    return [
        self :: N => "No",
        self :: Y => "Yes",
    ];
    }

    public function updatePathId(){
		if(!$this->parentId){
			$pathId = $this->categoryId;
		} else{
			$parent = \Mage::getModel('Model\Category')->load($this->parentId);
			if(!$parent){
				throw new \Exception("Unable to load parent",1);
			}
			$pathId = $parent->pathId.'='.$this->categoryId;
		}
		$this->pathId = $pathId;
		return $this->save();
	}

	public function updateChildrenPathIds($categoryPathId, $parentId = null){
		$categoryPathId = $categoryPathId."=";
		$query = "SELECT * FROM $this->tableName where pathId like '{$categoryPathId}%' ORDER BY pathId ASC";
		$categories = $this->getAdapter()->fetchAll($query);

		if($categories){
			foreach($categories as $key => $row){
				$row = \Mage::getModel('Model\Category')->load($row['categoryId']);

                if ($parentId != null) {
                    $row->parentId = $parentId;
                }
				$row->updatePathId();
			}
		}
	}
}

?>