<?php
class World_Insurancetax_Block_Total_Insurancetax_Insurancetax extends Mage_Sales_Block_Order_Totals
{
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    public function initTotals()
    {
        $order = $this->getSource();
        if ($order->getInsuranceTaxAmount() > 0){
            $this->getParentBlock()->addTotal(
                new Varien_Object(array(
                    'code' => 'insurance_tax',
                    'value' => $order->getInsuranceTaxAmount(),
                    'base_value' => $order->getBaseInsuranceTaxAmount(),
                    'label' => $this->__('Insurance Tax'),
                )),'subtotal');
        }

        return $this;
    }
}

