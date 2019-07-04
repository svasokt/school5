<?php


/**
 * Shipping model
 *
 * @category    Training
 * @package     Training_Shippingvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Shippingvovk_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    /**
     * @var string
     */
    protected $_code = 'training_shippingvovk';

    /**
     * show/not show shipping method
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return bool|Mage_Shipping_Model_Rate_Result|null
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /** @var Mage_Shipping_Model_Rate_Result $result */
        $result = Mage::getModel('shipping/rate_result');

        /** @var Training_Shippingvovk_Helper_Data $expressMaxProducts */
        $expressMaxWeight = Mage::helper('training_shippingvovk')->getExpressMaxWeight();

        $expressAvailable = true;
        foreach ($request->getAllItems() as $item) {
            if ($item->getWeight() > $expressMaxWeight) {
                $expressAvailable = false;
            }
        }

        if ($expressAvailable) {
            $result->append($this->_getExpressRate());
        }
        $result->append($this->_getStandardRate());

        return $result;
    }

    /**
     * Interface method shows available shipping methods
     *
     * @return array|void
     */
    public function getAllowedMethods()
    {
        return array(
            'standard'    =>  'Standard delivery',
            'express'     =>  'Express delivery',
        );
    }

    /**
     * Standart rate
     *
     * @return Mage_Shipping_Model_Rate_Result_Method
     */
    protected function _getStandardRate()
    {
        /** @var Mage_Shipping_Model_Rate_Result_Method $rate */
        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('large');
        $rate->setMethodTitle('Standard delivery');
        $rate->setPrice(1.23);
        $rate->setCost(0);

        return $rate;
    }

    /**
     * Express rate
     *
     * @return Mage_Shipping_Model_Rate_Result_Method
     */
    protected function _getExpressRate()
    {
        /** @var Mage_Shipping_Model_Rate_Result_Method $rate */
        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('express');
        $rate->setMethodTitle('Express delivery');
        $rate->setPrice(3.23);
        $rate->setCost(0);

        return $rate;
    }
}
