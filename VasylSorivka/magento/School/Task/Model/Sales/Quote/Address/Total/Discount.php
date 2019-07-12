<?php

class School_Task_Model_Sales_Quote_Address_Total_Discount extends Mage_Sales_Model_Quote_Address_Total_Abstract
{

    public function getLabel()
    {
        return Mage::helper('schooltask')->__('Cashback Points Discount');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $quote = $address->getQuote();

        $baseCashbackDiscountAmount = $this->_getBaseCashbackDiscountAmount();

        if ($baseCashbackDiscountAmount == 0) {
            $this->_setAmount(0);
            $this->_setBaseAmount(0);

            $quote->setCashbackDiscountAmount(0);
            $quote->setBaseCashbackDiscountAmount(0);
        }

        if ($address->getAddressType() == 'billing') {
            return $this;
        }

        if ($this->_canApplyCashbackDiscount($address) && $baseCashbackDiscountAmount) {
            $cashbackDiscountAmount = Mage::app()->getStore()->convertPrice($baseCashbackDiscountAmount);

            $quote->setCashbackDiscountAmount($cashbackDiscountAmount);
            $quote->setBaseCashbackDiscountAmount($baseCashbackDiscountAmount);

            $this->_addAmount((-1) * $cashbackDiscountAmount) ;
            $this->_addBaseAmount((-1) * $baseCashbackDiscountAmount);
        }

        return $this;
    }

    protected function _getBaseCashbackDiscountAmount()
    {
        $quote = Mage::getSingleton('checkout/session')->getQuote();

        return $quote->getBaseCashbackDiscountAmount();
    }

    protected function _canApplyCashbackDiscount(Mage_Sales_Model_Quote_Address $address)
    {
        return (bool) Mage::getStoreConfig('schooltask/schooltask_group/schooltask_enabled');
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        $cashbackDiscountAmount = $address->getCashbackDiscountAmount();

        if (($address->getAddressType() !== 'billing') && ($cashbackDiscountAmount != 0)) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => $this->getLabel(),
                'value' => $cashbackDiscountAmount,
            ));
        }

        return $this;
    }
}
