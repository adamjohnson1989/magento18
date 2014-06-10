<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 8:44 AM
 */ 
class SM_Vendor_Helper_Data extends Mage_Core_Helper_Abstract {
    public function createVendorUrl()
    {
        return Mage::getUrl('vendor/index/create');
    }
    public function listVendorUrl()
    {
        return Mage::getUrl('vendor/index/index');
    }
    public function createProductUrl()
    {
        return Mage::getUrl('vendor/product/create');
    }
}