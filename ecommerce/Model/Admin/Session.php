<?php

namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Message');

class Session extends \Model\Core\Session
{
	protected $nameSpace;

	function __construct()
	{
		$this->setSession();
		$this->setNameSpace('core');
		$_SESSION[$this->getNameSpace()]['init']='';
		
	}

	public function setSession()
	{
		if(session_status()==PHP_SESSION_NONE)
		{
			session_start();
		}
		return $this;
	}

	public function setNameSpace($nameSpace)
	{
		$this->nameSpace = $nameSpace;
		return $this->nameSpace;
	}

	public function getNameSpace(){
		return $this->nameSpace;
	}

	public function __set($key,$value)
	{
		$_SESSION[$this->getNameSpace()][$key]=$value;
		return $this;
	}

	public function __get($key)
	{
		if(!array_key_exists($key,$_SESSION[$this->getNameSpace()])){
			return null;
		}
		return $_SESSION[$this->getNameSpace()][$key];
		
	}

	public function __unset($key){

		if(array_key_exists($key,$_SESSION[$this->getNameSpace()])){

			unset($_SESSION[$this->getNameSpace()][$key]);
		}

		return $this;
	}

	
	

}
?>