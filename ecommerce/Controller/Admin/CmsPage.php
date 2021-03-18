<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Block\Core\Layout\Message');

class CmsPage extends \Controller\Core\Admin{
    protected $cmsPage = [];

    public function saveAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $cmsPage = \Mage::getModel('Model\CmsPage');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $cmsPageData = $cmsPage->load($id);
                if (!$cmsPageData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                }
            } else {
                $cmsPage->createdDate = date('Y-m-d h:i:s');
            }
            $cmsPageData = $this->getRequest()->getPost('cms_page');
			$cmsPage->setData($cmsPageData);
            $cmsPage->save();
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
		$gridHtml= \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
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
		$formHtml=\Mage::getBlock('Block\Admin\CmsPage\Edit');
		$cmsPage = \Mage::getModel('Model\CmsPage');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $cmsPage = $cmsPage->load($id);
            if(!$cmsPage) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($cmsPage)->toHtml();
		$tabHtml = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs')->toHtml();
		
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
			$cmsPage = \Mage::getModel('Model\CmsPage');
			$cmsPage->pageId = $id;
			$cmsPage->delete();
			$this->redirect('gridHtml');
		}catch(Exception $e){
			 	$this->getMessage()->setFailure($e->getMessage());

        	}
	}
}

?>