<?php
class World_Car_Model_Main extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        parent::_construct();

        $this->_init('world/main');
    }
}

