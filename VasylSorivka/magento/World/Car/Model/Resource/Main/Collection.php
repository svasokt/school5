<?php
class World_Car_Model_Resource_Main_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
//        parent::__construct();
        $this->_init('world/main');
    }
}
