<?php
class School_Deliveryx_Model_Resource_Offices_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected $_previewFlag;

    protected function _construct()
    {
        $this->_init('deliveryx/offices');
    }

    public function setFirstStoreFlag($flag = false)
    {
        $this->_previewFlag = $flag;
        return $this;
    }
}
