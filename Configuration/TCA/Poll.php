<?php
$TCA['tx_mocpoll_poll'] = array(
	'ctrl' => $TCA['tx_mocpoll_poll']['ctrl'],
	'interface' => array('showRecordFieldList' => 'question'),
	'columns' => array(
		'question' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/Poll/locallang.xlf:question',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim, required'
			)
		),
		'responses' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/Poll/locallang.xlf:responses',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_mocpoll_response',
				'foreign_field' => 'poll',
				'foreign_sortby' => 'sorting',
				'allowed' => 'tx_mocpoll_response',
				'maxitems' => '99',
				'appearance' => array(
					'collapseAll' => FALSE,
					'expandSingle' => FALSE,
					'newRecordLinkAddTitle' => TRUE,
					'useSortable' => TRUE,
					'levelLinksPosition' => 'both',
					'enabledControls' => array(
						'info' => FALSE,
						'new' => TRUE,
						'dragdrop' => TRUE,
						'sort' => TRUE,
						'hide' => TRUE,
						'delete' => TRUE
					)
				)
			)
		),
		'parent' => array(
			'exclude' => 0,
			'config' => array(
				'type' => 'passthrough'
			)
		)
	),
	'types' => array('1' => array('showitem' => 'question, responses'))
);