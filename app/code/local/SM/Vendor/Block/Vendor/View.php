<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 5:27 PM
 */
class SM_Vendor_Block_Vendor_View extends Mage_Core_Block_Template
{
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

    public function getProductByVendorId($id)
    {
        $product = null;
        if($id){
            $product = Mage::getModel('catalog/product')->getCollection()
                                                           ->addAttributeToSelect('*')
                                                           ->addAttributeToFilter('vendor',$id)->load();
            Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($product);
            Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($product);
        }
        return $product;
    }
}