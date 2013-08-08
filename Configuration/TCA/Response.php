<?php
$TCA['tx_mocpoll_domain_model_response'] = array(
	'ctrl'      => $TCA['tx_mocpoll_domain_model_response']['ctrl'],
	'interface' => array('showRecordFieldList' => 'reply,count,poll'),
	'columns' => array(
		'reply' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/Response/locallang.xlf:reply',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			)
		),
		'count' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/Response/locallang.xlf:count',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			)
		),
		'poll' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/Response/locallang.xlf:poll',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_mocpoll_domain_model_poll',
				'allowed' => 'tx_mocpoll_domain_model_poll',
				'maxitems' => '1'
			)
		)
	),
	'types' => array('1' => array('showitem' => 'reply, count')),
	'palettes' => array('1' => array('showitem' => ''))
);