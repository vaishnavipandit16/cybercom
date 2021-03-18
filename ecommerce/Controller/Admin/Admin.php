<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');

class Admin extends \Controller\Core\Admin{
    protected $admin = [];
    
    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $admin = \Mage::getController('Model\Admin');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $adminData = $admin->load($id);
                if (!$adminData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                    $this->redirect('gridHtml');
                }   
            }
            $admin->createdDate = date('Y-m-d h:i:s');
            $adminData = $this->getRequest()->getPost('admin');
            $password = $this->getRequest()->getPost('password');
            $admin->password = md5($password);
            $admin->setData($adminData);
            $admin->save();
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
		$gridHtml= \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
		$response = [
			'status' => 'success',
			 'message' => ' U r great',
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
        $formHtml=\Mage::getBlock('Block\Admin\Admin\Edit');
        $admin = \Mage::getModel('Model\Admin');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $admin = $admin->load($id);
            if(!$admin) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($admin)->toHtml();
		
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
                $admin = \Mage::getController('Model\Admin');
                $admin->adminId = $id;
            }
            $admin->delete();
            $this->redirect('gridHtml');
            
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>