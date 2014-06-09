<?php
/**
 * Created by PhpStorm.
 * User: Sonnv
 * Date: 4/18/14
 * Time: 5:38 PM
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();
$cfg = Mage::app()->getConfig();
$cfg->saveConfig('design/theme/default','default');

$installer->endSetup();