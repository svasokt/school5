<?php
class School_News_Block_MainPage extends Mage_Core_Block_Template
{
    private $imgUrl = array();
    private $newsTitles = array ('Welcome to Magento','Patterns',
        'Magento user&admin page','Magento structure');

    public function test()
    {
        return 'This message was written by School_News_Block_MainPage';
    }

    public function setImgSrc(string $key, string $url)
    {
        $this->imgUrl[$key] = $url;
    }

    public function getImgSrc($key)
    {
        return $this->imgUrl[$key];
    }

    public function getNewsTitles()
    {
        return $this->newsTitles;
    }
}
