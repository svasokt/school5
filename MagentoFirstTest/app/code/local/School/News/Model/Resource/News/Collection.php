<?php
class School_News_Model_Resource_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('school/news');
    }
}
