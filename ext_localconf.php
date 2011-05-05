<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$allowedActions = array(
  'Poll' => 'poll,vote,publicOpinion'
);

$unCachedActions = array(
  'Poll' => 'poll,vote,publicOpinion'
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	$allowedActions,
  $unCachedActions
);