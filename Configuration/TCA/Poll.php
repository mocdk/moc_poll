<?php
$TCA['tx_mocpoll_domain_model_poll'] = array(
	'ctrl'      => $TCA['tx_mocpoll_domain_model_poll']['ctrl'],
	'interface' => array('showRecordFieldList' => 'question,responses'),
	'columns' => array(
		'question' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll.question',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			)
		),
		'responses' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll.responses',
			'config' => array(
				'type' => 'inline',
				'foreign_field' => 'poll',
				'foreign_table' => 'tx_mocpoll_domain_model_response',
				'allowed' => 'tx_mocpoll_domain_model_response',
				'maxitems' => '99999'
			)
		),
		'parent' => array(
			'exclude' => 0,
			'config' => array(
				'type' => 'passthrough'
			)
		)
	),
	'types' => array('1' => array('showitem' => 'question,responses')),
	'palettes' => array('1' => array('showitem' => ''))
);