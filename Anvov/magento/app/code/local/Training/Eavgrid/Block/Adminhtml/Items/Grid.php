<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     training_cron
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Eavgrid_Block_Adminhtml_Items_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();

        /** Set a unique id for our grid */
        $this->setId('entity_id');

        /** Default sort by column */
        $this->setDefaultSort('entity_id');
        $this->setSaveParametersInSession(true);
    }


    protected function _prepareCollection()
    {
        // Instantiate the collection of data to be display on the grid
        $collection = Mage::getModel('complexworld/iphonepost')->getCollection();
        $collection
            ->addAttributeToSelect('title') // we use it only for eav , for simple table addFieldToSelect()
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');
        $collection->load();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }


    // Set every column to be displayed on the grid
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => Mage::helper('training_eavgrid')->__('ID'),
            'sortable' => true,
            'width' => '60',
            'index' => 'entity_id'
        ));
        $this->addColumn('title', array(
            'header' => Mage::helper('training_eavgrid')->__('Title'),
            'index' => 'title',
        ));

        $this->addColumn('content', array(
            'header' => Mage::helper('training_eavgrid')->__('Content'),
            'index' => 'content',
        ));

        $this->addColumn('date', array(
            'header' => Mage::helper('training_eavgrid')->__('Date'),
            'type' => 'datetime',
            'index' => 'date',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}