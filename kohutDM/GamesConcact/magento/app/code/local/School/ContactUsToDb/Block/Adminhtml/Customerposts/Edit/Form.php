<?php
class School_ContactUsToDb_Block_Adminhtml_Customerposts_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('post_form');
        $this->setTitle(Mage::helper('school_contactustodb')->__('Post Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('contactustodb_customerposts');

        $form = new Varien_Data_Form(
            array('id' => 'edit_form', 'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))), 'method' => 'post')
        );

        $form->setHtmlIdPrefix('post_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('school_contactustodb')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getId()) {
            $fieldset->addField('post_id', 'hidden', array(
                'name' => 'post_id',
            ));
        }

        $fieldset->addField('answer_status', 'hidden', array(
            'name' => 'answer_status',
        ));

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('school_contactustodb')->__('Name'),
            'title'     => Mage::helper('school_contactustodb')->__('Name'),
            'readonly' => true,
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('school_contactustodb')->__('Email'),
            'title'     => Mage::helper('school_contactustodb')->__('Email'),
            'readonly' => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'name'      => 'telephone',
            'label'     => Mage::helper('school_contactustodb')->__('Telephone'),
            'title'     => Mage::helper('school_contactustodb')->__('Telephone'),
            'readonly' => true,
        ));

        $fieldset->addField('comment', 'textarea', array(
            'name'      => 'comment',
            'label'     => Mage::helper('school_contactustodb')->__('Comment'),
            'title'     => Mage::helper('school_contactustodb')->__('Comment'),
            'readonly' => true,
        ));

        $fieldset->addField('answer', 'editor', array(
            'name'      => 'answer',
            'label'     => Mage::helper('school_contactustodb')->__('Answer'),
            'title'     => Mage::helper('school_contactustodb')->__('Answer'),
            'style'     => 'height:15em',
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
            'autocomplete' => "on"
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
