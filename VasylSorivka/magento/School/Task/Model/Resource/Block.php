<?php
class School_Task_Model_Resource_Block extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct()
    {
        $this->_init('schooltask/block','id');
    }

}