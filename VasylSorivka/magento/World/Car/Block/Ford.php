<?php

class World_Car_Block_Ford extends Mage_Core_Block_Template
{
    public function getModel($id)
    {
        $models = Mage::getModel('world/ford')->load($id);
        return $models;
    }

    public function getAllModelsOfFord()
    {
        $allModelsOfFord = Mage::getModel('world/ford')->getCollection();
        return $allModelsOfFord;
    }

    public function getCarEditUrl($car)
    {
        return $this->getUrl('*/car/edit', array('id' => $car->getId(), 'title' => $car->getTitle()));
    }

    public function getCarCreateUrl($car)
    {
        return $this->getUrl('*/car/create', array('title' => $car->getTitle()));
    }

    public function getCarDeleteUrl($car)
    {
        return $this->getUrl('*/car/delete', array('id' => $car->getId()));
    }

    public function getCars()
    {
        $cars = Mage::getResourceModel('world/ford_collection')
        ->addFieldToSelect(['id', 'title'])
//        ->addFieldToFilter('id', ['lt' => 10]);
        ->setPageSize(1)
            ->setCurPage(4)
            ->load();
        return $cars;
    }

    public function getCar($id)
    {
        return Mage::getModel('world/ford')->load($id);
    }
}
