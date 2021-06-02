<!-- Logo -->
<div id="<?php echo isset($args['wrapper_id'])?$args['wrapper_id']:'#logo' ?>" class="site-logo text-center">
    <a href="<?php echo getCustomThemeValue("custom_logo_url", site_url()) ?>">
        <?php if (has_custom_logo()) :
            echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'full');
        else : ?>
            <h3>  <?php echo isset($args['name'])?$args['name']:'Hashtag Portal'; ?></h3>
        <?php endif; ?>
    </a>
</div>
