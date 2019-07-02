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
        $discountBoundry = (float)Mage::getStoreConfig('discounter/discounter_group/discounter_input_boundry');
        $baseDiscount = (float)Mage::getStoreConfig('discounter/discounter_group/discounter_input_discount');
        $allowDiscount = (float)Mage::getStoreConfig('discounter/discounter_group/discounter_select');

        $quote = $address->getQuote();

        /** set 0 in address */
        $this->_setAmount(0);
        $this->_setBaseAmount(0);

        /** set 0 in quote, level lower */
        $quote->setCustomDiscountAmount(0);
        $quote->setBaseCustomDiscountAmount(0);

        /**  $address->getDiscountAmount() - it`s core discount, we need to exclude case with double discount*/
        if($allowDiscount == '1') {
            if($address->getData('subtotal') >  $discountBoundry && $address->getDiscountAmount() == 0) {
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
