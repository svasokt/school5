<?php

class World_Grid_Block_Adminhtml_Posts_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
          parent::__construct();
        $this->setId('posts_form');
        $this->setTitle(Mage::helper('grid')->__('Posts Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('grid_posts');
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save',array('id'=>$this->getRequest()->getParam('id'))),
                'method' => 'post'
            )
        );

        $form->setHtmlIdPrefix('posts_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('grid')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getBlockId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('grid')->__('Posts Title'),
            'title'     => Mage::helper('grid')->__('Posts Title'),
            'required'  => true,
        ));

        $fieldset->addField('short_description', 'text', array(
            'name'      => 'short_description',
            'label'     => Mage::helper('grid')->__('Short_Description'),
            'title'     => Mage::helper('grid')->__('Short_Description'),
            'required'  => true,
        ));

        $fieldset->addField('description', 'text', array(
            'name'      => 'description',
            'label'     => Mage::helper('grid')->__('Description'),
            'title'     => Mage::helper('grid')->__('Description'),
            'required'  => true,
        ));




        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}