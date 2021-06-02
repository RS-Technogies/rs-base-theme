<?php
use Hashtag\Theme\Contact\Field\HashtagFieldFactory;
?>
<?php do_action('HashtagBeforeContactFormTemplate','container'); ?>
<form id="hashtag-contact-form" class="hashtag-contactform" name="contact_form" autocomplete="on">
    <h2><?php echo $title; ?></h2>
    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" />
    <input type="hidden" name="nonce" value="<?php echo $nonce ?>" />
    <input type="hidden" name="action" value="custom_form_submit" />
    <div class="contact-message">

    </div>
    <div class="<?php echo $class ?>">

        <?php
        foreach($fields as $key=>$field):
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
</form>
<?php do_action('HashtagAfterContactFormTemplate','container'); ?>