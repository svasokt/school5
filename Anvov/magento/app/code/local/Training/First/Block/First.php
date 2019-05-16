<?php

/**
 * Block for first.layout
 *
 * @category    Training
 * @package     Training_First
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_First_Block_First extends Mage_Core_Block_Template
{

    public function myfunction()
    {
        return "Hello ninjas";
    }

    /**
     * get collection from weblog
     */
    public function showCollection()
    {
        $collection = Mage::getModel('weblog/blogpost')->getCollection();
        return $collection;
    }

    public function loadModel($id)
    {
           $model =  Mage::getModel('weblog/blogpost');
           $model->load($id);
           return $model;
    }
}