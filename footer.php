<?php
$hide_top_bar = intval(get_theme_mod("hide_details", 0));

$phone_no1= getCustomThemeValue("phone_number1", "1300 00 PAIG");
//for agent profile
$phone_no1=apply_filters("getHashtagPhone",$phone_no1);
$phone_link =  str_replace(" ", "", getCustomThemeValue("phone_number1", "1300007244"));
//for agent profile
$phone_link=apply_filters("getHashtagPhoneLink",$phone_link);

$email = getCustomThemeValue("email_address", "admin@paigtechnologies.com.au");
$email=apply_filters("getHashtagEmail",$email);
$socialItems = getPaigSocialMedia();

$socialItems=apply_filters('getHashtagSocialMedia',$socialItems);

?>
<!-- Footer -->
<div id="footer">
    <!-- Main -->
    <div class="footer-top py-8">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
	                    <?php do_action('HashtagLogoFooter',get_bloginfo('name')); ?>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <h4>Helpful Links</h4>
                    <div class="footer-links">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer_menu',
                                'container' => 'ul',
                                'menu_class'=> 'fa-ul',
                                'link_before'=>'<span class="fa-li"><i class="fas fa-angle-right"></i></span>',
                            ));
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <?php if ($hide_top_bar !== 1): ?>
                        <h4>Contact Us</h4>
                        <div class="text-widget">
                            <ul class="fa-ul address-block">
                                <?php if (!empty(getCustomThemeValue("company_info", ""))): ?>
                                    <li>
                                        <a target="_blank"
                                           href="http://maps.google.com/?q=<?php echo wp_strip_all_tags(getCustomThemeValue("address", "100 Harris Street Pyrmont")); ?>">
                                        <span class="fa-li">
                                            <i class="fas fa-laptop-house"></i>
                                        </span>
                                            <span>
                                            <?php echo getCustomThemeValue("company_info", ""); ?>
                                        </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a target="_blank"
                                       href="http://maps.google.com/?q=<?php echo wp_strip_all_tags(getCustomThemeValue("address", "100 Harris Street Pyrmont")); ?>">
                                        <span class="fa-li">
                                            <i class="fa fa-globe"></i>
                                        </span>
                                        <span>
                                            <?php echo getCustomThemeValue("address", "100 Harris Street, Pyrmont"); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="tel:<?php echo $phone_no1; ?>">
                                        <span class="fa-li">
                                            <i class="fa fa-phone-square"></i>
                                        </span>
                                        <span>
                                            <?php echo $phone_no1; ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo $email; ?>">
                                        <span class="fa-li">
                                            <i class="fa fa-envelope-square"></i>
                                        </span>
                                        <span>
                                             <?php echo $email; ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <ul class="social-icons margin-top-20">

                            <?php

                            foreach ($socialItems as $key => $socialItem) {
                                do_action("showHashtagSocialMedia", $socialItem, $key);
                            }
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom theme-bg">
        <div class="container">
            <!-- Copyright -->
            <div class="row items-center">
                <div class="col-md-4 col-xs-12 cs-text-center md:text-left">
                    <div class="cr1 mb-4 md:mb-0">Copyright © <a
                                href="<?php echo getCustomThemeValue("copyright_url") ?>" target="#">
                            <?php echo getCustomThemeValue("copyright_text", current_time('Y') . " " . get_bloginfo("Name")); ?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 text-center">
                    <div class="privacy-div">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'policy_menu',
                            'menu_class' => 'block text-center',
                            'item_class'=>'inline-block',
                            'container' => 'ul',
                            'menu_id' => 'responsive',
                            'walker' => new Hashtag\Theme\WP_Bootstrap_Navwalker()
                        ));
                        ?>

                    </div>
                </div>
                <div class="col-md-4 col-xs-12 cs-text-center md:text-right">
                    <div class="powered-by">Powered By
                        <a href="<?php echo getCustomThemeValue("poweredby_url", "http://www.paigtechnologies.com.au/") ?>"
                           target="#">
                            <?php
                            echo getCustomThemeValue("poweredby_text", "PAIG Technologies");
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->
<?php wp_footer(); ?>

</body>

</html>