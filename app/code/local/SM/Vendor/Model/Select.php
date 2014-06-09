<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 2:26 PM
 */
class SM_Vendor_Model_Select extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions(){
        if (is_null($this->_options)) {
            $vendors = Mage::getModel('sm_vendor/vendor')->getCollection();
            $option = array();
            $option[] = array(
                'label' => Mage::helper('sm_vendor')->__('Please Choose Vendor'),
                'value' => ''
            );
            if($vendors->getSize()){
                foreach($vendors as $vendor){
                    $option[] = array(
                        'label' => $vendor->getVendorName(),
                        'value' => $vendor->getId()
                    );
                }
            }
            $this->_options = $option;
        }
        return $this->_options;
    }
}