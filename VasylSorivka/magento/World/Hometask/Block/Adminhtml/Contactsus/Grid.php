<?php
class World_Hometask_Block_Adminhtml_Contactsus_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {

       parent::__construct();
         
        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('hometask_contactsus_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);

    }
     
    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'hometask/contactsus_collection';
    }

    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
         
        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {

        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id'
            )
        );
         
        $this->addColumn('name',
            array(
                'header'=> $this->__('Name'),
                'index' => 'name'
            )
        );

        $this->addColumn('email',
            array(
                'header'=> $this->__('Email'),
                'index' => 'email'
            )
        );

        $this->addColumn('telephone',
            array(
                'header'=> $this->__('Telephone'),
                'index' => 'telephone',
            )
        );
        $this->addColumn('status',
            array(
                'header'=> $this->__('Answered'),
                'index' => 'status',
                'type'      => 'options',
                'options'   => Mage::getModel('hometask/source_status')->toArray(),
            )
        );
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
