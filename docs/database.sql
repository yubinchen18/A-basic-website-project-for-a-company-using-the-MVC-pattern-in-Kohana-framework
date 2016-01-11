
-- Adminer 3.3.4 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `alias`;
CREATE TABLE `alias` (
  `uri` varchar(255) NOT NULL DEFAULT '',
  `param_website` varchar(63) NOT NULL DEFAULT '',
  `param_controller` varchar(63) NOT NULL DEFAULT '',
  `param_action` varchar(63) NOT NULL DEFAULT '',
  `param_id` varchar(63) NOT NULL DEFAULT '0',
  UNIQUE KEY `uri` (`uri`),
  KEY `param_controller` (`param_controller`),
  KEY `param_action` (`param_action`),
  KEY `param_id` (`param_id`),
  KEY `param_website` (`param_website`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_contact_to_email` varchar(255) DEFAULT '',
  `email_contact_to_name` varchar(255) DEFAULT NULL,
  `email_contact_from_email` varchar(255) DEFAULT NULL,
  `email_contact_from_name` varchar(255) DEFAULT NULL,
  `email_contact_subject` varchar(255) DEFAULT NULL,
  `email_contact_body` text,
  `email_apply_to_email` varchar(255) DEFAULT NULL,
  `email_apply_to_name` varchar(255) DEFAULT NULL,
  `email_apply_from_email` varchar(255) DEFAULT NULL,
  `email_apply_from_name` varchar(255) DEFAULT NULL,
  `email_apply_subject` varchar(255) DEFAULT NULL,
  `email_apply_body` text,
  `ga_code` varchar(255) DEFAULT NULL,
  `news_import_url` text,
  `news_import_lifetime` int(11) NOT NULL DEFAULT '30',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `config` (`id`, `created`, `timestamp`, `email_contact_to_email`, `email_contact_to_name`, `email_contact_from_email`, `email_contact_from_name`, `email_contact_subject`, `email_contact_body`, `email_apply_to_email`, `email_apply_to_name`, `email_apply_from_email`, `email_apply_from_name`, `email_apply_subject`, `email_apply_body`, `ga_code`, `news_import_url`, `news_import_lifetime`, `owner_id`, `editor_id`, `website_id`) VALUES
(1,	NULL,	'2012-11-16 15:57:36',	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	30,	0,	0,	'default');

DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` enum('item','branch') NOT NULL DEFAULT 'item',
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `updatable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `document_collection`;
CREATE TABLE `document_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `home`;
CREATE TABLE `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` int(11) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `updatable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `request_1_id` int(11) NOT NULL DEFAULT '0',
  `request_2_id` int(11) NOT NULL DEFAULT '0',
  `request_3_id` int(11) NOT NULL DEFAULT '0',
  `slide_collection_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `home` (`id`, `parent_id`, `alias`, `created`, `timestamp`, `branch`, `deletable`, `movable`, `status`, `rank`, `title`, `request_1_id`, `request_2_id`, `request_3_id`, `slide_collection_id`, `owner_id`, `editor_id`, `website_id`) VALUES
(1,	0,	'',	NULL,	'2012-11-16 15:57:48',	0,	1,	1, 1, 'live',	0,	'',	0,	0,	0,	0,	1,	1,	'default');

DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `rank` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self',
  `type` enum('url','request') NOT NULL DEFAULT 'request',
  `url` text,
  `request_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `website_id` (`website_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(63) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '1',
  `behaviour` enum('none','link','module','request') NOT NULL DEFAULT 'none',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `updatable` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `module` varchar(255) DEFAULT '',
  `link_id` int(11) DEFAULT '0',
  `request_id` int(11) DEFAULT '0',
  `full` tinyint(4) NOT NULL DEFAULT '1',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`),
  KEY `owner_id` (`owner_id`),
  KEY `editor_id` (`editor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `parent_id`, `alias`, `created`, `timestamp`, `branch`, `behaviour`, `status`, `deletable`, `movable`, `updatable`, `rank`, `title`, `module`, `link_id`, `request_id`, `full`, `website_id`, `owner_id`, `editor_id`) VALUES
(1,	0,	'top',	'2012-11-26 12:33:50',	'2012-11-26 12:33:50',	1,	'none',	'live',	0,	0,	0,	1,	'Bovennavigatie',	'',	0,	0,	0,	'default',	1,	1),
(2,	0,	'main',	'2012-11-16 07:41:23',	'2012-11-26 12:33:15',	1,	'none',	'live',	0,	0,	0,	2,	'Hoofdnavigatie',	'',	0,	0,	0,	'default',	1,	1),
(3,	0,	'bottom',	'2012-11-16 07:41:33',	'2012-11-26 12:33:15',	1,	'none',	'live',	0,	0,	0,	3,	'Ondernavigatie',	'',	0,	0,	0,	'default',	1,	1),
(4,	0,	'footer',	'2012-11-26 11:13:16',	'2012-11-26 12:33:15',	1,	'none',	'live',	0,	0,	0,	4,	'Footer',	'',	0,	0,	0,	'default',	1,	1);

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `import` tinyint(4) NOT NULL DEFAULT '0',
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `use_time_show_start` tinyint(4) NOT NULL DEFAULT '0',
  `time_show_start` datetime DEFAULT NULL,
  `use_time_show_end` tinyint(4) NOT NULL DEFAULT '0',
  `time_show_end` datetime DEFAULT NULL,
  `time_publication` datetime DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` text,
  `href` text,
  `picture_collection_id` int(11) NOT NULL DEFAULT '0',
  `document_collection_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `news_collection`;
CREATE TABLE `news_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` text,
  `picture_collection_id` int(11) NOT NULL DEFAULT '0',
  `document_collection_id` int(11) NOT NULL DEFAULT '0',
  `page_collection_id` int(11) NOT NULL DEFAULT '0',
  `news_collection_id` int(11) NOT NULL DEFAULT '0',
  `widget_collection_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `page_collection`;
CREATE TABLE `page_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `sizes` text,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `picture_collection`;
CREATE TABLE `picture_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(63) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `param_website` varchar(63) NOT NULL DEFAULT '',
  `param_controller` varchar(255) DEFAULT '',
  `param_action` varchar(255) DEFAULT 'view',
  `param_id` varchar(255) DEFAULT '',
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `seo`;
CREATE TABLE `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL DEFAULT '',
  `keywords` text,
  `description` text,
  `module` varchar(63) NOT NULL DEFAULT '',
  `item_id` int(11) DEFAULT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `cta` varchar(255) NOT NULL DEFAULT '',
  `picture_collection_id` int(11) NOT NULL DEFAULT '0',
  `link_id` int(11) DEFAULT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `slide_collection`;
CREATE TABLE `slide_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `hash` varchar(255) NOT NULL DEFAULT '',
  `type` enum('access','password','preview','none') NOT NULL DEFAULT 'none',
  `persistent` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  `rank` int(11) NOT NULL DEFAULT '0',
  `email` varchar(127) NOT NULL DEFAULT '',
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `roles` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(7) NOT NULL DEFAULT 'nl',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `parent_id`, `created`, `active`, `branch`, `status`, `rank`, `email`, `username`, `password`, `roles`, `language`, `owner_id`, `editor_id`, `website_id`) VALUES
(1,	0,	'2012-08-12 04:05:40',	1,	0,	'active',	0,	'info@yuna.nl',	'yuna',	'$2a$12$b13241fe6cc768a64f0c8uEfIg2c7GJlpGhcZJbmt/YYw2qoTeAAO',	'[\"admin\"]',	'nl',	16,	16,	'default');

DROP TABLE IF EXISTS `version`;
CREATE TABLE `version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `model` varchar(255) NOT NULL DEFAULT '',
  `revision` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `widget`;
CREATE TABLE `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `updatable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `template` text,
  `compiled` text,
  `time_compiled` datetime DEFAULT NULL,
  `error` tinyint(4) NOT NULL DEFAULT '0',
  `error_message` text,
  `view` varchar(255) NOT NULL DEFAULT '',
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `widget_collection`;
CREATE TABLE `widget_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `collection_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2012-11-26 18:01:13