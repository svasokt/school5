<?php
class School_OnlineGaming_Model_ProductCorrectName extends Mage_Catalog_Model_Product
{
    public function getName()
    {
        return '*' . parent::getName() . '*';
    }
}