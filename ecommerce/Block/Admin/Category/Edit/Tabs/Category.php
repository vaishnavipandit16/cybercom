<?php

namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Category extends \Block\Core\Template{
    protected $category = null;
    protected $categoryOptions = [];

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/category/edit/tabs/form.php');
    }

    public function setCategory($category=null){
		if($category){
			$this->category = $category;
			return $this;
		}
		$category = \Mage::getModel('Model\Category');
		if($id = $this->getRequest()->getGet('updateId')){
			
			$category = $category->load($id);

		}
		$this->category = $category;
		return $this;
	}

	public function getCategory(){
		if(!$this->category){
			$this->setCategory();
		}
		return $this->category;
	}
	
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Category Add/Edit';
    }

    public function getCategoryOptions(){
        if(!$this->categoryOptions){
            $query = "SELECT `categoryId`,`categoryName` from `{$this->getCategory()->getTableName()}`";
            $options = $this->getCategory()->getAdapter()->fetchPairs($query);
            if (!$this->getRequest()->getGet('updateId')){  
                $query = "SELECT `categoryId`,`pathId` from `{$this->getCategory()->getTableName()}` ORDER BY `pathId`";
            }
            else {   
                $query = "SELECT `categoryId`,`pathId` from `{$this->getCategory()->getTableName()}` where `pathId` NOT LIKE '{$this->getCategory()->pathId}%' ORDER BY `pathId`";
            }
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            if($this->categoryOptions){
                foreach($this->categoryOptions as $categoryId => &$pathId){
                    $pathIds = explode("=",$pathId);
                    foreach($pathIds as $key =>&$id){
                        if(array_key_exists($id,$options)){
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode('=>',$pathIds);
                }
            }
            $this->categoryOptions = [""=>"Root Category"] + $this->categoryOptions;
        }
            return $this->categoryOptions;
        }
    }
?>