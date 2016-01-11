<?php if ($overwrite): ?>
DROP TABLE IF EXISTS `<?php echo $table; ?>`;
<?php endif; ?>

CREATE TABLE `<?php echo $table; ?>` (
`id` int(11) NOT NULL AUTO_INCREMENT,

<?php if($parent): ?>
`parent_id` int(11) NOT NULL DEFAULT '0',
<?php endif; ?>

<?php if($item_fields): ?>
`alias` varchar(255) NOT NULL DEFAULT '',
`created` datetime DEFAULT NULL,
`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deletable` tinyint(4) NOT NULL DEFAULT '1',
`updatable` tinyint(4) NOT NULL DEFAULT '1',
`movable` tinyint(4) NOT NULL DEFAULT '1',
`status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
`rank` int(11) NOT NULL DEFAULT '0',
`title` varchar(255) NOT NULL DEFAULT '',
<?php endif; ?>

<?php foreach ($fields as $field): ?>
	<?php if($field['name']!=''): ?> 
		`<?php echo $field['name'] ?>` 
		<?php echo $field['type'] ?>
		<?php 
		echo isset($field['notnull']) && $field['notnull']=='1' ? ' NOT NULL': '' 
		?>
		<?php 
		if(isset($field['value']) && $field['value']!=''){
			echo " DEFAULT '".$field['value']."'";
		} elseif(isset($field['default']) &&  $field['default']=='1'){
			echo " DEFAULT ''";
		}
		?>,
	<?php endif; ?>
<?php endforeach; ?>

<?php if($meta): ?>
`meta_title` varchar(255) NOT NULL DEFAULT '',
`meta_keywords` varchar(255) NOT NULL DEFAULT '',
`meta_description` text,
<?php endif; ?>
		
<?php foreach ($collections as $collection): ?>
<?php if($collection['name']!=''): ?> 
`<?php echo $collection['key'] ?>` int(11) NOT NULL DEFAULT '0',
<?php endif; ?>
<?php endforeach; ?>

<?php foreach ($belongs as $belong): ?>
<?php if($belong['name']!=''): ?> 
`<?php echo $belong['key'] ?>` int(11) NOT NULL DEFAULT '0',
<?php endif; ?>
<?php endforeach; ?>

<?php if($item_fields): ?>
`owner_id` int(11) NOT NULL DEFAULT '0',
`editor_id` int(11) NOT NULL DEFAULT '0',
`website_id` varchar(63) NOT NULL DEFAULT '',
<?php endif ?>

<?php foreach ($collections as $collection): ?>
<?php if($collection['name']!=''): ?> 
KEY `<?php echo $collection['key'] ?>` (`<?php echo $collection['key'] ?>`),
<?php endif; ?>
<?php endforeach; ?>

<?php foreach ($belongs as $belong): ?>
<?php if($belong['name']!=''): ?> 
KEY `<?php echo $belong['key'] ?>` (`<?php echo $belong['key'] ?>`),
<?php endif; ?>
<?php endforeach; ?>

<?php if($parent): ?>
KEY `parent_id` (`parent_id`),
<?php endif; ?>

<?php if($item_fields): ?>
KEY `owner_id` (`owner_id`),
KEY `website_id` (`website_id`),
<?php endif; ?>

PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;