<?php if ($extends): ?>
return Settings::extend('<?php echo $extends; ?>',array(
));
<?php else: ?>
return array(
);
<?php endif; ?>