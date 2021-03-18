<?php

namespace Controller\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Admin');

class Options extends \Controller\Core\Admin {
    
    public function indexAction() {
        $layout = \Mage::getBlock('Block\Core\Layout');
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

    public function saveAction(){
        $existData = $this->getRequest()->getPost('exist');
        $newData = $this->getRequest()->getPost('new');
        $id = $this->getRequest()->getGet('updateId');
        $options = \Mage::getModel('Model\Attribute\Options');
        $ids = [];
        
        foreach ($existData as $key=>$value) {
            $query = "update attribute_option set name = '".$value['name']."', sortOrder = ".$value['sortOrder']." where optionId = $key";
            $options->update($query);
        } 
        
        for ($i = 0;$i<count($newData); $i+=2){
            $newOption = \Mage::getModel('Model\Attribute\Options');
            $nextOption = $i + 1;
            $newOption->name = $newData[$i];
            $newOption->sortOrder = $newData[$nextOption];
            $newOption->attributeId = $id;
            $data = $newOption->save();
            array_push($ids,$data->optionId);
        }
        
        foreach ($existData as $key=>$value) {
            array_push($ids, $key);
        }
       
        if (empty($ids)) {
            $query = "DELETE FROM `{$options->getTableName()}` where attributeId = $id";
        } else {
            $query = "DELETE FROM `{$options->getTableName()}` where  where attributeId = $id and `{$options->getPrimaryKey()}` NOT IN (". implode(', ', $ids) .")";
        }
     	$options->deleteOption($query);
        $this->redirect('gridHtml');
    }
}

?>