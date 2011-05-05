<?php
$TCA["tx_mocpoll_domain_model_poll"] = array(
'ctrl' => $TCA['tx_mocpoll_domain_model_poll']['ctrl'],
'interface' => array('showRecordFieldList' => 'question,responses'),
'columns' => array(
'question' => array(
'exclude' => 0,
'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll.question',
'config' => array(
'type' => 'input','size' => 40,'eval' => 'trim',),
),
'responses' => array(
'exclude' => 0,
'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll.responses',
'config' => array(
'type' => 'select','foreign_table' => 'tx_mocpoll_domain_model_response','allowed' => 'tx_mocpoll_domain_model_response','maxitems' => '9999',),
),
),
'types' => array('1' => array('showitem' => 'question,responses')),
'palettes' => array('1' => array('showitem' => '')),
);
$TCA["tx_mocpoll_domain_model_response"] = array(
'ctrl' => $TCA['tx_mocpoll_domain_model_response']['ctrl'],
'interface' => array('showRecordFieldList' => 'reply,count,poll'),
'columns' => array(
'reply' => array(
'exclude' => 0,
'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_response.reply',
'config' => array(
'type' => 'input','size' => 40,'eval' => 'trim',),
),
'count' => array(
'exclude' => 0,
'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_response.count',
'config' => array(
'type' => 'input','size' => 40,'eval' => 'trim',),
),
'poll' => array(
'exclude' => 0,
'label' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_response.poll',
'config' => array(
'type' => 'select','foreign_table' => 'tx_mocpoll_domain_model_poll','allowed' => 'tx_mocpoll_domain_model_poll','maxitems' => '1',),
),
),
'types' => array('1' => array('showitem' => 'reply,count,poll')),
'palettes' => array('1' => array('showitem' => '')),
);
