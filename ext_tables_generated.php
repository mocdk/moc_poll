<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mocpoll_domain_model_poll');
$TCA['tx_mocpoll_domain_model_poll'] = array(
	'ctrl' => array(
		'title'             => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll',
		'label'             => 'question',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'deleted'           => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('moc_poll') . 'tca.php', 'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('moc_poll') . 'Resources/Private/Icons/icon_tx_mocpoll_domain_model_poll.gif',),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mocpoll_domain_model_response');
$TCA['tx_mocpoll_domain_model_response'] = array(
	'ctrl' => array(
		'title'             => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_response',
		'label'             => 'reply',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'deleted'           => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('moc_poll') . 'tca.php', 'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('moc_poll') . 'Resources/Private/Icons/icon_tx_mocpoll_domain_model_response.gif',),
);
