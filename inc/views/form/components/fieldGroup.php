<?php
use Hashtag\Theme\Contact\Field\HashtagFieldFactory;
?>
<div class="steps">
    <div class="step-block">
		<?php

$form_id=$data['form_id'];

		foreach($data['fields'] as $key=>$field):
			$attributes=isset($field['attributes'])?$field['attributes']:[];
			$type=isset($field['type'])?$field['type']:'text';
			$container_class=isset($field['container_class'])?$field['container_class']:"";
			$options=isset($field['options'])?$field['options']:[];
			$placeholder=isset($attributes['placeholder'])?$attributes['placeholder']:"";
			$fieldType=ucfirst($type);
			$form_id=ucfirst($form_id);
			?>
            <div class="<?php echo $container_class; echo " ".$key; ?> ">

				<?php
				echo apply_filters("HashtagForm{$form_id}{$fieldType}Render",HashtagFieldFactory::getField($type,$key,$options,$attributes));?>
				<?php if($key !=='button' ):?>
                    <error-list classes="text-red-400"></error-list>
				<?php endif; ?>
            </div>
		<?php endforeach; ?>
    </div>
</div>