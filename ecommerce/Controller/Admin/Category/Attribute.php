<?php

namespace Controller\Admin\Category;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Block\Core\Layout\Message');

class Attribute extends \Controller\Core\Admin{
    protected $category = [];

    public function saveAction() {
		if (!$this->getRequest()->isPost()) {
			throw new Exception("Invalid Request");
		}
		$category = \Mage::getModel('Model\Category');
        if ($id = $this->getRequest()->getGet('updateId')) {
            $categoryData = $category->load($id);
            if (!$categoryData) {
                $this->getMessage()->setFailure('Record not found');
            }
        }
        $id = $this->getRequest()->getGet('updateId');
        $keys =[];
        $values = [];
        $categoryAttributData = $this->getRequest()->getPost();
        foreach ($categoryAttributData as $key =>$value) {
            if (is_array($value)) {
                array_push($keys,$key);
                array_push($values, $value);
            } else {
                $category->$key = $value;
            }
        }
        $category->save();
        $category->setArrayData($keys, $values);
        $category->arrayUpdate($id);
        $this->redirect('gridHtml');
    }

    public function indexAction()
	{
		$layout = \Mage::getBlock('Block\Core\Layout');
		$content=$layout->getChild('content');
		echo $layout->toHtml();
	
	}
	public function gridHtmlAction()
	{
		$gridHtml= \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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
        $formHtml=\Mage::getBlock('Block\Admin\Category\Edit')->toHtml();
		$tabHtml = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();
		
		$response=[
			'status'=>'success',
			'message'=>'Hiii',
			'element'=>[
				[	'selector'=>'#contentGrid',
					'html'=>$formHtml
				],
				[
					'selector'=>'#leftHtml',
					'html'=>$tabHtml
                ]
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
                $category = \Mage::getController('Model\Category');
                $category = $category->load($id);
				if (!$category) {
					throw new Exception("Invalid Id", 1);
				}
            }

			$pathId = $category->pathId;
			$parentId = $category->parentId;
			$category->updateChildrenPathIds($pathId, $parentId);
			$category->delete();
			$this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>