<?php
class School_News_Block_MainPage extends Mage_Core_Block_Template
{
    private $imgUrl = array();

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

    public function getModelResourceName()
    {
        $model = Mage::getModel("school/news");
        return $model->getResourceName();
    }

   public function getNewsCollection()
    {
        return Mage::getModel("school/news")
            ->getCollection();;
    }

    public function getNewsModel()
    {
        $id = $this->getRequest()->getParams('id');
        $model = Mage::getModel("school/news");
        $model->load($id);
        return $model;
    }

    public function getNewsModelFromRegister()
    {
        return Mage::registry('model_from_School_News_IndexController');
    }
}
