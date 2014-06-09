<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 6/9/14
 * Time: 9:13 AM
 */
class SM_Vendor_Model_Resource_Vendor extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('sm_vendor/vendor','vendor_id');
    }
}