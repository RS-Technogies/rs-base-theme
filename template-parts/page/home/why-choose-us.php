<?php
$content=isset($args['content'])?$args['content']:"";
$sectionClasses = apply_filters('sectionClasses',"fullwidth margin-top-0 offer-section why-choose-us py-10");
?>
<section class="<?php echo $sectionClasses ?>" id="why-choose-us">
    <div class="container">
        <?php
        if(is_array($content) && count($content)>0):
            do_action("HashtagSectionTitle","Why Choose Us");
        endif;
        ?>
        <div class="row flex flex-wrap">
            <?php if(is_array($content)): ?>
                <?php $classOuter = count($content) >1?"md:w-1/3 w-full p-5 flex":" text-center w-full";
                $classInner = count($content) >1?"single-service w-full":"text-center w-full";
                foreach ($content as $service) : ?>
                    <div class="<?php echo $classOuter ?>">
                        <!-- Single Service -->
                        <div class="<?php echo $classInner ?>">
                            <?php if(isset($service['iconClass']) && !empty($service['iconClass'])): ?>
                            <i class="<?php echo $service['iconClass']; ?>"></i>
                            <?php endif; ?>
                            <h4><?php echo isset($service['title']) ? $service['title'] : ""; ?> </h4>
                            <p><?php echo isset($service['content']) ? $service['content'] : ""; ?></p>
                        </div>
                    </div>

                <?php  endforeach;?>
            <?php else: ?>
                <div class="col-lg-12">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>