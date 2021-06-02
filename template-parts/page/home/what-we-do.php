<?php
$content = isset($args['content']) ? $args['content'] : "";
$sectionClasses = isset($args['sectionClasses']) ? $args['sectionClasses'] : 'fullwidth margin-top-0 offer-section py-24';

$sectionClasses = apply_filters('sectionClasses',$sectionClasses);
?>

<?php
    do_action("HashtagTopSectionTitle", "What We Do", 'template-parts/components/box/title');
?>

<!-- Fullwidth Section -->
<section class="<?php echo $sectionClasses; ?>"
         data-background-color="#fff" id="what-we-do">
    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php do_action('hashtagWhatWeDoContent',$content); ?>
        </div>
    </div>
</section>