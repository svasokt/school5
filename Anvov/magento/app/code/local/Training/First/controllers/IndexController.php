<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Helloworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_First_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * echo string
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * echo string
     */
    public function goodbyeAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction() {
        echo '
        ';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo '
        Param: '.$key.'
        ';
            echo '
        Value: '.$value.'
        ';
        }
        echo '
        ';
    }

    public function newlayoutAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function basetypesAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function coreAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function detailAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * for collections and joints
     */
    public function collectionsAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}