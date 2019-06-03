<?php

class World_Car_Model_Resource_Ford_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected $_eventPrefix = 'world_car_collection';
    protected $_eventObject = 'world_car_collection';


    public function _construct()
    {
        $this->_init('world/ford');
    }
}
