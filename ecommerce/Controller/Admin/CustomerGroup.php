<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Block\Core\Layout\Message');

class CustomerGroup extends \Controller\Core\Admin{
    protected $customerGroup = [];

    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $customerGroup = \Mage::getController('Model\CustomerGroup');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $customerGroupData = $customerGroup->load($id);
                if (!$customerGroupData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                }
            } else {
                $customerGroup->createdDate = date('Y-m-d h:i:s');
            }
            $customerGroupData = $this->getRequest()->getPost('customergroup');
			$customerGroup->setData($customerGroupData);
            $customerGroup->save();
			$this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }   
    }

    public function indexAction()
	{
		$layout = \Mage::getBlock('Block\Core\Layout');
		$content = $layout->getChild('content');
		echo $layout->toHtml();
	
	}
	public function gridHtmlAction()
	{
		$gridHtml= \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
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

    public function editAction()
	{
		$formHtml=\Mage::getBlock('Block\Admin\CustomerGroup\Edit');
		$customerGroup = \Mage::getModel('Model\CustomerGroup');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $customerGroup = $customerGroup->load($id);
            if(!$customerGroup) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($customerGroup)->toHtml();
		
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

    public function deleteAction(){
		try{
			if(!$this->getRequest()->isPost()){
				throw new Exception("Inavalid Request");
			}
			$id=(int)$this->getRequest()->getGet('deleteId');
			if (!$id) {
               $this->getMessage()->setFailure('Record Not Found'); 
            }
			$customerGroup = \Mage::getModel('Model\CustomerGroup');
			$customerGroup->groupId = $id;
			$customerGroup->delete();
			$this->redirect('gridHtml');
		}catch(Exception $e){
			$this->getMessage()->setFailure($e->getMessage());
        }
	}
}

?>