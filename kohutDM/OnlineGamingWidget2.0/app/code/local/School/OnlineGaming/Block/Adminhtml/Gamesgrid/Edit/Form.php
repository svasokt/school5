<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array('id' => 'edit_form',
                  'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                  'method' => 'post',
                  'enctype' => 'multipart/form-data')
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
//{
//    /**
//     * Init form
//     */
//    public function __construct()
//    {
//        parent::__construct();
//        $this->setId('block_form');
//        $this->setTitle(Mage::helper('adminhtml')->__('Block Information'));
//    }
//
//    protected function _prepareForm()
//    {
//        $model = Mage::registry('onlinegaming_gamesgrid');
//
//        $form = new Varien_Data_Form(
//            array('id' => 'edit_form', 'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))), 'method' => 'post')
//        );
//
//        $form->setHtmlIdPrefix('block_');

//        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('adminhtml')->__('General Information'), 'class' => 'fieldset-wide'));
//
//        if ($model->getId()) {
//            $fieldset->addField('entity_id', 'hidden', array(
//                'name' => 'entity_id',
//            ));
//        }
//
//        $fieldset->addField('title', 'text', array(
//            'name'      => 'title',
//            'label'     => Mage::helper('adminhtml')->__('Block Title'),
//            'title'     => Mage::helper('adminhtml')->__('Block Title'),
//            'required'  => true,
//        ));
//
//        $fieldset->addField('description', 'editor', array(
//            'name'      => 'description',
//            'label'     => Mage::helper('adminhtml')->__('Description'),
//            'title'     => Mage::helper('adminhtml')->__('Description'),
//            'style'     => 'height:15em',
//            'required'  => true,
//            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
//        ));
//
//        $fieldset->addField('creator', 'text', array(
//            'name'      => 'creator',
//            'label'     => Mage::helper('adminhtml')->__('Creator'),
//            'title'     => Mage::helper('adminhtml')->__('Creator'),
//            'required'  => true,
//        ));
//
//        $form->setValues($model->getData());
//        $form->setUseContainer(true);
//        $this->setForm($form);
//
//        return parent::_prepareForm();
//    }
//
//}
