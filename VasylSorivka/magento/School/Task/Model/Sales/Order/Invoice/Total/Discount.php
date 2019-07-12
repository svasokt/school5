<?php
class School_Task_Model_Sales_Order_Invoice_Total_Discount extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    /**
     * Collect total
     *
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @throws Varien_Exception
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $order = $invoice->getOrder();

        $cashbackDiscountAmount = $order->getCashbackDiscountAmount();
        $baseCashbackDiscountAmount = $order->getBaseCashbackDiscountAmount();

        $invoice->setCashbackDiscountAmount($cashbackDiscountAmount);
        $invoice->setBaseInsuranceTaxAmount($baseCashbackDiscountAmount);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $cashbackDiscountAmount);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $cashbackDiscountAmount);

        return $this;
    }
}

