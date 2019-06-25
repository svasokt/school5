<?php
class School_Luxurytax_Model_Total_Luxurytax_Creditmemo extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();
        $luxuryTaxAmount = $order->getLuxuryTaxAmount();
        $baseLuxuryTaxAmount = $order->getBaseLuxuryTaxAmount();

        $creditmemo->setLuxuryTaxAmount($luxuryTaxAmount);
        $creditmemo->setBaseLuxuryTaxAmount($baseLuxuryTaxAmount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $luxuryTaxAmount);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $baseLuxuryTaxAmount);

        return $this;
    }
}
