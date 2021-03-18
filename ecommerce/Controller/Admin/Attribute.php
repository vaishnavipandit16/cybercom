<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin {
    public function indexAction() {
        $layout = \Mage::getBlock('Block\core\Layout');
        $content = $layout->getChild('content');
        echo $layout->toHtml();
    }

    public function gridHtmlAction() {
        $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $response = [
            'status' => 'success',
            'message' => 'U are great',
            'element' => [
                [
                    'selector' => '#contentGrid',
                    'html' => $gridHtml,
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

    public function saveAction() {
        
            $attribute = \Mage::getModel('Model\Attribute');
            if ($id = $this->getRequest()->getGet('updateId')) {
                $attributeData = $attribute->load($id);
                if (!$attributeData) {
                    $this->getMessage()->setFailure('Record Not Found!');
                }
            }
            $attributeData = $this->getRequest()->getPost('attribute');
            echo '<pre>';
            print_r($attributeData);
            $attribute->setData($attributeData);
            $attribute->save();
            $query = "ALTER TABLE ".$attributeData['entityTypeId']." ADD `".$attributeData['name']."` ".$attributeData['backendType']." NOT NULL";
            $attribute->newRow($query);
            $this->redirect('gridHtml'); 
    }

    public function editAction(){
        $formHtml = \Mage::getBlock('Block\Admin\Attribute\Edit');
        $attribute = \Mage::getModel('Model\Attribute');
        $id = $this->getRequest()->getGet('updateId');
        if ($id) {
            $attribute = $attribute->load($id);
            if(!$attribute) {
                $this->getMessage()->setFailure('Record not Found!');
            }
        }
        $form = $formHtml->setTableRow($attribute)->toHtml();
       
        $response = [
            'status' => 'success',
            'message' => 'Hi',
            'element' => [
                [
                    'selector' => '#contentGrid',
                    'html' => $form
                ],
            ]
        ];
        header('Content-type:application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function deleteAction() {
        $id = $this->getRequest()->getGet('deleteId');
        $attribute = \Mage::getBlock('Model\Attribute');
        $data = $attribute->load($id);
        $query = "ALTER TABLE `{$data->entityTypeId}` DROP COLUMN `{$data->name}`";
        $attribute->edit($query);
        $attribute->attributeId = $id;
        $attribute->delete();
        $this->redirect('gridHtml');
    }
}

?>