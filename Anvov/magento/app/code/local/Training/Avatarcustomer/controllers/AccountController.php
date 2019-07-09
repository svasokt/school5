<?php
/**
 * Avatarcustomer  Account controller
 *
 * @category   Mage
 * @package    Training_Avatarcustomer
 * @author      Magento Core Team <core@magentocommerce.com>
 */

require_once 'Mage/Customer/controllers/AccountController.php';

class Training_Avatarcustomer_AccountController extends Mage_Customer_AccountController
{
    /**
     * Rewrite save method on edition form
     *
     * @return $this|Mage_Core_Controller_Varien_Action|Mage_Customer_AccountController|void
     */
    public function editPostAction()
    {
        if (!$this->_validateFormKey()) {
            return $this->_redirect('*/*/edit');
        }
        if ($this->getRequest()->isPost()) {
            /** @var $customer Mage_Customer_Model_Customer */
            $customer = $this->_getSession()->getCustomer();
            $customer->setOldEmail($customer->getEmail());
            /** @var $customerForm Mage_Customer_Model_Form */
            $customerForm = $this->_getModel('customer/form');
            $customerForm->setFormCode('customer_account_edit')
                ->setEntity($customer);

            $customerData = $customerForm->extractData($this->getRequest());

            $errors = array();
            $customerErrors = $customerForm->validateData($customerData);
            if ($customerErrors !== true) {
                $errors = array_merge($customerErrors, $errors);
            } else {
                $customerForm->compactData($customerData);
                $errors = array();

                if (!$customer->validatePassword($this->getRequest()->getPost('current_password'))) {
                    $errors[] = $this->__('Invalid current password');
                }

                // If email change was requested then set flag
                $isChangeEmail = ($customer->getOldEmail() != $customer->getEmail()) ? true : false;
                $customer->setIsChangeEmail($isChangeEmail);

                // If password change was requested then add it to common validation scheme
                $customer->setIsChangePassword($this->getRequest()->getParam('change_password'));

                if ($customer->getIsChangePassword()) {
                    $newPass    = $this->getRequest()->getPost('password');
                    $confPass   = $this->getRequest()->getPost('confirmation');

                    if (strlen($newPass)) {
                        /**
                         * Set entered password and its confirmation - they
                         * will be validated later to match each other and be of right length
                         */
                        $customer->setPassword($newPass);
                        $customer->setPasswordConfirmation($confPass);
                    } else {
                        $errors[] = $this->__('New password field cannot be empty.');
                    }
                }

                // Validate account and compose list of errors if any
                $customerErrors = $customer->validate();
                if (is_array($customerErrors)) {
                    $errors = array_merge($errors, $customerErrors);
                }
            }

            if (!empty($errors)) {
                $this->_getSession()->setCustomerFormData($this->getRequest()->getPost());
                foreach ($errors as $message) {
                    $this->_getSession()->addError($message);
                }
                $this->_redirect('*/*/edit');
                return $this;
            }

            try {
                $customer->cleanPasswordsValidationData();
                $customer->setPasswordCreatedAt(time());

                // Reset all password reset tokens if all data was sufficient and correct on email change
                if ($customer->getIsChangeEmail()) {
                    $customer->setRpToken(null);
                    $customer->setRpTokenCreatedAt(null);
                }

                if ($customer->getIsChangeEmail() || $customer->getIsChangePassword()) {
                    $customer->sendChangedPasswordOrEmail();
                }

                $customer->setEducation($this->getRequest()->getPost('education'));
                $customer->setAdditional($this->getRequest()->getPost('additional'));
                $skills = Mage::helper('training_avatarcustomer')->getMultiselect($this->getRequest()->getPost('skills'));
                $customer->setData('skills', $skills);

                /** set image */
                if (isset($_FILES['avatar']['name']) && (file_exists($_FILES['avatar']['tmp_name'][0]))) {
                    $uploader = new Varien_File_Uploader(
                        array(
                            'name' => $_FILES['avatar']['name'],
                            'type' => $_FILES['avatar']['type'],
                            'tmp_name' => $_FILES['avatar']['tmp_name'][0],
                            'error' => $_FILES['avatar']['error'],
                            'size' => $_FILES['avatar']['size']
                        )
                    );
                    $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                    $uploader->setAllowRenameFiles(false);
                    $uploader->setFilesDispersion(false);
                    $uploader->setAllowCreateFolders(false);
                    $path = Mage::getBaseDir('media') . DS . 'customer';

                    /** save to folder media/customer */
                    $uploader->save($path, $_FILES['avatar']['name']);

                    /** uploader made url to sort images by alphabet */
                    $UnstablePath = $uploader::getDispretionPath($_FILES['avatar']['name']) . '/';
                    $pathToCustomer = $UnstablePath . $_FILES['avatar']['name'];
                    /** save full url to image in db */
                    $customer->setData('avatar', $pathToCustomer);
                }

                $customer->save();
                $this->_getSession()->setCustomer($customer)
                    ->addSuccess($this->__('The account information has been saved.'));

                $this->_redirect('customer/account');

                return;
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->setCustomerFormData($this->getRequest()->getPost())
                    ->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->setCustomerFormData($this->getRequest()->getPost())
                    ->addException($e, $this->__('Cannot save the customer.'));
            }
        }

        $this->_redirect('*/*/edit');
    }
}
