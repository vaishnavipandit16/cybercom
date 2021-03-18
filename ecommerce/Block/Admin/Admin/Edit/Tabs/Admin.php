<?php
namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Admin extends \Block\Core\Template{
    protected $admin = null;

    public function __construct ()
    {
       parent :: __construct();
       $this->setTemplate('View/Admin/admin/edit/tabs/form.php');
    }
	
	public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Admin Add/Edit';
    }
   }
?>