<?php
class  School_OnlineGaming_Model_Eavgames extends Mage_Core_Model_Abstract
{
    const CACHE_TAG              = 'onlinegaming_eavgames';
    protected $_cacheTag         = 'onlinegaming_eavgames';
    protected $_eventPrefix      = 'onlinegaming_eavgames';
    protected $_eventObject      = 'eavgames';
    protected $_canAffectOptions = false;

    protected function _construct()
    {
        $this->_init('onlinegaming/eavgames');
    }

    public function cronTask()
    {
        Mage::log('Cron message', null, 'debug.log', true);
    }
}
