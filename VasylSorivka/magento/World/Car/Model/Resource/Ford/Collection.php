<?php

class World_Car_Model_Resource_Ford_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('world/ford');
    }
}
