<?php
class School_Luxurytax_Model_Total_Luxurytax_Invoice extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
	public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
    $order = $invoice->getOrder();
	$luxuryTaxAmount = $order->getLuxuryTaxAmount();
	$baseLuxuryTaxAmount = $order->getBaseLuxuryTaxAmount();

	$invoice->setLuxuryTaxAmount($luxuryTaxAmount);
	$invoice->setBaseLuxuryTaxAmount($baseLuxuryTaxAmount);

	$invoice->setGrandTotal($invoice->getGrandTotal() + $luxuryTaxAmount);
    $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseLuxuryTaxAmount);

    return $this;
	}
}
