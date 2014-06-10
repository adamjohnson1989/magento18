<?php
/**
 * Created by PhpStorm.
 * User: Son Nguyen
 * Date: 6/10/14
 * Time: 12:23 AM
 */
class SM_Vendor_ProductController extends Mage_Core_Controller_Front_Action
{
    public function createAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction(){
        $post = $this->getRequest()->getParam('vendor');
        if($post){
            try{
                $product = Mage::getModel('catalog/product');
                $catId = implode(',',$post['product_cat']);
                $product->setSku($post['product_sku']);
                $product->setName($post['product_name']);
                $product->setDescription($post['vendor_desc']);
                $product->setShortDescription($post['vendor_shortdesc']);
                $product->setPrice(sprintf("%0.2f", $post['product_price']));
                $product->setTypeId('simple');
                $product->setAttributeSetId(Mage::getModel('catalog/product')->getResource()->getEntityType()->getDefaultAttributeSetId());
                $product->setCategoryIds($catId);
                $product->setWeight(sprintf("%0.2f", $post['product_weight']));
                $product->setTaxClassId(2); // taxable goods
                $product->setVisibility(4); // catalog, search
                $product->setStatus(1); // enabled
                $product->setVendor((int)$post['product_vendor']);
                // assign product to the default website
                $product->setWebsiteIds(array(Mage::app()->getStore(true)->getWebsite()->getId()));
                $product->save();
                $productId = $product->getId();
                $stockItem =Mage::getModel('cataloginventory/stock_item')->loadByProduct((int)$productId);
                $stockItem->setData('use_config_manage_stock', 1);
                $stockItem->setData('qty', (int)$post['product_qty']);
                $stockItem->save();
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('sm_vendor')->__("Product '{$post['product_name']}' is created successfully."));
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
}