<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Block\Core\Layout\Message');

class Product extends \Controller\Core\Admin{
    protected $product = [];

    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $product = \Mage::getModel('Model\Product');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $productData = $product->load($id);
                if (!$productData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                }
                $product->updatedDate = date('Y-m-d h:i:s');
            } else {
                $product->createdDate = date('Y-m-d h:i:s');
            }
            $productData = $this->getRequest()->getPost('product');
			$product->setData($productData);
            $product->save();
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
		$gridHtml= \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
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
		$layout = $this->getLayout();
		$layout->setTemplate('View/core/oneColumn.php');
		$formHtml = \Mage::getBlock('Block\Admin\Product\Edit');
		$id = $this->getRequest()->getGet('updateId');
		$product = \Mage::getModel('Model\Product');
		if ($id) {
			$productData = $product->load($id);
			if(!$productData) {
				$this->getMessage()->setFailure('Record Not Found!');
			}
		}

		$form = $formHtml->setTableRow($product)->toHtml();		
		$response = [
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
			$product = \Mage::getModel('Model\Product');
			$product->productId = $id;
			$product->delete();
			$this->redirect('gridHtml');
		}catch(Exception $e){
			 	$this->getMessage()->setFailure($e->getMessage());

        	}
	}
}

?>