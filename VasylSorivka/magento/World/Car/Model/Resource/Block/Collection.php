<?php
class World_Car_Model_Resource_Block_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected $_eventPrefix = 'world_block_collection';
    protected $_eventObject = 'world_block_collection';

    public function _construct()
    {
//        parent::__construct();
        $this->_init('world/block');
    }
}
