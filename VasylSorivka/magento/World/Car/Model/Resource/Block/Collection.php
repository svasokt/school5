<?php
class World_Car_Model_Resource_Block_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
//        parent::__construct();
        $this->_init('world/block');
    }
}
