<?php
$content = isset($args['content']) ? $args['content'] : "";
$i = 0;
$class_name = "col-md-4";
$sectionClasses = apply_filters('sectionClasses',"fullwidth margin-top-0 offer-section why-choose-us");

?>
<?php if (!empty($content)): ?>
    <!-- Fullwidth Section -->
    <section class="<?php echo $sectionClasses ?>" data-background-color="#ffffff"
             id="what-we-offer">
        <!-- Content -->
        <div class="container">

            <?php do_action("HashtagSectionTitle","What We Offer"); ?>
            <div class="row">
                <?php if (is_array($content)): ?>
                    <?php foreach ($content as $index => $offer):
                        if ($i !== 0 && $i < 3) {
                            $class_name = "col-md-8";
                        } else if ($i <= 4) {
                            $class_name = "col-md-4";
                        }
                        $i == 4 ? $i = 1 : $i++;
                        $offer["url"] = !empty($offer["url"]) ? $offer["url"] : "/search_properties";
                        ?>
                        <div class="<?php echo $class_name ?>">
                            <!-- Image Box -->
                            <a href="<?php echo $offer["url"] ?>" class="img-box"
                               data-background-image="<?php echo $offer['icon']; ?>">
                                <!-- Badge -->
                                <div class="img-box-content visible">
                                    <h4><?php echo $offer['title']; ?></h4>
                                </div>
                            </a>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>
                <div class="col-md-12">
                    <?php echo $content; ?>
                </div>

                <?php endif; ?>


            </div>
        </div>
    </section>
<?php endif; ?>