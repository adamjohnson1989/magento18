<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 9:00 AM
 */
class SM_Vendor_Model_Vendor extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('sm_vendor/vendor');
    }
}