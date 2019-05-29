<?php
class School_News_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function articleAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function setNewsFromParamsAction()
    {
        $title = $this->getRequest()->getParam('title');
        $content = $this->getRequest()->getParam('content');
        $author = $this->getRequest()->getParam('author');
        $model = Mage::getModel("news/news")
            ->setTitle($title)
            ->setContent($content)
            ->setAuthor($author)
            ->save();

        $eavmodel = Mage::getModel("news/eavnews")
            ->setTitle($title)
            ->setContent($content)
            ->setAuthor($author)
            ->save();

        Mage::register('model_from_School_News_IndexController', $model);
        Mage::register('eavmodel_from_School_News_IndexController', $eavmodel);
        $this->loadLayout();
        $this->renderLayout();
    }

    public function updateNewsFromParamsAction()
    {
        $id = $this->getRequest()->getParam('id');
        $title = $this->getRequest()->getParam('title');
        $content = $this->getRequest()->getParam('content');
        $model = Mage::getModel("news/news")
            ->load($id)
            ->setTitle($title)
            ->setContent($content)
            ->save();
        Mage::register('model_from_School_News_IndexController', $model);
        $this->loadLayout();
        $this->renderLayout();
    }
}

