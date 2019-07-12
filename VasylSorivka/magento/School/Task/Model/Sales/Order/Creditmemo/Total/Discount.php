<?php
class School_Task_Model_Sales_Order_Creditmemo_Total_Discount extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
/**
* Collect total
*
* @param Mage_Sales_Model_Order_Creditmemo $creditmemo
* @return $this|Mage_Sales_Model_Order_Creditmemo_Total_Abstract
* @throws Varien_Exception
*/
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();

        $cashbackDiscountAmount = $order->getCashbackDiscountAmount();
        $basecCashbackDiscountAmount = $order->getBaseCashbackDiscountAmount();

        $creditmemo->setCashbackDiscountAmount($cashbackDiscountAmount);
        $creditmemo->setBaseCashbackDiscountAmount($basecCashbackDiscountAmount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $cashbackDiscountAmount);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $basecCashbackDiscountAmount);

        return $this;
    }
}

