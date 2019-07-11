<?php
class School_Deliveryx_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'deliveryx';

    /**
     * Calculate all item`s weight
     * @param $allItems - Mage_Shipping_Model_Rate_Request $request->getAllItems()
     * @return int
     */
    protected function calculateAllItemWeight($allItems)
    {
        $purchaseWeight=0;

        foreach ($allItems as $item) {
            $purchaseWeight += $item->getWeight();
        }

        return $purchaseWeight;
    }

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /* @var $result Mage_Shipping_Model_Rate_Result */
        $result = Mage::getModel('shipping/rate_result');

        $destCountryId = $request->getDestCountryId();

        /**
         * Collection of enable offices (select by work_status, max_weight, min_weight and country_id)
         */
        $enableDeliveryxOffices = Mage::getResourceModel('deliveryx/offices_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('country_id', $destCountryId)
            ->addAttributeToFilter('work_status',1)
            ->addAttributeToFilter('max_weight', array('gteq' => $this->calculateAllItemWeight($request->getAllItems())))
            ->addAttributeToFilter('min_weight', array('lteq' => $this->calculateAllItemWeight($request->getAllItems())));

        if ($enableDeliveryxOffices->count()){
            foreach ($enableDeliveryxOffices as $office){
                $result->append($this->_getStandardShippingRate($office->getEntityId(), $office->getNumber(), $office->getShortAddress()));
            }
        }

        if ($enableDeliveryxOffices->count() && $request->getFreeShipping() && $this->getConfigData('free_shipping_enabled')) {
            foreach ($enableDeliveryxOffices as $office) {
                $result->append($this->_getFreeShippingRate($office->getEntityId(), $office->getNumber(), $office->getShortAddress()));
            }
        }

        if ($enableDeliveryxOffices->count()) {
            foreach ($enableDeliveryxOffices as $office) {
                $result->append($this->_getExpressShippingRate($office->getEntityId(), $office->getNumber(), $office->getShortAddress()));
            }
        }

        return $result;
    }

    protected function _getStandardShippingRate($id, $number, $address)
    {
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        /**
         * method name must be written in one word without snake case "_"
         */
        $rate->setMethod('standand_' . $id);
        $rate->setMethodTitle('Office ' . $number . ', address ' . $address . ' standard');

        $rate->setPrice($this->getConfigData('standard_method_price'));
        $rate->setCost(0);

        return $rate;
    }

    protected function _getExpressShippingRate($id, $number, $address)
    {
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        /**
         * method name must be written in one word without snake case "_"
         */
        $rate->setMethod('express_' . $id);
        $rate->setMethodTitle('Office ' . $number . ', address ' . $address . ' express');

        $rate->setPrice($this->getConfigData('express_method_price'));
        $rate->setCost(0);

        return $rate;
    }

    protected function _getFreeShippingRate($id, $number, $address)
    {
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        /**
         * method name must be written in one word without snake case "_"
         */
        $rate->setMethod('freeShipping_' . $id);
        $rate->setMethodTitle('Office ' . $number . ', address ' . $address . ' free shipping');

        $rate->setPrice(0);
        $rate->setCost(0);

        return $rate;
    }

    public function getAllowedMethods()
    {
        return array(
            'standard' => 'Standard',
            'express' => 'Express',
            'freeShipping' => 'Free Shipping',
        );
    }
}
