<?php
$i=0;
$content=isset($args['content'])?$args['content']:"";
$sectionClasses = apply_filters('sectionClasses',"fullwidth margin-top-0 offer-section what-we-offer");
?>
<!-- Fullwidth Section -->
<section class="<?php echo $sectionClasses  ?>"  id="what-we-offer">
    <!-- Box Headline -->
    <!-- Content -->
    <div class="container">
        <?php do_action("HashtagSectionTitle","What We Offer"); ?>
        <div class="row">
            <?php if(is_array($content)):foreach ($content as $index=>$offer) : ?>
                <?php 
                    $default=[
                        'title'=>isset($offer['title']) ? $offer['title'] : "",
                        'content'=>isset($offer['content']) ? $offer['content'] : "",
                        'icon'=>isset($offer['iconClass'])?$offer['iconClass']:"",
                        'index'=>$index
                    ];
                    $template='template-parts/components/box/content';
                    if(!empty($offer['icon'])){
                        $template='template-parts/components/box/image';
                        $default['url']=$offer['url'];
                        $default['icon']=$offer['icon'];
                        $default['index']=$i;
                        $i == 4 ? $i = 1 : $i++;
                    }
                ?>
                <?php get_template_part($template,null,$default); ?>
            <?php endforeach;else: ?>
                <div class="">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>             
        </div>
    </div>
</section>
<!-- Fullwidth Section / End -->