<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 4:55 PM
 */
class SM_Vendor_Block_Vendor_List extends Mage_Core_Block_Template
{
    protected $_vendorCollection;
    public function getVendorCollection()
    {
        $vendor = Mage::getModel('sm_vendor/vendor')->getCollection();
        if($vendor->getSize()){
            $this->_vendorCollection = $vendor;
        }
        return $this->_vendorCollection;
    }
}