<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin{
    protected $customer = [];

    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $customer = \Mage::getController('Model\Customer');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $customerData = $customer->load($id);
                if (!$customerData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                }
                $customer->updatedDate = date("Y/m/d h:i:sa");
            } else {
                $customer->createdDate = date("Y/m/d h:i:sa");
            }
            $customerData = $this->getRequest()->getPost('customer');
            $password = $this->getRequest()->getPost('password');
            $customer->password = md5($password);
            $customer->setData($customerData);
            $customer->save();
            $this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }   
    }

    public function indexAction()
	{
		$layout = \Mage::getBlock('Block\Core\Layout');
		$content=$layout->getChild('content');
		echo $layout->toHtml();
	
	}
	public function gridHtmlAction()
	{
		$gridHtml= \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
		$response = [
			'status' => 'success',
			 'message' => 'U r great',
			'element' => [
				[
					'selector'=>'#contentGrid',
					'html' => $gridHtml
				],
				[
					'selector'=>'#leftHtml',
					'html'=>null
				]
			]
		];
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response);
	}


    public function editAction() {
        $formHtml=\Mage::getBlock('Block\Admin\Customer\Edit');
        $customer = \Mage::getModel('Model\Customer');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $customer = $customer->load($id);
            if(!$customer) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($customer)->toHtml();
        
		$response=[
			'status'=>'success',
			'message'=>'Hiii',
			'element'=>[
				[	'selector'=>'#contentGrid',
					'html'=>$form
				],
			]
		];
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response);
    }

    public function deleteAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $id = (int) $this->getRequest()->getGet('deleteId');
            if (!$id) {
                $this->getMessage()->setFailure('Record Not Found!');
            } else {
                $customer = \Mage::getController('Model\Customer');
                $customer->customerId = $id;
            }
            $customer->delete();
            $this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>