<?php if ($overwrite): ?>
DROP TABLE IF EXISTS `<?php echo $table; ?>_collection`;
<?php endif; ?>

CREATE TABLE `<?php echo $table; ?>_collection` (
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