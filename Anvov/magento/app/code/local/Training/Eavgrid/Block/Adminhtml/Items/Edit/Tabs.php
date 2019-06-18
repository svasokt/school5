<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Eavgrid
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Eavgrid_Block_Adminhtml_Items_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('eavgrid_tabs');
        // $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('training_eavgrid')->__('Custom tabs'));
    }


    protected function _beforeToHtml()
    {
        $this->addTab(
            'training_eavgrid_items_edit_form',
            array(
                'label'   => Mage::helper('training_eavgrid')->__('Edit main'),
                'title'   => Mage::helper('training_eavgrid')->__('Edit main'),
                'url' => $this->getUrl('*/eavgrid/edit'),
//                'active' => true
            )
        );

        $this->addTab(
            'training_eavgrid_items_edit_tabs_additional',
            array(
                'label'   => Mage::helper('training_eavgrid')->__('Additional info'),
                'title'   => Mage::helper('training_eavgrid')->__('Additional info'),
                'url' => $this->getUrl('*/eavgrid/additional')
            )
        );

        $this->addTab(
            'training_cron_grid',
            array(
                'label'   => Mage::helper('training_eavgrid')->__('Additional Grid'),
                'title'   => Mage::helper('training_eavgrid')->__('Additional Grid'),
                'url' => $this->getUrl('*/eavgrid/adgrid'),
            )
        );
        return parent::_beforeToHtml();
    }
}