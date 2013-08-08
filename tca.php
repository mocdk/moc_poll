<?php
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('moc_poll') . 'tca_generated.php');

/*
$TCA["tx_mocpoll_domain_model_poll"]['columns']['responses']['config']['type'] = 'inline';
$TCA["tx_mocpoll_domain_model_poll"]['columns']['responses']['config']['foreign_field'] = 'poll';
$TCA["tx_mocpoll_domain_model_poll"]['columns']['parent'] = array(
	'exclude' => 0,
	'config'  => array(
		'type' => 'passthrough'
	),
);
$TCA["tx_mocpoll_domain_model_response"]['types'] = array('1' => array('showitem' => 'reply'));
*/