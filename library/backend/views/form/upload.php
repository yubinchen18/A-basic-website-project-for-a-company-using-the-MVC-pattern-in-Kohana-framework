<div class="yf" data-use="backend.form.Upload">
	<?php for($i=0;$i<$element->amount;$i++): ?>
		<?php echo FormHTML::file($element->name,array('multiple'=>'multiple')); ?><br /><br />
	<?php endfor; ?>
</div>