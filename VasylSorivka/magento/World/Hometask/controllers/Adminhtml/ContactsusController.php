<?php
class World_Hometask_Adminhtml_ContactsusController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('hometask/contactsus');
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_title($this->__("Contacts Us"));
        $this->renderLayout();
    }

    public function editAction()
    {

        $id = $this->getRequest()->getParam('id');

        Mage::register('hometask_contactsus', Mage::getModel('hometask/contactsus')->load($id));

        $this->loadLayout();

        $this->_addLeft($this->getLayout()->createBlock('hometask/adminhtml_contactsus_edit_tabs'));

        $this->_addContent($this->getLayout()->createBlock('hometask/adminhtml_contactsus_edit'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $block = Mage::getModel('hometask/contactsus')
            ->setId($this->getRequest()->getParam('id'))
            ->delete();
        if ($block->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Post was deleted successfully!');
        }
        $this->_redirect('*/*/');
    }


    public function saveAction()
    {
        try {
            $params = $this->getRequest()->getParams();

            $post = Mage::getModel('hometask/contactsus')->load($params['id']);

            if (!$post->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the post');
            } else {
                $post->setData('status', $params['status'])
                     ->setData('response', $params['response']);
                $post->save();

                if ($params['is_send'] == 1) {
                    if ($post->getStatus() == 1) {
                        Mage::getSingleton('adminhtml/session')->addError('change field Answered');
                        $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'edit'), array('id' => $post->getId()));
                    } else if (strlen(trim($post->getResponse())) == 0) {
                        Mage::getSingleton('adminhtml/session')->addError('field Response - empty !!!');
                        $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'edit'), array('id' => $post->getId()));
                    } else {

                        /* @var $mailTemplate Mage_Core_Model_Email_Template */
                        $mailTemplate = Mage::getModel('core/email_template')
                            ->setType('html')
                            ->setFromEmail('admin@store.com')
                            ->setBody($post->getResponse())
                            ->setToName($post->getName())
                            ->setToEmail($post->getEmail());
//                         ->send();

                        $post->setStatus('1')
                             ->save();

                        Mage::getSingleton('adminhtml/session')->addSuccess('Response send to - ' . $post->getEmail() . '!');
                        Mage::getSingleton('adminhtml/session')->addSuccess('Post was saved successfully!');

                        $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'index'), array('id' => $post->getId()));
                    }
                } else {
                    $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'edit'), array('id' => $post->getId()));
                }
            }

        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($post->getData());
            return $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
        }
    }
}
