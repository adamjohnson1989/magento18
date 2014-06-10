<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 5:27 PM
 */
class SM_Vendor_Block_Vendor_View extends Mage_Core_Block_Template
{
    protected  $_vendorCollection;
    /**
     * Retrieve current vendor model
     *
     * @return SM_Vendor_Model_Vendor
     */
    public function getVendor()
    {
        if(Mage::registry('current_vendor')){
            return Mage::registry('current_vendor');
        }
    }
    public function getVendorId(){
        $id = null;
        $vendor = $this->getVendor();
        if(is_object($vendor) && $vendor->getId()){
            $id = $vendor->getId();
        }
        return $id;
    }

    public function getProductCollection()
    {
        if(is_null($this->_vendorCollection)){
            $this->_vendorCollection = Mage::getModel('catalog/product')->getCollection()
                                                           ->addAttributeToSelect('*')
                                                           ->addAttributeToFilter('vendor',$this->getVendorId())->load();
            Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($this->_vendorCollection);
            Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($this->_vendorCollection);
        }
        return $this->_vendorCollection;
    }
}