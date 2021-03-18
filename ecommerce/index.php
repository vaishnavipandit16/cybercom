<?php


class Mage{
    public static function init() {
        self::getController('Controller\Core\Front');
        Controller\Core\Front::init();
    }

    public static function buildClassName($className){
        $className = str_replace('\\', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '\\', $className);
		return new $className();
    }

    public static function getController($className, $ton = false) {
        if (!$ton) {
            self ::loadFileByClassName($className);
            $className =self::buildClassName($className);
            return new $className;
        }
        $value = self::getRegistry($className);
        if ($value) {
            return $value;
        }
        self::loadFileByClassName($className);
        $className =self::buildClassName($className);
        $value = new $className;
        self::setRegistry($className, $value);
        return $value;
    }

    public static function getBlock($className, $ton = false) {
        if (!$ton) {
            self ::loadFileByClassName($className);
            $className =self::buildClassName($className);
            return new $className;
        }
        $value = self::getRegistry($className);
        if ($value) {
            return $value;
        }
        self::loadFileByClassName($className);
        $className =self::buildClassName($className);
        $value = new $className;
        self::setRegistry($className, $value);
        return $value;
    }

    public function loadFileByClassName($className) {
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','/',$className);
        $className = $className.'.php';
        require_once($className);
    }

    public static function getModel($className, $ton = false){
		if (!$ton) {
            self ::loadFileByClassName($className);
            $className =self::buildClassName($className);
            return new $className;
        }
        $value = self::getRegistry($className);
        if ($value) {
            return $value;
        }
        self::loadFileByClassName($className);
        $className =self::buildClassName($className);
        $value = new $className;
        self::setRegistry($className, $value);
        return $value;
	}

    public static function getBaseDir($subPath = null){
		if($subPath){
			return getcwd().DIRECTORY_SEPARATOR.$subPath;
		}
		return getcwd();
	}

    public static function setRegistry($key, $value) {
        $GLOBALS[$key] = $value;
    }

    public static function getRegistry($key, $optional = null) {
        if (!array_key_exist($key, $GLOABALS)) {
            return $optional;
        }
        return $GLOBALS[$key];
    }
}
Mage::init();

?>