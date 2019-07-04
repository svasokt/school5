<?php
class School_OnlineGaming_Model_System_Config_Source_Widget_Gamesforselect
{

    protected $_options;

    public function toOptionArray($isMultiselect=false)
    {
        if (!$this->_options) {
            $options=[];
            $this->_options = Mage::getModel('onlinegaming/eavgames')
                ->getCollection()
                ->addAttributeToSelect('title')
                ->exportToArray();
//            die (var_dump($this->_options));
            foreach ($this->_options as $option){
                array_unshift($options, array('value'=>$option['entity_id'], 'label'=> $option['title']));
            }
        }

//        $options = $this->_options;
        if(!$isMultiselect){
            array_unshift($options, array('value'=>'', 'label'=> Mage::helper('adminhtml')->__('--Please Select--')));
        }
//            die (var_dump($options));
        return $options;
    }
}
