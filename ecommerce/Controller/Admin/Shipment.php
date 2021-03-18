<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Shipment extends \Controller\Core\Admin{
    protected $shipment = [];
    
    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $shipment = \Mage::getController('Model\Shipment');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $shipmentData = $shipment->load($id);
                if (!$shipmentData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                    $this->redirect('grid','Shipment',null,true);
                }
            } else {
                function random_strings($length_of_string) { 
                    $subString =  substr(md5(time()), 0, $length_of_string); 
                    return $subString;
                } 
                $subString =  random_strings(10);
                $arr = ['1','2','3','4','5','6','7','8','9','0'];
                $str = str_replace($arr,'_',$subString);
                $code = $str;
                $shipment->code = $code;
                $shipment->createdDate = date('Y-m-d h:i:s');
            }
            $shipmentData = $this->getRequest()->getPost('shipment');
            $shipment->setData($shipmentData);
            $shipment->save();
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
		$gridHtml= \Mage::getBlock('Block\Admin\Shipment\Grid')->toHtml();
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
        $formHtml=\Mage::getBlock('Block\Admin\Shipment\Edit');
        $shipment = \Mage::getModel('Model\Shipment');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $shipment = $shipment->load($id);
            if(!$shipment) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($shipment)->toHtml();
		
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
                $shipment = \Mage::getController('Model\Shipment');
                $shipment->methodId = $id;
            }
            $shipment->delete();
            $this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>