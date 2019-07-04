<?php
class School_OnlineGaming_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function addNewGameAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function deleteGameAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function deleteGameSuccessAction()
    {
        $id = $this->getRequest()->getPost('id');
        Mage::getModel("onlinegaming/eavgames")
            ->load($id)
            ->delete();
        $this->_redirect('games/index/index');
    }

    public function addNewGameSuccessAction()
    {
        $title = $this->getRequest()->getPost('title');
        $description = $this->getRequest()->getPost('description');
        $creator = $this->getRequest()->getPost('creator');
        $picture = $this->getRequest()->getPost('picture');
        $model = Mage::getModel("onlinegaming/eavgames")
            ->setTitle($title)
            ->setDescription($description)
            ->setCreator($creator)
            ->setPicture($picture)
            ->save();
        //$this->_redirect('games/index/index');
        Mage::register('IndexController_addNewGameSuccessAction', $model);
        $this->loadLayout();
        $this->renderLayout();
    }

    public function gameAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
