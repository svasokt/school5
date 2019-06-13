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
            ->addAttributeToSelect('*'); // we use it only for eav , for simple table addFieldToSelect()
//            ->addAttributeToSelect('content')
//            ->addAttributeToSelect('date');
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

        $this->addColumn('status', array(
            'header' => Mage::helper('training_eavgrid')->__('Status'),
            'type' => 'options',
            'index' => 'status',
            'width' => '90',
            'options'   => array(
                1 => Mage::helper('training_eavgrid')->__('Published'),
                0 => Mage::helper('training_eavgrid')->__('Not Published')
            ),
        ));


        /** export */
        $this->addExportType('*/*/exportCsv', Mage::helper('training_eavgrid')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('training_eavgrid')->__('XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('entity');
        $this->getMassactionBlock()
            ->addItem('delete', array(
            'label' => Mage::helper('training_eavgrid')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('training_eavgrid')->__('Are you sure?')
            ))
            ->addItem('publish', array(
                'label' => Mage::helper('training_eavgrid')->__('Publish'),
                'url' => $this->getUrl('*/*/massPublish'),
                'confirm' => Mage::helper('training_eavgrid')->__('Are you sure?')
            ))
            ->addItem('unpublish', array(
                'label' => Mage::helper('training_eavgrid')->__('Unpublish'),
                'url' => $this->getUrl('*/*/massUnpublish'),
                'confirm' => Mage::helper('training_eavgrid')->__('Are you sure?')
            ));
    }


    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}