<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template{
    protected $product = null;
    protected $customerGroups = null;
    protected $groupPrice = [];

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/product/edit/tabs/groupPrice.php');
    }

    public function setProduct(\Model\Product $product = null) {
        if ($product) {
            $this->product = $product;
            return $this;
        }
        $product = \Mage::getModel('Model\Product');
        $id = $this->getTableRow()->productId;
        if ($id) {
            $product = $product->load($id);
        }
        $this->product = $product;
        return $this;
    }

    public function getProduct() {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }

    public function getCustomerGroup() {
        $query = "select cg.*,pgp.price as groupPrice,
        if(p.price IS NULL, '{$this->getProduct()->price}', p.price) as price from customer_group cg
        LEFT JOIN product_group_price pgp
         ON pgp.customerGroupId = cg.groupId 
            AND pgp.productId = '{$this->getProduct()->productId}'
        LEFT JOIN product p
            ON pgp.productId = p.productId";

        
        $groupPrice=\Mage::getBlock('Model\Product\GroupPrice');
        $this->groupPrice = $groupPrice->fetchAll($query);
        return $this->groupPrice;
       
    }
    
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Group Price Add/Edit';
    }
}

?>