<?php
$identity = Identity::instance();

//show list of files for download
if (!$identity->authenticated()) {
	$downloads = ORM::factory('File')
			->filter('status', Model_item::STATUS_LIVE)
			->filter('hidden',  '0')
			->sort('title', 'DESC')
			->items();
	echo 'Dit is de normale versie. <br> Voor de docentenversie dient u in te loggen. <br><br>';
} else {
	$downloads = ORM::factory('File')
			->filter('status', Model_item::STATUS_LIVE)
			->sort('title', 'DESC')
			->items();
	echo 'Dit is Docenten versie!<br><br>';
}
?>
				
<?php foreach ($downloads as $download): ?>
		<?php echo ($download->title) ?>
		<br>
		<a href="<?php echo URL::to("file@download:$download->id")?>">Download</a>
		<br><br>
<?php endforeach ?>