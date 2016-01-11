<!-- Title -->
<?php if ( isset($title) && $title !== ''): ?>
	<h2><?php echo $title; ?></h2>
<?php endif; ?>

<?php if ($form->submitted()): ?>
	<h3 class="message error">
		Het formulier bevat nog fouten
	</h3>
	<h4>
		Herstel de aangegeven fouten en probeer het formulier nogmaals te verzenden
	</h4>
	<br />
<?php endif; ?>

<!-- Form -->	
<form action="<?php echo $form->action(); ?>" method="<?php echo $form->method(); ?>" enctype="<?php echo $form->enctype(); ?>" <?php echo HTML::attributes($form->attributes()); ?>>

	<?php 
	$rows = array();
	$elements = $form->elements;
	for($i=0;$i<count($elements); $i++){
		
		$element = $elements[$i];
	
		switch($element->type){
			case 'custom':
				$rows[]= $element->html;
				break;
			case 'hidden':
				$rows[] = Form::hidden($element->name,$element->value,$element->attributes);
				break;
			case 'script':
				if(isset($element->src)){
					$rows[]= HTML::script($element->src,$element->attributes);
				} elseif(isset($element->script)){
					$rows[]= '<script type="text/javascript">'.$element->script.'</script>';
				}
				break;
			default:
				// LABEL
				if($element->type!='submit'){
					$label = isset($element->label)?$element->label:'';
					$label=Form::label($element->id,$label);
				} else {
					$label = '';
				}

				
				$labelPart='<div class="label'. ($element->required ? ' required':'').'"><h3>'.$label.'</h3></div>';

				// ERROR
				if($error = $element->error()){
					$errorPart= '<div class="caption error">'
					.'<span class="yf-close close">&times;</span>'
					.'<span class="message">'
					.$error
					.'</span>'
					.'</div>';
				} else {
					$errorPart = '';
				}

				// the element
				switch($element->type){
					case 'checkbox':
						// check if is assoc array
						$assoc = Arr::is_assoc($element->options);
						$field = '';
						foreach($element->options as $value=>$label){
							if(is_array($element->value)){
								$checked = (in_array($value,$element->value));
							} else {
								$checked = $value==$element->value;
							}
							$field .= Form::checkbox($element->name,$value,$checked,$element->attributes)
							.'<span class="checkBoxLabel">'.$label.'</span>'
							.($element->spacer?$element->spacer:'&nbsp;');
						}
						break;
					case 'radio':
						// check if is assoc array
						$assoc = Arr::is_assoc($element->options);
						$field = '';
						foreach($element->options as $value=>$label){
							$checked = ($value == $element->value);
							$field .= Form::radio($element->name,$value,$checked,$element->attributes)
							.'<span class="radioLabel">'.$label.'</span>'
							.($element->spacer?$element->spacer:'&nbsp;');
						}
						break;
					case 'button':
						$field = Form::button($element->name,$element->label,$element->attributes);
						break;
					case 'file':
						$field = Form::file($element->name,$element->attributes);
						break;	
					case 'image':
						$field = Form::image($element->name, $element->value, $element->attributes,false);
						break;
					case 'text':
					case 'text_small':
					case 'input':
					case 'input_small':
					case 'email':
						$field = Form::input($element->name,$element->value,$element->attributes);
						break;
					case 'password':
						$field = Form::password($element->name,$element->value,$element->attributes);
						break;
					case 'submit':
						$label = isset($element->label)?$element->label:'';
						$field = Form::submit($element->name,$label,$element->attributes);
						break;
					case 'select':
						$field = Form::select($element->name,$element->options,$element->value,$element->attributes);
						break;
					case 'textarea':
						$field = Form::textarea($element->name,$element->value,$element->attributes,false);
						break;	
					case 'custom':
						$field = $element->html;
						break;
					default:
						$field = View::factory('form/'.$element->type,array(
							'element'=>$element
						))->render();
				}
				
				// glue together html
				$column = array(
					'small'=>$element->type == 'input_small' || $element->small == TRUE,
					'html'=>$labelPart.$field.$errorPart
				);
				
				// place in rows
				if($element->place_after){
					// place after: use the existing 
					if(!is_array($row)){
						// first pass: row doesnt exist yet
						// only needed when the first element has 'place_after'.
						// which is silly, but hey.
						$row = array();
						$rows[]=&$row;
					}
				} else {
					// new row
					unset($row);
					$row = array();
					$rows[]=&$row;
				}
				// append column to row
				$row[] = $column;
		}
	} 
	unset($row);
	$html = '';
	foreach($rows as $row){
		
		if(is_string($row)){
			$html.=$row;
		} elseif(is_array($row)){
			$html.='<div class="row-fluid">';
			
			// count columns & small columns
			$span_small = 2;
			$cols = count($row);
			$cols_small = 0;
			foreach($row as $column){
				if($column['small']==TRUE){
					$cols_small++;
				}
			}
			
			$cols_big = $cols - $cols_small;
			$space = 12 - ($span_small *$cols_small);
			if($cols_big >0 && $space > 0){
				$span_big = floor($space / $cols_big);
			} else {
				$span_big = 1;
			}
			
			foreach($row as $column){
				if($column['small']==TRUE){
					$span = $span_small;
				} else {
					$span = $span_big;
				}
				$html.='<div class="colspan-'.$span.'">';
				$html.=$column['html'];
				$html.='</div>';
			}
			
			$html.='</div>';
		}
	}
	echo $html;
	
	?>

</form>