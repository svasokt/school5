<?php
class School_Deliveryx_Adminhtml_Deliveryx_DeliveryxgridController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/deliveryx');
    }

    /**
     *  Method for admin menu->offices
     */
    public function officesAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('deliveryx')
            ->_title($this->__('Delivery X'));
        return $this;
    }

    /**
     * New action
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit action
     */
    public function editAction()
    {
        $this->_initAction();
        // Get id if available
        $id  = $this->getRequest()->getParam('block_id');
        $model = Mage::getModel('deliveryx/offices');

        if ($id) {
            // Load record
            $model->load($id);
            // Check if record is loaded
            if (!$model->getEntityId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('deliveryx')->__('This office no longer exists.'));
                $this->_redirect('*/*/office');
                return;
            }
        }

        $this->_title($model->getEntityId() ? $model->getNumber() : $this->__('New OFFICE'));
        $data = Mage::getSingleton('adminhtml/session')->getData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('deliveryx_officesgrid', $model);
        $this->_addContent($this->getLayout()
            ->createBlock('deliveryx/adminhtml_offices_officesgrid_edit'))
            ->_addLeft($this->getLayout()->createBlock('deliveryx/adminhtml_offices_officesgrid_edit_tabs'))
            ->renderLayout();
    }

    /**
     * Save action
     */
    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {
            $data = $this->_filterPostData($data);
            //init model and set data
            $model = Mage::getModel('deliveryx/offices');

            if ($id = $this->getRequest()->getParam('block_id')) {
                $model->load($id);
            }

            $model->addData($data);

            Mage::dispatchEvent('deliveryx_offices_prepare_save', array('offices' => $model, 'request' => $this->getRequest()));
            //validating
            if (!$this->_validatePostData($data)) {
                $this->_redirect('*/*/edit', array('block_id' => $model->getId(), '_current' => true));
                return;
            }
            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('cms')->__('The office has been saved.'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('block_id' => $model->getId(), '_current'=>true));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/offices');
                return;

            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('adminhtml')->__('An error occurred while saving the office.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('block_id' => $this->getRequest()->getParam('block_id')));
            return;
        }

        $this->_redirect('*/*/offices');
    }

    protected function _filterPostData($data)
    {
        $data = $this->_filterDates($data, array('custom_theme_from', 'custom_theme_to'));
        return $data;
    }

    protected function _validatePostData($data)
    {
        $errorNo = true;
        if (!empty($data['layout_update_xml']) || !empty($data['custom_layout_update_xml'])) {
            /** @var $validatorCustomLayout Mage_Adminhtml_Model_LayoutUpdate_Validator */
            $validatorCustomLayout = Mage::getModel('adminhtml/layoutUpdate_validator');
            if (!empty($data['layout_update_xml']) && !$validatorCustomLayout->isValid($data['layout_update_xml'])) {
                $errorNo = false;
            }
            if (!empty($data['custom_layout_update_xml'])
                && !$validatorCustomLayout->isValid($data['custom_layout_update_xml'])) {
                $errorNo = false;
            }
            foreach ($validatorCustomLayout->getMessages() as $message) {
                $this->_getSession()->addError($message);
            }
        }
        return $errorNo;
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('block_id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('deliveryx/offices');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('deliveryx')->__('The office has been deleted.'));
                // go to grid
                $this->_redirect('*/*/offices');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('block_id' => $id));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('deliveryx')->__('Unable to find a office to delete.'));
        // go to grid
        $this->_redirect('*/*/office');
    }

    public function massDeleteAction()
    {
        $officesIds = $this->getRequest()->getParam('deliveryx');
        if(!is_array($officesIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('deliveryx')->__('Please select office(s).'));
        } else {
            try {
                $offies = Mage::getModel('deliveryx/offices');
                foreach ($officesIds as $officeId) {
                    $offies
                        ->load($officeId)
                        ->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were deleted.', count($officesIds))
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/offices');
    }

    /**
     * Export offices list to csv
     */
    public function exportCsvAction()
    {
        $fileName   = 'offices.csv';
        $grid       = $this->getLayout()->createBlock('deliveryx/adminhtml_offices_officesgrid_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $grid);
    }

    /**
     * Export offices list to xml
     */
    public function exportXmlAction()
    {
        $fileName   = 'offices.xml';
        $grid       = $this->getLayout()->createBlock('deliveryx/adminhtml_offices_officesgrid_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}
