#
# Table structure for table 'tx_mocpoll_poll'
#
CREATE TABLE `tx_mocpoll_poll` (
	`uid` int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	`pid` int(11) DEFAULT '0' NOT NULL,
	`parent` int(11) unsigned DEFAULT '0' NOT NULL,
	`tstamp` int(11) unsigned DEFAULT '0' NOT NULL,
	`crdate` int(11) unsigned DEFAULT '0' NOT NULL,
	`deleted` tinyint(4) unsigned DEFAULT '0' NOT NULL,
	`hidden` tinyint(4) unsigned DEFAULT '0' NOT NULL,
	`sys_language_uid` int(11) DEFAULT '0' NOT NULL,
	`l18n_parent` int(11) DEFAULT '0' NOT NULL,
	`l18n_diffsource` mediumblob NOT NULL,

	`question` varchar(255) DEFAULT '',
	`responses` int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (`uid`),
	KEY `parent` (`pid`)
);

#
# Table structure for table 'tx_mocpoll_response'
#
CREATE TABLE `tx_mocpoll_response` (
	`uid` int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	`pid` int(11) DEFAULT '0' NOT NULL,
	`tstamp` int(11) unsigned DEFAULT '0' NOT NULL,
	`crdate` int(11) unsigned DEFAULT '0' NOT NULL,
	`deleted` tinyint(4) unsigned DEFAULT '0' NOT NULL,
	`hidden` tinyint(4) unsigned DEFAULT '0' NOT NULL,
	`sys_language_uid` int(11) DEFAULT '0' NOT NULL,
	`l18n_parent` int(11) DEFAULT '0' NOT NULL,
	`l18n_diffsource` mediumblob NOT NULL,
	`sorting` int(11) unsigned DEFAULT '0' NOT NULL,

	`reply` varchar(255) DEFAULT '',
	`count` int(11) unsigned DEFAULT '0' NOT NULL,
	`poll` int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (`uid`),
	KEY `parent` (`pid`)
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE `tt_content` (
	`tx_mocpoll_poll` int(11) unsigned DEFAULT '0' NULL
);