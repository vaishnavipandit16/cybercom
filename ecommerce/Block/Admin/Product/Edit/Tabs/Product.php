<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Product extends \Block\Core\Template{
    protected $product = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/product/edit/tabs/form.php');
    }
	
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Product Add/Edit';
    }
   }
?>