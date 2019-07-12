<?php
class School_Task_Model_Observer
{

    public function setDiscountCashback($observer)
    {
        $order = $observer->getEvent()->getOrder();
        $customer = $order->getCustomer();
        $baseCashbackDiscountAmount = $order->getQuote()->getBaseCashbackDiscountAmount();

        if ($order->getId() && $customer->getId()) {

            $grandTotal = $order->getBaseGrandTotal();
            $discontCashback = $this->calcDiscountCashback($grandTotal);

            $newCustomerCashbackAmount = $customer->getCashbackAmount() - $baseCashbackDiscountAmount + $discontCashback;

            $customer->setCashbackAmount($newCustomerCashbackAmount)->save();

        }
    }

    protected function calcDiscountCashback($grandTotal)
    {
        $percent = (float) Mage::getStoreConfig('schooltask/schooltask_group/schooltask_cashback_percent');
        $isEnabled = Mage::getStoreConfig('schooltask/schooltask_group/schooltask_enabled');
        $result = 0;

        if (!$isEnabled) {
            return false;
        }

        if ($grandTotal > 0) {
            $result = ($grandTotal * $percent) / 100;
        }

        return $result;
    }
}
