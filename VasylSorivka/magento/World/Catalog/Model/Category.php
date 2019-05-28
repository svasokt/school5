<?php
class World_Catalog_Model_Category extends Mage_Catalog_Model_Category
{
    /**
     * Retrieve Name data wrapper
     *
     * @return string
     */
    public function getName()
    {
        return 'category_'.$this->_getData('name');
    }
}