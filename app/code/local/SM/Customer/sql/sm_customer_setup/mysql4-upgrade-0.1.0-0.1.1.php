<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 4/29/14
 * Time: 11:06 AM
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();
/* @var $addressHelper Mage_Customer_Helper_Address */

$this->addAttribute('customer_address', 'contact_name', array(
    'type' => 'varchar',
    'input' => 'text',
    'label' => 'Contact Name',
    'global' => 1,
    'visible' => 1,
    'required' => 0,
    'user_defined' => 1,
    'visible_on_front' => 1
));
Mage::getSingleton('eav/config')
    ->getAttribute('customer_address', 'contact_name')
    ->setData('used_in_forms', array('customer_register_address','customer_address_edit','adminhtml_customer_address'))
    ->save();

$installer->run("
    ALTER TABLE {$this->getTable('sales_flat_quote_address')} ADD COLUMN `contact_name` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL AFTER `fax`;
     ALTER TABLE {$this->getTable('sales_flat_order_address')} ADD COLUMN `contact_name` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL AFTER `fax`;
    ");


$installer->endSetup();