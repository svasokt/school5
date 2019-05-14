<?php
class School_News_Model_table_news extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('school/news');
    }
}
