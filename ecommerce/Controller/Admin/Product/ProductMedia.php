<?php

namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');

class ProductMedia extends \Controller\Core\Admin{

    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
        $response = [
            'element' => [
                [

                    'selector' => '#contentGrid',
                    'html' => $gridHtml
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => $tabHtml
                ]
            ]
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
    }
   
    public function saveAction() {
        $this->_imageUpload();  
        
    }

    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        $productMedia = \Mage::getModel('Model\Product\Media');
        
        foreach ($data['data'] as $key => $value) {
            $productMedia->load($key);
            if ($value['gallery'] == 'on') {
                $value['gallery'] = 1;
            } else {
                $value['gallery'] = 0;
            }
            $productMedia->setData($value);
            $productMedia->save(); 
        }

        foreach ($data as $key => $value) {
            if ($value != []) {
                $id = $this->getRequest()->getGet('updateId');
                $query = "update productmedia set $key=0 where productId = $id";
                $productMedia->edit($query);
                $productMedia->load($value);
                $productMedia->$key = 1;
                $productMedia->save();
            }
        }
        $this->redirect('gridHtml');
    }
    public function _imageUpload()
    {
        $media = \Mage::getModel('Model\Product\Media');
        $photo=$_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $path=$media->getImagePath();
        move_uploaded_file($tempName,$path.$photo);

        $media->image=$photo;
        $media->productId=$this->getRequest()->getGet('updateId');
        $media->save();
        $this->redirect('gridHtml');
    }

    public function formAction() {
        try{
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $layout = $this->getLayout();
		$layout->setTemplate('View/core/oneColumn.php');
		$formHtml = \Mage::getBlock('Block\Admin\Product\Edit');
		$id = $this->getRequest()->getGet('updateId');
        $media = \Mage::getModel('Model\Product\ProductMedia');
        if ($id) {
            
        }
            //$layout = $this->getLayout();
            //$edit = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');
            //$content = $layout->getChild('content');
            //$content->addChild($edit, 'grid');
            //echo $layout->toHtml();
        } catch(Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try {
            $productMedia = \Mage::getModel('Model\Product\Media');
            $ids = $this->getRequest()->getPost('id');
            if (!$ids) {
                throw new \Exception("Invalid Id");
            }
            foreach ($ids as $id) {
                $id = (int) $id;
                $query = "select image from `{$productMedia->getTableName()}` where `{$productMedia->getPrimaryKey()}` = $id";
                $data =$productMedia->fetchRow($query);
                $image = $data->image;
                //$image = $productMedia->getData('image');
                $productMedia->delete($id);
                unlink('Image/Product/'.$image);
            }
            $this->gridHtmlAction();

            $this->getMessage()->setSuccess('Record Deleted!');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

}

?>