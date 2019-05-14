<?php
class School_News_Model_Resource_News extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('school/news','news_id');
    }
}
