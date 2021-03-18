<?php

namespace Block\Admin\CmsPage\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class CmsPage extends \Block\Core\Template {

    protected $cmsPage = null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('View/Admin/cmsPage/edit/tabs/form.php');
    }
    
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'CmsPage Add/Edit';
    }

}

?>