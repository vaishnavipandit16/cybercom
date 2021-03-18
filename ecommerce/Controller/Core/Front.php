<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Model\Core\Request');

class Front
{
	public static function init(){
		$request = \Mage::getModel('Model\Core\Request');
		$controllerName = $request->getControllerName();
		$controller = self::prepareClassName($controllerName, "controller");
		$controllerObj = \Mage::getController($controller);
		$actionName = $request->getActionName();
		$actionName = $actionName.'Action';
		$controllerObj->$actionName();
	}
    public static function prepareClassName($key, $namespace)
    {
        $className = $namespace . "\Home\\" . $key;
        $className = str_replace("\\", " ", $className);
        $className = ucwords($className);
        $className = str_replace(" ", " ", $className);
        return $className;
    }
}