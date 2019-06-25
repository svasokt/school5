<?php
class School_Luxurytax_Block_Total_Luxurytax_Luxurytax extends Mage_Sales_Block_Order_Totals
{
	public function initTotals()
    {
	    $order = $this->getParentBlock()->getOrder();
    	if($order->getLuxuryTaxAmount() > 0){
        	$this->getParentBlock()->addTotal(new Varien_Object(array(
        	'code' => 'luxury Tax',
            'value' => $order->getLuxuryTaxAmount(),
            'base_value' => $order->getBaseLuxuryTaxAmount(),
            'label' => Mage::helper('school_luxurytax')
                        ->__(Mage::getStoreConfig('luxurytax_options/luxurytax_group/luxurytax_fetch_label')),
            ))/**,'subtotal'**/);
    	}
    	return $this;
	}
}
