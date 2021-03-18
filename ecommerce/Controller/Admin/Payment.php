<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin{
    protected $payment = [];
    
    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $payment = \Mage::getController('Model\Payment');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $paymentData = $payment->load($id);
                if (!$paymentData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                    $this->redirect('gridHtml');
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
                $payment->code = $code;
                $payment->createdDate = date('Y-m-d h:i:s');
            }
            $paymentData = $this->getRequest()->getPost('payment');
            $payment->setData($paymentData);
            $payment->save();
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
		$gridHtml= \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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
        $formHtml=\Mage::getBlock('Block\Admin\Payment\Edit');
        $payment = \Mage::getModel('Model\Payment');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $payment = $payment->load($id);
            if(!$payment) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($payment)->toHtml();
		
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
                $payment = \Mage::getController('Model\Payment');
                $payment->methodId = $id;
            } 
            $payment->delete();
            $this->redirect('gridHtml');
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>