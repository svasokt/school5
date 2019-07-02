<?php

class World_Insurancetax_Model_Sales_Quote_Address_Total_Insurancetax extends Mage_Sales_Model_Quote_Address_Total_Abstract
{

    public function getLabel()
    {
        return Mage::helper('insurancetax')->__('Insurance Tax');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $quote = $address->getQuote();
        $this->_setAmount(0);
        $this->_setBaseAmount(0);

        $quote->setInsuranceTaxAmount(0);
        $quote->setBaseInsuranceTaxAmount(0);

        if ($address->getAddressType() == 'billing') {
            return $this;
        }

        $baseInsuranceTaxAmount = $this->_getBaseInsuranceTaxAmount();

        if ($this->_canApplyInsuranceTax($address) && $baseInsuranceTaxAmount) {
            $insuranceTaxAmount = Mage::app()->getStore()->convertPrice($baseInsuranceTaxAmount);

            $quote->setInsuranceTaxAmount($insuranceTaxAmount);
            $quote->setBaseInsuranceTaxAmount($baseInsuranceTaxAmount);

            $this->_addAmount($insuranceTaxAmount);
            $this->_addBaseAmount($baseInsuranceTaxAmount);
        }
        return $this;
    }

    protected function _getBaseInsuranceTaxAmount()
    {
        return (float) Mage::getStoreConfig('insurancetax/insurancetax_group/insurancetax_insurance_tax_amount');
    }

    protected function _canApplyInsuranceTax(Mage_Sales_Model_Quote_Address $address)
    {
        $result = false;
        $isEnabled = Mage::getStoreConfig('insurancetax/insurancetax_group/insurancetax_enabled');
        $priceBoundary = (float) Mage::getStoreConfig('insurancetax/insurancetax_group/insurancetax_price');
        if ($isEnabled) {
            foreach ($this->_getAddressItems($address) as $item) {
                if (!$item->getData('parent_item_id') && $item->getData('price') >= $priceBoundary) {
                    $result = true;
                    break;
                }
            }
        }
        return $result;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        $insuranceTaxAmount = $address->getInsuranceTaxAmount();
        if ($address->getAddressType() !== 'billing' && $insuranceTaxAmount > 0){
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => $this->getLabel(),
                'value' => $insuranceTaxAmount,
            ));
        }
        return $this;
    }

}