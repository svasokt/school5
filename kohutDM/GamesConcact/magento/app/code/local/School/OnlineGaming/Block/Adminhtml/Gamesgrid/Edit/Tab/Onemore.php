<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Tab_Onemore extends Mage_Adminhtml_Block_Widget_Form
{
//    /**
//     * Init form
//     */
//    public function __construct()
//    {
//        parent::__construct();
//        $this->setId('edit_form');
//        $this->setTitle(Mage::helper('adminhtml')->__('Block Information'));
//    }

    protected function _prepareForm()
    {
        $model = Mage::registry('onlinegaming_gamesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
//        $form = new Varien_Data_Form(
//            array('id' => 'edit_form', 'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))), 'method' => 'post')
//        );
//        $this->setForm($form);

        //$form->setHtmlIdPrefix('block_');
        $fieldset = $form->addFieldset('game_form', array('legend'=>Mage::helper('adminhtml')->__('General Information'), 'class' => 'fieldset-wide'));

        //if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
        //}

        $fieldset->addField('description', 'editor', array(
            'name'      => 'description',
            'label'     => Mage::helper('adminhtml')->__('Description'),
            'title'     => Mage::helper('adminhtml')->__('Description'),
            'style'     => 'height:15em',
            'required'  => true,
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
        ));

        $form->setValues($model->getData());
        //$form->setUseContainer(true);

        return parent::_prepareForm();
    }
}
//{
//    protected function _prepareForm()
//    {
//        $form = new Varien_Data_Form();
//        $this->setForm($form);
//        $fieldset = $form->addFieldset('game_form',
//            array('legend'=>'ref information'));
//
//        $fieldset->addField('description', 'text',
//            array(
//                'label' => 'Description',
//                'class' => 'required-entry',
//                'required' => true,
//                'name' => 'description',
//            ));
//
//        if ( Mage::registry('onlinegaming_gamesgrid') )
//        {
//            $form->setValues(Mage::registry('onlinegaming_gamesgrid')->getData());
//        }
//
//        return parent::_prepareForm();
//    }
//}