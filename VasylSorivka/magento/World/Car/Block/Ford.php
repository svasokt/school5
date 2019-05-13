<?php
class World_Car_Block_Ford extends Mage_Core_Block_Template
{
    protected $models = ['transit', 'mondeo', 'fiesta'];

    public function getModels()
    {
        return $this->models;
    }


}