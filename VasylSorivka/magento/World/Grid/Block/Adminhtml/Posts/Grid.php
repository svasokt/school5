<?php
class World_Grid_Block_Adminhtml_Posts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
//        die('test');
        parent::__construct();
         
        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('grid_posts_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);

    }
     
    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'grid/posts_collection';
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
         
        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'index' => 'title'
            )
        );

        $this->addColumn('short_descroption',
            array(
                'header'=> $this->__('Short Descroption'),
                'index' => 'short_description'
            )
        );

        $this->addColumn('descroption',
            array(
                'header'=> $this->__('Descroption'),
                'index' => 'description'
            )
        );
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}