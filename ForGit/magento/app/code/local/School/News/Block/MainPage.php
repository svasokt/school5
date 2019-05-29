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
        $model = Mage::getModel("news/news");
        return $model->getResourceName();
    }

   public function getNewsCollection()
    {
        return Mage::getModel("news/news")
            ->getCollection()
            ->addFieldToSelect(['news_id','title'])
            ->addFieldToFilter('news_id', ['in' => [1,2]])
            ->setPageSize(1)
            ->setCurPage(1)
            ->load();
    }

    public function getNewsEavCollection()
    {
        return Mage::getModel("news/eavnews")
            ->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('author')
            //->join('bpe' => 'blogpost_extra', 'bpe.blopost.id = main_table.blogpost.id', 'additional')
            //->getSelect()->joinLeft(array('bpe' => 'blog_post_extra'), "bpe.blopost_id" = "blopost_id"
            //["additional" => "bpe.additional"])
            ->load();
    }


    public function getNewsModel()
    {
        $id = $this->getRequest()->getParams('id');
        $model = Mage::getModel("news/news");
        $model->load($id);
        return $model;
    }

    public function getNewsModelFromRegister()
    {
        return Mage::registry('model_from_School_News_IndexController');
    }

    public function getNewsEavModelFromRegister()
    {
        return Mage::registry('eavmodel_from_School_News_IndexController');
    }

    public function getEavModel()
    {
        $id = $this->getRequest()->getParams('id');
        $model = Mage::getModel("news/eavnews");
        $model->load($id);
        return $model;
    }
}
