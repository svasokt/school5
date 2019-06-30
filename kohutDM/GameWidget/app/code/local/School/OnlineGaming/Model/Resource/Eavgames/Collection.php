<?php
class School_OnlineGaming_Model_Resource_Eavgames_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected $_previewFlag;

    protected function _construct()
    {
        $this->_init('onlinegaming/eavgames');
    }

    public function setFirstStoreFlag($flag = false)
    {
        $this->_previewFlag = $flag;
        return $this;
    }
}
