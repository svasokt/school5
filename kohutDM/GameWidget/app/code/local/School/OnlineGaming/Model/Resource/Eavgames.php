<?php
class School_OnlineGaming_Model_Resource_Eavgames extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('onlinegaming_eavgames');
        $this->setConnection(
            $resource->getConnection('onlinegaming_read'),
            $resource->getConnection('onlinegaming_write')
        );
    }
}
