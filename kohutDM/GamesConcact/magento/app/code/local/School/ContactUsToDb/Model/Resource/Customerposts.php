<?php
class School_ContactUsToDb_Model_Resource_Customerposts extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('contactustodb/customerposts','post_id');
    }
}
