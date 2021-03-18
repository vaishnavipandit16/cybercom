<?php

namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Session');

class Message extends \Model\Core\Session
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function setSuccess($success)
	{
		$this->success=$success;
		return $this->success;
		
	}

	public function getSuccess()
	{
		return $this->success;
	}

	public function setFailure($failure)
	{
		$this->failure=$failure;
		return $this->failure;
		
	}

	public function getFailure()
	{
		return $this->failure;
	}

	public function clearSuccess() 
	{
		unset($this->success);
		return $this;
	}
	public function clearFailure() 
	{
		unset($this->failure);
		return $this;
	}
}

?>