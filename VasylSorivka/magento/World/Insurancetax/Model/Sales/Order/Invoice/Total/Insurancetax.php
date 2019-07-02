<?php
class World_Insurancetax_Model_Sales_Order_Invoice_Total_Insurancetax extends Mage_Sales_Model_Order_Invoice_Total_Abstract
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

        $insuranceTaxAmount = $order->getInsuranceTaxAmount();
        $baseInsuranceTaxAmount = $order->getBaseInsuranceTaxAmount();

        $invoice->setInsuranceTaxAmount($insuranceTaxAmount);
        $invoice->setBaseInsuranceTaxAmount($baseInsuranceTaxAmount);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $insuranceTaxAmount);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $insuranceTaxAmount);

        return $this;
    }
}

