<?php

namespace Controller\Admin\Product;

\Mage::loadFileByClassName("Controller\Core\Admin");
\Mage::loadFileByClassName('Block\Core\Layout');

class GroupPrice extends \Controller\Core\Admin {
    
    public function indexAction() {
        $layout = \Mage::getBlock('Block\Core\Layout');
        $content = $layout->getChild('content');
        echo $layout->toHtml();
    }

	public function saveAction() {
		$data = $this->getRequest()->getPost('data');
		$groupPrice = \Mage::getModel('Model\Product\GroupPrice');
		$id = $this->getRequest()->getGet('updateId');

		if(array_key_exists('exist',$data)){
			foreach($data['exist'] as $groupId=>$price){
				$query = "update `product_group_price` set price =$price where customerGroupId=$groupId and productId=$id";
				$groupPrice->edit($query);
			}
		}
		
		if (array_key_exists('new',$data)) {
			foreach ($data['new'] as $groupId=>$price) {
				$groupPrice =\Mage::getModel('Model\Product\GroupPrice');
				$groupPrice->customerGroupId = $groupId;
				$groupPrice->productId = $id;
				$groupPrice->price = $price;
				$groupPrice->save();
			}
		}
		$this->redirect('gridHtml');
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

}

?>