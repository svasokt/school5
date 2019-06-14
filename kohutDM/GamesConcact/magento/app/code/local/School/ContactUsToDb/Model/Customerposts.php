<?php
class School_ContactUsToDb_Model_Customerposts extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('contactustodb/customerposts');
    }
}
