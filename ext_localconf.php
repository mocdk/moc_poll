<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MOC.' . $_EXTKEY,
	'Pi1',
	array('Poll' => 'poll,vote,publicOpinion'),
	array('Poll' => 'poll,vote,publicOpinion')
);