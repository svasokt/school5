<?php

class World_Car_Model_Resource_Ford extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('world/ford','id'); //block_id это наш PRIMARY KEY в таблице, по умолчанию entity_id
    }

}

