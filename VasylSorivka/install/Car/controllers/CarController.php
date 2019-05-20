<?php
class World_Car_CarController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function editAction()
    {
        $params = $this->getRequest()->getParams();

        /* @var $car World_Car_Model_Ford */
        $car = Mage::getModel('world/ford')->load($params['id']);
        $car->setData('title', $params['title']);
        $car->save();
    }

    public function createAction()
    {
        $params = $this->getRequest()->getParams();
        /* @var $car World_Car_Model_Ford */
        $car = Mage::getModel('world/ford');
        $car->setData('title', $params['title']);
        $car->save();
    }
    public function deleteAction()
    {
        $params = $this->getRequest()->getParams();
        /* @var $car World_Car_Model_Ford */
        $car = Mage::getModel('world/ford')->load($params['id']);
        $car->delete();
        $car->save();
    }
}
