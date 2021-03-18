<?php

namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');

class Address extends \Controller\Core\Admin{
    protected $billingAddress = null;
    protected $shippingAddress = null;

    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $addressBilling = \Mage::getModel('Model\Customer\Address');

            if ($id = $this->getRequest()->getPost('billingId')) {
                $addressBilling->addressId = $id;
            }
            $addressBillingData = $this->getRequest()->getPost('billing');
            $addressBilling->customerId = $this->getRequest()->getGet('updateId');
            $addressBilling->addressType = 1;
            $addressBilling->setData($addressBillingData);
            $addressBilling->save();  

            $addressShipping = \Mage::getModel('Model\Customer\Address');

            if ($id = $this->getRequest()->getPost('shippingId')) {
                $addressShipping->addressId = $id;
            }

            $addressShippingData = $this->getRequest()->getPost('shipping');
            $addressShipping->customerId = $this->getRequest()->getGet('updateId');
            $addressShipping->addressType = 0;
            $addressShipping->setData($addressShippingData);
            $addressShipping->save();
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }   
    }

    public function editAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $layout = $this->getLayout();
            $layout->setTemplate('View/core/layout/threeColumn.php');
            $edit = \Mage::getBlock('Block\Admin\Address\Edit');
            $content = $layout->getChild('content');
            $id = $this->getRequest()->getGet($updateId);
            $address = \Mage::getController('Model\Customer\Address');
            $data = $address->load($id);
            $content->addChild($edit, 'grid');

            $leftContent = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
            $left=$layout->getChild('left');
            $left->addChild($leftContent);
            echo $layout->toHtml();
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>