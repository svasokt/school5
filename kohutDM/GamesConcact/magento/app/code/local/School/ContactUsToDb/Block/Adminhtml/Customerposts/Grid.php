<?php
class School_ContactUsToDb_Block_Adminhtml_Customerposts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('contactustodb_customerposts_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        return 'contactustodb/customerposts_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->addFieldToSelect('post_id');
        $collection->addFieldToSelect('name');
        $collection->addFieldToSelect('telephone');
        $collection->addFieldToSelect('email');
        $collection->addFieldToSelect('answer_status');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('post_id',
            array(
                'header' => $this->__('ID'),
                'align' => 'left',
                'width' => '30px',
                'index' => 'post_id'
            )
        );

        $this->addColumn('name',
            array(
                'header'=> $this->__('Name'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'name'
            )
        );

        $this->addColumn('email',
            array(
                'header'=> $this->__('Email'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'email'
            )
        );

        $this->addColumn('telephone',
            array(
                'header'=> $this->__('Telephone'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'telephone'
            )
        );

        $this->addColumn('answer_status',
            array(
                'header'=> $this->__('Answer_status'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'answer_status'
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('post_id' => $row->getId()));
    }
}