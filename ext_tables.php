<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('moc_poll') . 'ext_tables_generated.php');
$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToLowerCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

$tempColumns = array(
	'tx_mocpoll_poll' => array(
		'label'  => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tt_content.tx_mocpoll_poll',
		'config' => Array(
			'type'          => 'inline',
			'foreign_table' => 'tx_mocpoll_domain_model_poll',
			'foreign_field' => 'parent',
			'maxitems'      => 1,
			'minitems'      => 1,
			'appearance'    => array(
				'newRecordLinkAddTitle' => 1,
				'expandSingle'          => 1,
				'useSortable'           => 1,
				'newRecordLinkPosition' => 'both',
			)
		)
	)
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'MOC afstemning'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_mocpoll_poll,pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/poll_flexform.xml');

if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_mocpoll_wizicon'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/WizIcon/WizIcon.php';
}