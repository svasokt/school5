<?php
class School_Task_Block_Total_Discount_Discount extends Mage_Sales_Block_Order_Totals
{
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    public function initTotals()
    {
        $order = $this->getSource();
        if ($order->getCashbackDiscountAmount() < 0){
            $this->getParentBlock()->addTotal(
                new Varien_Object(array(
                    'code' => 'cashback_discount',
                    'value' => $order->getCashbackDiscountAmount(),
                    'base_value' => $order->getBaseCashbackDiscountAmount(),
                    'label' => $this->__('Cashback Discount'),
                )),'subtotal');
        }

        return $this;
    }
}
