<?php
t3lib_extMgm::allowTableOnStandardPages('tx_mocpoll_domain_model_poll');
$TCA['tx_mocpoll_domain_model_poll'] = array(
'ctrl' => array(
'title' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_poll',
'label' => 'question',
'tstamp' => 'tstamp',
'crdate' => 'crdate',
'deleted' => 'deleted',
'enablecolumns' => array(
'disabled' => 'hidden',
),
'dynamicConfigFile' => t3lib_extMgm::extPath('moc_poll').'tca.php','iconfile' => t3lib_extMgm::extRelPath('moc_poll').'Resources/Private/Icons/icon_tx_mocpoll_domain_model_poll.gif',),
);
t3lib_extMgm::allowTableOnStandardPages('tx_mocpoll_domain_model_response');
$TCA['tx_mocpoll_domain_model_response'] = array(
'ctrl' => array(
'title' => 'LLL:EXT:moc_poll/Resources/Private/Language/locallang_db.xml:tx_mocpoll_domain_model_response',
'label' => 'reply',
'tstamp' => 'tstamp',
'crdate' => 'crdate',
'deleted' => 'deleted',
'enablecolumns' => array(
'disabled' => 'hidden',
),
'dynamicConfigFile' => t3lib_extMgm::extPath('moc_poll').'tca.php','iconfile' => t3lib_extMgm::extRelPath('moc_poll').'Resources/Private/Icons/icon_tx_mocpoll_domain_model_response.gif',),
);
