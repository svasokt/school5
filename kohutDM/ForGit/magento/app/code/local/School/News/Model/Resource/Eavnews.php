<?php
class School_News_Model_Resource_Eavnews extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('news_eavnews');
        $this->setConnection(
            $resource->getConnection('news_read'),
            $resource->getConnection('news_write')
        );
    }
}
