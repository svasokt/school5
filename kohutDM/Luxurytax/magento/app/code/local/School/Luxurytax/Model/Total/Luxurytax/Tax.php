<?php
class School_Luxurytax_Model_Total_Luxurytax_Tax extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $baseLuxuryTax = Mage::getStoreConfig('luxurytax_options/luxurytax_group/luxurytax_base_luxury_tax_amount');
        $quote = $address->getQuote();
        $this->_setBaseAmount(0);
        $this->_setAmount(0);

        if ($this->_canApplyLuxuryTax($address)){
            $luxurytax = Mage::app()->getStore()->convertPrice($baseLuxuryTax);
            $this->_addAmount($luxurytax);
            $this->_addBaseAmount($baseLuxuryTax);

        	$quote->setLuxuryTaxAmount($address->getLuxuryTaxAmount());
            $quote->setBaseLuxuryTaxAmount($address->getBaseLuxuryTaxAmount());
        }
    	return $this;
	}

    protected function _canApplyLuxuryTax($address)
    {
        $result = false;
        foreach ($address->getAllItems() as $item){
            if ($item->getPrice() >= Mage::getStoreConfig('luxurytax_options/luxurytax_group/luxurytax_price_value')){
            return $result = true;
            }
        }
        return $result;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
	    $amount = $address->getLuxuryTaxAmount();
    	if ($amount != 0){
        	$address->addTotal(array(
            'code' => $this->getCode(),
            'title' => Mage::helper('school_luxurytax')
                        ->__(Mage::getStoreConfig('luxurytax_options/luxurytax_group/luxurytax_fetch_label')),
            'value' => $amount,
	        ));
        }
    	return $this;
    }
}
