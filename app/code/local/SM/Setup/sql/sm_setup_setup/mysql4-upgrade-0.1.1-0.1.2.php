<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 4/18/14
 * Time: 5:38 PM
 */ 
/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;

$installer->startSetup();
//$attribute  = array(
//    'type'          => 'text',
//    'backend_type'  => 'text',
//    'frontend_input' => 'textarea',
//    'label'         => 'Customer Comment New',
//    'visible'       => true,
//    'required'      => false,
//    'user_defined'  => 1,
//    'default'       => ''
//);
//$installer->addAttribute('order', 'customer_comment', $attribute);

$installer->run("
    ALTER TABLE {$this->getTable('sales_flat_order')} ADD COLUMN `customer_comment` TEXT CHARACTER SET utf8 DEFAULT NULL AFTER `customer_note`;
    ");

$installer->endSetup();