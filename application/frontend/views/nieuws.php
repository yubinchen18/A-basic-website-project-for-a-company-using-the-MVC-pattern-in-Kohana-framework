<?php View::extend('base') ?>

<?php View::start_block('content') ?>


<?php foreach ($newsItems as $newsItem): ?>

					<div class="image">
						<?php /*if($image = $item->image_collection->first()): ?>
							<img src="<?php echo $image->src('thumb'); ?>" width="59" alt="<?php echo $image->title; ?>" />
						<?php endif;*/ ?>
					</div>
					<h3><?php echo $newsItem->title; ?></h3>
					<?php echo $newsItem->time_publication?>
					<br><br>
					<?php echo $newsItem->raw('body'); ?>
					<br><br><br>

		<?php //var_dump($newsItem) ?>
<?php endforeach ?>


<?php View::end_block() ?>