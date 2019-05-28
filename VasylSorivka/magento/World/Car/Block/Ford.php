<?php
/* @var $this Mage_Core_Block_Template */



class World_Car_Block_Ford extends Mage_Core_Block_Template
{
    public function getModel($id)
    {
        $models = Mage::getModel('world/ford')->load($id);
        return $models;
    }

    public function getAllModelsfFord()
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
    public function getLeftJoin()
    {
        $leftJoin = Mage::getResourceModel('world/block_collection')
            ->addFieldToSelect('*');
        $leftJoin->getSelect()->joinLeft(
            ["wm" => 'world_main'],
            "wm.id = main_table.id",
            ["model" => "wm.model"]
            );

        return $leftJoin;

    }public function getRightJoin()
    {
        $rightJoin = Mage::getResourceModel('world/block_collection')
            ->addFieldToSelect('*');
        $rightJoin->getSelect()->joinRight(
            ["wm" => 'world_main'],
            "wm.id = main_table.id",
            ["model" => "wm.model"]
            );

        return $rightJoin;
    }

    public function getJoin()
    {
        $join = Mage::getResourceModel('world/block_collection')
            ->addFieldToSelect('*')
            ->join(['wm'=> 'main'], 'wm.id = main_table.id', 'model');
        return $join;
    }

    public function getEavJoinField()
    {
        $eavJoinField = Mage::getResourceModel('complexworld/eavblogpost_collection')
            ->addAttributeToSelect('*')
            ->joinField('model', 'world/main', 'model', 'id = entity_id', null, 'right');
        return $eavJoinField;
    }

    public function getEavJoinTable()
    {
        $eavJoinTable = Mage::getResourceModel('complexworld/eavblogpost_collection')
            ->addAttributeToSelect('*')
            ->joinTable(['wm' => 'world/main'], 'id = entity_id', ['model' => 'model'], null, 'right');
        return $eavJoinTable;
    }
}
