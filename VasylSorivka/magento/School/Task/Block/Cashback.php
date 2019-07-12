<?php
class School_Task_Block_Cashback extends  Mage_Core_Block_Template
{
    public function getCustomerCashback()
    {
        $cashbackAmount = 0;
        $customer = Mage::getSingleton('customer/session')->getCustomer();

        if ($customer->getId()) {
           $cashbackAmount = $customer->getCashbackAmount();

        }

        return $cashbackAmount;
    }

    public function getFormActionUrl()
    {
        return $this->getUrl('schooltask/cashback/cashbackPost');
    }

    public function getQuote()
    {
        return Mage::getSingleton('checkout/cart')->getQuote();
    }
}
