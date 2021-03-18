<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Model\Core\Message');


class Abstracts
{
    protected $request = null;
    protected $message = null;
    
    public function __construct()
    {
        $this->setRequest();
    }
    
    public function getLayout() {
        return $this->layout;
    }

    public function renderLayout() {
        $this->getLayout()->toHtml();
    }

    public function setRequest()
    {
        $this->request = \Mage::getController('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function redirect($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false)
    {
        $url = $this->getUrl($actionName, $controllerName, $params, $resetParams);
        header("Location: {$url}");
        exit(0);
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
}

?>