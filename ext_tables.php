<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mocpoll_poll');
$TCA['tx_mocpoll_poll'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/Poll/locallang.xlf:poll',
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'deleted' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Poll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/Poll.png'
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mocpoll_response');
$TCA['tx_mocpoll_response'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/Response/locallang.xlf:response',
		'label' => 'reply',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'deleted' => 'deleted',
		'sortby' => 'sorting',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Response.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/Response.png'
	)
);

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToLowerCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_plugin';

$tempColumns = array(
	'tx_mocpoll_poll' => array(
		'label'  => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:tt_content.tx_mocpoll_poll',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_mocpoll_poll',
			'foreign_field' => 'parent',
			'maxitems' => TRUE,
			'minitems' => TRUE,
			'appearance' => array(
				'newRecordLinkAddTitle' => TRUE,
				'expandSingle' => TRUE
			)
		)
	)
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Plugin',
	'Poll'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_mocpoll_poll,pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Plugin.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	mod.wizards.newContentElement.wizardItems.plugins.elements.' . $pluginSignature . ' {
		icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . '/Resources/Public/Icons/MocPoll.png
		title = LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:wizIcon.title
		description = LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:wizIcon.description
		tt_content_defValues {
			CType = list
			list_type = ' . $pluginSignature . '
			header = MocPoll
			header_layout = 100
			sys_language_uid = -1
		}
	}

	templavoila.wizards.newContentElement.wizardItems.plugins.elements.' . $pluginSignature . ' < mod.wizards.newContentElement.wizardItems.plugins.elements.' . $pluginSignature . '
');