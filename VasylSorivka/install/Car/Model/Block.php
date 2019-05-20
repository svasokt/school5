<?php
class World_Car_Model_Block extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        parent::_construct();
        $this->_init('world/block');
    }
}
