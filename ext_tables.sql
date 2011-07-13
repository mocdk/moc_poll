CREATE TABLE `tx_mocpoll_domain_model_poll` (
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
`question` text,
`image` text,
`responses` varchar(255) DEFAULT ''
PRIMARY KEY (uid),
KEY parent (pid),
);
CREATE TABLE `tx_mocpoll_domain_model_response` (
`uid` int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
`pid` int(11) DEFAULT '0' NOT NULL,
`tstamp` int(11) unsigned DEFAULT '0' NOT NULL,
`crdate` int(11) unsigned DEFAULT '0' NOT NULL,
`deleted` tinyint(4) unsigned DEFAULT '0' NOT NULL,
`hidden` tinyint(4) unsigned DEFAULT '0' NOT NULL,
`sys_language_uid` int(11) DEFAULT '0' NOT NULL,
`l18n_parent` int(11) DEFAULT '0' NOT NULL,
`l18n_diffsource` mediumblob NOT NULL,
`reply` text,
`count` int(11) DEFAULT '0' NULL,
`poll` varchar(255) DEFAULT ''
PRIMARY KEY (uid),
KEY parent (pid),
);

CREATE TABLE `tt_content` (
`tx_mocpoll_poll` int(11) DEFAULT '0' NULL
);