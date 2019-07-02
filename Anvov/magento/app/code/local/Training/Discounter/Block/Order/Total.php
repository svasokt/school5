<?php
/**
 * Custom total
 *
 * @category    Training
 * @package     Training_Discounter
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Discounter_Block_Order_Total extends Mage_Sales_Block_Order_Totals
{
    public function initTotals()
    {
        $order = $this->getParentBlock()->getOrder();

        if($order->getCustomDiscountAmount() > 0){
            $this->getParentBlock()->addTotal(new Varien_Object(array(
                'code' => 'custom_discount',
                'value' => $order->getCustomDiscountAmount(),
                'base_value' => $order->getBaseCustomDiscountAmount(),
                'label' => 'Custom Discount',
                )),'subtotal');
        }
    }
}
