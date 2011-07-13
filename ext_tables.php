<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
require_once(t3lib_extMgm::extPath('moc_poll').'ext_tables_generated.php');
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

t3lib_div::loadTCA('tt_content');
$tempColumns = array (
  'tx_mocpoll_poll' => array(
    'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tt_content.tx_mocpoll_poll',
    'config' => Array (
      'type' => 'inline',
      'foreign_table' => 'tx_mocpoll_domain_model_poll',
      'foreign_field' => 'parent',
      'maxitems' => 1,
      'minitems' => 1,
      "appearance" => array(
        "newRecordLinkAddTitle" => 1,
        "expandSingle" => 1,
        "useSortable" => 1,
        "newRecordLinkPosition" => 'both',
	  )
	)
  )
);
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',				// A unique name of the plugin in UpperCamelCase
	'MOC afstemning'	// A title shown in the backend dropdown field
);

//$pluginSignature = 'smkfloorplan_pi1';
t3lib_div::loadTCA('tt_content');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_mocpoll_poll,pi_flexform';

t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/poll_flexform.xml');

if (TYPO3_MODE == 'BE') {
  $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_mocpoll_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'Classes/WizIcon/tx_mocpoll_wizicon.php';
}