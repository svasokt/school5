<?php
/**
 * Custom total
 *
 * @category    Training
 * @package     Training_Discounter
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Discounter_Model_Sales_Quote_Address_Total_Fee extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('custom_discount');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        /** system.xml configs */
        $discountBoundry = Mage::getStoreConfig('discounter/discounter_group/discounter_input_boundry');
        $baseDiscount = Mage::getStoreConfig('discounter/discounter_group/discounter_input_discount');
        $allowDiscount = Mage::getStoreConfig('discounter/discounter_group/discounter_select');

        $quote = $address->getQuote();

        $this->_setAmount(0);
        $this->_setBaseAmount(0);

        $quote->setCustomDiscountAmount(0);
        $quote->setBaseCustomDiscountAmount(0);

        if($allowDiscount == '1') {
            if($address->getData('subtotal') >  $discountBoundry) {
                $discount = Mage::app()->getStore()->convertPrice($baseDiscount);

                $address->setBaseCustomDiscountAmount($baseDiscount);
                $address->setCustomDiscountAmount($discount);
                $address->setBaseGrandTotal($address->getBaseGrandTotal() - $baseDiscount);
                $address->setGrandTotal($address->getGrandTotal() - $discount);
            }
        }
        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        $amount = $address->getCustomDiscountAmount();
        $title = Mage::helper('training_discounter')->__('Custom Discount');
        if ($address->getCustomDiscountAmount() > 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => $title,
                'value' => $amount,
            ));
        }
        return $this;
    }
}