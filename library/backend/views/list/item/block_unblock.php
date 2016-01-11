<span class="yf-show-hide show-hide" data-status="<?php echo $item->status == Model_User::STATUS_ACTIVE ? 'active' : 'blocked'; ?>">
	<?php echo HTML::anchor(
		URL::to($link_show),
		'<span class="glyphicon glyphicon-lock"></span>',
		array(
			'title'=>text('label.unblock'),
			'style'=> $item->status != Model_User::STATUS_BLOCKED ? 'display:none' : '',
			'class'=>'yf yf-show',
			'data-to'=>'callback',
			'data-callback'=>'yf.backend.List.show'
		)
	); ?>
	
	<?php echo HTML::anchor(
		URL::to($link_hide),
		'<span class="glyphicon glyphicon-user"></span>',
		array(
			'title'=>text('label.block'),
			'style'=> $item->status == Model_User::STATUS_BLOCKED ? 'display:none' : '',
			'class'=>'yf yf-hide',
			'data-to'=>'callback',
			'data-callback'=>'yf.backend.List.hide'
		)
	); ?>
</span>