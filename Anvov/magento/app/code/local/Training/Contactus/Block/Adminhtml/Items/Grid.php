<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Contactus
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Contactus_Block_Adminhtml_Items_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Training_Contactus_Block_Adminhtml_Items_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();

        /** Set a unique id for our grid */
        $this->setId('contactus_id');

        /** Default sort by column */
        $this->setDefaultSort('contactus_id');
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return $this|Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        // Instantiate the collection of data to be display on the grid
        $collection = Mage::getModel('contactus/contactus')->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('contactus_id', array(
            'header' => Mage::helper('training_contactus')->__('ID'),
            'sortable' => true,
            'width' => '60',
            'index' => 'contactus_id'
        ));
        $this->addColumn('name', array(
            'header' => Mage::helper('training_contactus')->__('Name'),
            'index' => 'name',
        ));

        $this->addColumn('email', array(
            'header' => Mage::helper('training_contactus')->__('Email'),
            'index' => 'email',
        ));

        $this->addColumn('telephone', array(
            'header' => Mage::helper('training_contactus')->__('Phone'),
            'index' => 'telephone',
        ));
        $this->addColumn('comment', array(
            'header' => Mage::helper('training_contactus')->__('Comment'),
            'index' => 'comment',
        ));
        $this->addColumn('answer', array(
            'header' => Mage::helper('training_contactus')->__('Answer'),
            'index' => 'answer',
        ));
        $this->addColumn('timestamp', array(
            'header' => Mage::helper('training_contactus')->__('Date'),
            'index' => 'timestamp',
            'type' => 'datetime'
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('training_contactus')->__('Status'),
            'type' => 'options',
            'index' => 'status',
            'width' => '90',
            'options'   => array(
                1 => Mage::helper('training_contactus')->__('Answered'),
                0 => Mage::helper('training_contactus')->__('Not Answered')
            ),
        ));


        /** export */
        $this->addExportType('*/*/exportCsv', Mage::helper('training_contactus')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('training_contactus')->__('XML'));

        return parent::_prepareColumns();
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid|void
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('contactus_id');
        $this->getMassactionBlock()->setFormFieldName('contactus');
        $this->getMassactionBlock()
//            ->addItem('answer', array(
//                'label' => Mage::helper('training_contactus')->__('Answer'),
//                'url' => $this->getUrl('*/*/massPublish'),
//                'confirm' => Mage::helper('training_contactus')->__('Are you sure?')
//            ))
            ->addItem('delete', array(
                'label' => Mage::helper('training_contactus')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('training_contactus')->__('Are you sure?')
            ));
    }

    /**
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
