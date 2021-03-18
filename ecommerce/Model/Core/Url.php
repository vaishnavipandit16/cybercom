<?php

namespace Model\Core;

class Url {
    protected $request =  null;
    
    public function __construct()
    {
        $this->setRequest();

    }
    
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest()
    {
        return $this->request;  
    }
    public function getUrl($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false)
    {
        $final = $this->getRequest()->getGet();
        if ($resetParams) {
            $final = [];
        }
        if ($actionName == Null) {
            $actionName = $this->getRequest()->getGet('a');
        }
        if ($controllerName == Null) {
            $controllerName = $this->getRequest()->getGet('c');
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;

        if(is_array($params)){
            $final = array_merge($final, $params);
        }
        
        $queryString = http_build_query($final);
        unset($final);
        $url = "http://localhost/PHP/ecommerce/index.php?{$queryString}";
        return $url;
    }

    public function baseUrl($subUrl = null){
        $url = "http://localhost/PHP/ecommerce/";
        if($subUrl){
            $url.= $subUrl;
        }
        return $url;
    }
}

?>