<?php
/**
 * Training Contact Form block
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Block_Adminhtml_Message_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Training_Contact_Block_Adminhtml_Message_Edit_Form constructor.
     * @param array $args
     * @throws Varien_Exception
     */
    public function __construct(array $args = array())
    {
        parent::__construct($args);

        $this->setId('training_contact_message');
        $this->setTitle($this->__('Message information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('email');

        $form = new Varien_Data_Form(array(
            'id'      => 'edit_form',
            'action'  => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'  => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'   => Mage::helper('checkout')->__('Message information'),
            'class'    => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('message_id', 'hidden', array(
                'name' => 'message_id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name'   => 'name',
            'label'  => Mage::helper('checkout')->__('Name'),
            'title'  => Mage::helper('checkout')->__('Name'),
            'disabled' => true,
        ));


        $fieldset->addField('email', 'text', array(
            'name'   => 'email',
            'label'  => Mage::helper('checkout')->__('Email'),
            'title'  => Mage::helper('checkout')->__('Email'),
            'disabled' => true,

        ));

        $fieldset->addField('telephone', 'text', array(
            'name'   => 'telephone',
            'label'  => Mage::helper('checkout')->__('Telephone'),
            'title'  => Mage::helper('checkout')->__('Telephone'),
            'disabled' => true,
        ));

        $fieldset->addField('comment', 'textarea', array(
            'name'   => 'comment',
            'label'  => Mage::helper('checkout')->__('Comment'),
            'title'  => Mage::helper('checkout')->__('Comment'),
            'disabled' => true,
        ));

        $fieldset->addField('answer', 'textarea', array(
            'name'   => 'answer',
            'label'  => Mage::helper('checkout')->__('Answer'),
            'title'  => Mage::helper('checkout')->__('Answer'),
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('checkout')->__('Answered'),
            'required'  => true,
            'name'      => 'status',
            'values' => array('1' => 'Yes','0' => 'No')
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm(); // TODO: Change the autogenerated stub
    }
}
