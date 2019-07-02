<?php
/**
 * Custom total
 *
 * @category    Training
 * @package     Training_Checkout
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Discounter_Model_Sales_Invoice_Address_Total_Fee extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    protected $_code = 'custom_discount';

    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $order = $invoice->getOrder();
        $customDiscount = $order->getCustomDiscountAmount();
        $baseCustomDiscountAmount = $order->getBaseCustomDiscountAmount();

        $invoice->setData("custom_discount",$customDiscount);
        $invoice->setData("base_custom_discount",$baseCustomDiscountAmount);
        $invoice->setGrandTotal($invoice->getGrandTotal() - $customDiscount);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() - $baseCustomDiscountAmount);

        return $this;
    }
}
