<?php
class World_Insurancetax_Model_Sales_Order_Creditmemo_Total_Insurancetax extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
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

        $insuranceTaxAmount = $order->getInsuranceTaxAmount();
        $baseInsuranceTaxAmount = $order->getBaseInsuranceTaxAmount();

        $creditmemo->setInsuranceTaxAmount($insuranceTaxAmount);
        $creditmemo->setBaseInsuranceTaxAmount($baseInsuranceTaxAmount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $insuranceTaxAmount);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $insuranceTaxAmount);

        return $this;
    }
}

