<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 9:26 AM
 */
class SM_Vendor_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function createAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function postAction()
    {
        $post = $this->getRequest()->getParam('vendor');
        if($post){
            $vendor = Mage::getModel('sm_vendor/vendor');
            try{
                $error = false;
                if (!Zend_Validate::is(trim($post['vendor_name']) , 'NotEmpty')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($post['vendor_email']), 'EmailAddress')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($post['vendor_contact']) , 'NotEmpty')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($post['vendor_desc']), 'NotEmpty')) {
                    $error = true;
                }
                if ($error) {
                    throw new Exception();
                }
                $vendor->setVendorName($post['vendor_name'])
                       ->setVendorEmail($post['vendor_email'])
                       ->setVendorContact($post['vendor_contact'])
                       ->setVendorDesc($post['vendor_desc'])
                       ->save();
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('sm_vendor')->__('Vendor is added successfully'));
                $this->_redirect('*/*/create');
                return;
            }catch (Exception $e){
                Mage::getSingleton('core/session')->addError(Mage::helper('sm_vendor')->__('Unable to submit your request. Please, try again later'));
                $this->_redirect('*/*/create');
                return;
            }
        }else{
            $this->_redirect('*/*/create');
        }
    }
    public function viewAction()
    {
        $vendorId = (int)$this->getRequest()->getParam('id');
        $vendor = Mage::getModel('sm_vendor/vendor')
                    ->setStoreId(Mage::app()->getStore()->getId())
                    ->load($vendorId);
        Mage::register('current_vendor', $vendor);
        $this->loadLayout();
        $this->renderLayout();

    }

}