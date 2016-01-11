class Form_<?php echo $name; ?> extends <?php echo $extends; ?> 
{
	protected function build()
	{<?php if (count($buttons)>0): ?> 
		$this->btn_group('<?php echo implode("','",$buttons); ?>');<?php endif; ?><?php if ($seo): ?> 
		$this->markup('content','tab');<?php endif; ?><?php if ($title): ?> 
		$this->element('title','text');<?php endif; ?><?php if ($alias): ?> 
		$this->element('alias','alias',array('source'=>'title'));<?php endif; ?><?php foreach ($fields as $field): ?><?php if($field['name']!=''): ?> 
		$this->element('<?php echo $field['name']; ?>','text');<?php endif; ?><?php endforeach; ?><?php foreach ($collections as $collection): ?><?php if($collection['name']!=''): ?> 
		$this->element('<?php echo $collection['name']; ?>','collection',array('view'=>'<?php echo $collection['view']; ?>','controller'=>'<?php echo $collection['controller']; ?>','multiple'=>TRUE));<?php endif; ?><?php endforeach; ?><?php foreach ($belongs as $belong): ?><?php if($belong['name']!=''): ?> 
		$this->element('<?php echo $belong['name']; ?>_id','collection',array('view'=>'<?php echo $belong['view']; ?>','controller'=>'<?php echo $belong['controller']; ?>','single'=>TRUE,'max'=>1));<?php endif; ?><?php endforeach; ?><?php if ($seo): ?> 
		$this->seo();<?php endif; ?> 
<?php 
$all = array_merge($fields,$collections,$belongs);
foreach ($all as $field){
	 if($field['name']!='' && isset($field['rules'])){
		 if(!is_array($field['rules'])){
			 $field['rules'] = array($field['rules']);
		 }
		 foreach($field['rules'] as $rule){
			 echo "\n\t\t\$this->rule('".$field['name']."','".$rule."');";
		 }
	 }
 }
?> 
	}
}