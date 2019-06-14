<?php
require_once(Mage::getModuleDir('controllers','Mage_Contacts').DS.'IndexController.php');

class School_ContactUsToDb_IndexController extends Mage_Contacts_IndexController
{
    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ( $post ) {
            $customerPostModel = Mage::getModel("contactustodb/customerposts")
                ->setName($post['name'])
                ->setComment($post['comment'])
                ->setEmail($post['email'])
                ->setTelephone($post['telephone'])
                ->save();
            Mage::register('contactustodb/customerposts', $customerPostModel);

            Mage::getSingleton('customer/session')->addSuccess(Mage::helper('school_contactustodb')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
            $this->_redirect('*/*/');

            return;

        } else {
            $this->_redirect('*/*/');
        }
    }
}
