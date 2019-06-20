<?php


class Training_Contactus_Model_Product_Api extends Mage_Api_Model_Resource_Abstract
{
    public function items()
    {
        $arr_products=array();
        $products = Mage::getModel("contactus/contactus")
            ->getCollection();
//            ->setOrder('contactus_id', 'DESC');

//        foreach ($products as $product) {
//            $arr_products = array('contactus_id' => $product['contactus_id'].$param1, 'name' => $product['name'].$param2);
//        }

        return $products;
    }
}