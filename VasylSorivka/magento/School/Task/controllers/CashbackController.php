<?php

class School_Task_CashbackController extends Mage_Core_Controller_Front_Action
{
    public function cashbackPostAction()
    {
        $allCustomerCashback = $this->getRequest()->getPost('all_customer_cashback');
        $discountCashbackAmount = $this->getRequest()->getPost('cashback_amount');
        $cashbackAction = $this->getRequest()->getPost('cashback_action');

        $quote = Mage::getSingleton('checkout/cart')->getQuote();

        $quoteBseCashbackDiscountAmount = $quote->getBaseCashbackDiscountAmount();
        $customerCashbackAmount = $quote->getCustomer()->getCashbackAmount();

        if ($allCustomerCashback == 1) {
            if ($cashbackAction == 'apply') {
                $this->setBaseCashbackDiscountAmountToQuote($quote, round($customerCashbackAmount, 2));
            }

            if ($cashbackAction == 'cancel') {
                $this->setBaseCashbackDiscountAmountToQuote($quote,0);
            }
        } else {
            if (!isset($discountCashbackAmount) || !is_numeric($discountCashbackAmount) || ($discountCashbackAmount < 0)) {
                Mage::getSingleton('checkout/session')->addError($this->__('Incorrect cashback value'));

                $this->_redirect('checkout/cart');

                return;
            }

            if ($cashbackAction == 'apply') {

                if (($customerCashbackAmount - $quoteBseCashbackDiscountAmount) < $discountCashbackAmount) {
                    Mage::getSingleton('checkout/session')->addError($this->__('Incorrect cashback value'));

                    $this->_redirect('checkout/cart');

                    return;
                }

                if ($quoteBseCashbackDiscountAmount == 0) {
                    $this->setBaseCashbackDiscountAmountToQuote($quote,round($discountCashbackAmount, 2));
                } else {
                    $this->setBaseCashbackDiscountAmountToQuote($quote,round( $quoteBseCashbackDiscountAmount + $discountCashbackAmount, 2));
                }
            }

            if ($cashbackAction == 'cancel') {
                if ($quoteBseCashbackDiscountAmount < $discountCashbackAmount) {
                    Mage::getSingleton('checkout/session')->addError($this->__('Incorrect cashback value'));

                    $this->_redirect('checkout/cart');

                    return;
                }
                $this->setBaseCashbackDiscountAmountToQuote($quote,round($quoteBseCashbackDiscountAmount - $discountCashbackAmount, 2));
            }
        }

        $this->_redirect('checkout/cart');
    }

    protected function setBaseCashbackDiscountAmountToQuote($quote, $baseCashbackDiscountAmount)
    {
        $quote->setBaseCashbackDiscountAmount($baseCashbackDiscountAmount)
            ->collectTotals()
            ->save();
    }
}
