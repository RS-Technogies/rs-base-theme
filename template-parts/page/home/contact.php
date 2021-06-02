<?php
$company_info = getCustomThemeValue("company_info", "");
$address = getCustomThemeValue("address", "100 Harris Street Pyrmont");
$address2 = getCustomThemeValue("address2", "");
$address3 = getCustomThemeValue("address3", "");

$map_address = wp_strip_all_tags(getCustomThemeValue("address", "100 Harris Street Pyrmont"));
$map_address2 = wp_strip_all_tags(getCustomThemeValue("address2", ""));
$map_address3 = wp_strip_all_tags(getCustomThemeValue("address3", ""));

$phone_number = getCustomThemeValue('phone_number1', '1300007244');
$phone_number2 = getCustomThemeValue('phone_number2', '');
$email_address = getCustomThemeValue("email_address", "admin@paigtechnologies.com.au");
$title = urlencode(get_bloginfo("name"));



//for agent profile
$phone_number=apply_filters("getHashtagPhone",$phone_number);
$email_address=apply_filters("getHashtagEmail",$email_address);
//if agent profile page override phone email and social media data;
?>
<div class="container my-16" id="contact-section">
    <div class="row">
        <!-- Contact Details -->
        <div class="col-md-4">
            <h4 class="headline margin-bottom-30">Office Address</h4>
            <!-- Contact Details -->
            <div class="sidebar-textbox">
                <ul class="contact-details">

                    <?php if(!empty($company_info)): ?>

                        <li>
                            <i class="im im-icon-Project"></i> <strong><?php echo $company_info; ?></strong>
                        </li>
                    <?php endif; ?>


                    <li><i class="im im-icon-Globe"></i> <strong>Address:</strong>
                        <span>
                                <a target="_blank"
                                   href="http://maps.google.com/?q=<?php echo $map_address; ?>">
                                    <?php echo $address; ?>
                                </a>
                        </span>
                        <?php if(!empty($map_address2)): ?>
                        <span>
                            <hr class="m-0">
                                <a target="_blank"
                                   href="http://maps.google.com/?q=<?php echo $map_address2; ?>">
                                    <?php echo $address2; ?>
                                </a>
                        </span>
                        <?php endif; ?>
                        <?php if(!empty($map_address3)): ?>
                        <span>
                            <hr class="m-0">
                                <a target="_blank"
                                   href="http://maps.google.com/?q=<?php echo $map_address3; ?>">
                                    <?php echo $address3; ?>
                                </a>
                        </span>
                        <?php endif; ?>
                    </li>
                    <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong>
                        <span class="w-full"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span>
                        <?php if(!empty($phone_number2)): ?>
                        <span class="w-full">
                             <hr class="m-0">
                            <a href="tel:<?php echo $phone_number2; ?>"><?php echo $phone_number2; ?></a></span>
                        <?php endif; ?>
                    </li>
                    <li><i class="im im-icon-Envelope"></i> <strong>Email:</strong> <span><a
                                    href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></span>
                    </li>
                </ul>
            </div>

        </div>
        <!-- Contact Form -->
        <div class="col-md-8">

            <?php echo do_shortcode("[HashtagContactForm form_id='contact-us' network_form='1' title='Contact Us' class='row']"); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- Container / End -->


</div>


<!-- Map Container -->
<div class="contact-map">
    <!-- Google Maps -->
    <div class="w-full">
        <iframe width="100%"
                height="600"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urldecode($map_address) ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>
    <!-- Google Maps / End -->
</div>