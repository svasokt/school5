<?php
/**
 * Training Helloworld
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function goodbyeAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction() {
        echo ' ';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo 'Param: '.$key.' ';
            echo 'Value: '.$value.' ';
        }
        echo ' ';
    }
}