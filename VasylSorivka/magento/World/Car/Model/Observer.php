<?php

class World_Car_Model_Observer
{
    public function wrapCarName($observer)
    {
        $car = $observer->getEvent()->getObject();

        $car->setTitle('***'.$car->getTitle().'***');

    }

    public function wrapCarCollection($observer)
    {
        $cars = $observer->getEvent()->getData('world_car_collection');

        foreach ($cars as $car){
            $car->setTitle('('.$car->getTitle().')');
        }
    }

    public function wrapBlockCollection($observer)
    {
        $blocks = $observer->getEvent()->getData('world_block_collection');

        foreach ($blocks as $block) {
            $block->setTitle('=>' . $block->getTitle() . '<=');
        }
    }
}
