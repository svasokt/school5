<?php
class School_News_Model_Resource_Eavnews_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('news/eavnews');
    }
}
