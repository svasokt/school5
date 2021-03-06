<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('onlinegaming_gamesgrid_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        return 'onlinegaming/eavgames_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->addAttributeToSelect('title');
        $collection->addAttributeToSelect('creator');
        $collection->addAttributeToSelect('description');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('id',
            array(
                'header' => $this->__('ID'),
                'align' => 'left',
                'width' => '30px',
                'index' => 'entity_id'
            )
        );

        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'title'
            )
        );

        $this->addColumn('creator',
            array(
                'header'=> $this->__('Creator'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'creator'
            )
        );

        $this->addColumn('description',
            array(
                'header'=> $this->__('Description'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'description'
            )
        );
        $this->addExportType('*/*/exportCsv', $this->__('CSV'));
        $this->addExportType('*/*/exportXml', $this->__('XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('block_id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('onlinegaming');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'    => Mage::helper('customer')->__('Delete'),
            'url'      => $this->getUrl('*/*/massDelete'),
            'confirm'  => Mage::helper('customer')->__('Are you sure?')
        ));

        $groups = $this->helper('customer')->getGroups()->toOptionArray();

        array_unshift($groups, array('label'=> '', 'value'=> ''));

        return $this;
    }
}
