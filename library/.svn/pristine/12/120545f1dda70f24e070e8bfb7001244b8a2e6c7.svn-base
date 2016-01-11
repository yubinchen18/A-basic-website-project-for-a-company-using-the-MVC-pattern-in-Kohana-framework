<?php if ( $item->status == Model_Item::STATUS_LIVE ||  $item->status == Model_Item::STATUS_EDIT): ?>
	<span class="yf-show-hide show-hide" data-status="<?php echo $item->status == Model_Item::STATUS_LIVE ? 'visible' : 'hidden'; ?>">
		<?php echo HTML::anchor(
			URL::to($link_show),
			'<span class="glyphicon glyphicon-eye-close"></span>',
			array(
				'title'=>text('label.show'),
				'style'=> $item->status == Model_Item::STATUS_LIVE ? 'display:none' : '',
				'class'=>'yf yf-show',
				'data-to'=>'callback',
				'data-callback'=>'yf.backend.List.show'
			)
		); ?>

		<?php echo HTML::anchor(
			URL::to($link_hide),
			'<span class="glyphicon glyphicon-eye-open"></span>',
			array(
				'title'=>text('label.hide'),
				'style'=> $item->status == Model_Item::STATUS_EDIT ? 'display:none' : '',
				'class'=>'yf yf-hide',
				'data-to'=>'callback',
				'data-callback'=>'yf.backend.List.hide'
			)
		); ?>
	</span>
<?php endif; ?>
