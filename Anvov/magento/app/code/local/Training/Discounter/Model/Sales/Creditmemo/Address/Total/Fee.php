<?php
/**
 * Custom total
 *
 * @category    Training
 * @package     Training_Checkout
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Discounter_Model_Sales_Creditmemo_Address_Total_Fee extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    protected $_code = 'custom_discount';

    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();
        $customDiscount = $order->getCustomDiscountAmount();
        $baseCustomDiscountAmount = $order->getBaseCustomDiscountAmount();

        $creditmemo->setCustomDiscountAmount($customDiscount);
        $creditmemo->setBaseCustomDiscountAmount($baseCustomDiscountAmount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() - $customDiscount);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() - $baseCustomDiscountAmount);

        return $this;
    }
}
