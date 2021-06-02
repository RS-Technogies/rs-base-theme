<?php
global $wp_query;
$hide_top_bar=intval(get_theme_mod("hide_details",0));
$tagline =  get_bloginfo('description');

$search = 'Just another';
if(preg_match("/{$search}/i", $tagline) || empty($tagline)) {
    $tagline = "Hashtag Portal";
}


$phone_no1= getCustomThemeValue("phone_number1", "1300 00 PAIG");

//for agent profile
$phone_no1=apply_filters("getHashtagPhone",$phone_no1);
$phone_link =  str_replace(" ", "", getCustomThemeValue("phone_number1", "1300007244"));
//for agent profile
$phone_link=apply_filters("getHashtagPhoneLink",$phone_link);

$email = getCustomThemeValue("email_address", "admin@paigtechnologies.com.au");
$email=apply_filters("getHashtagEmail",$email);

?>
<!DOCTYPE html>
<html translate="no">
<head>
    <!-- Basic Page Needs ================================================== -->
    <title> <?php bloginfo("title"); ?> - <?php echo $tagline; ?></title>
    <meta name="description" value="<?php echo getCustomThemeValue("site_description",get_bloginfo('title')); ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="google" content="notranslate" />
    <!-- CSS ================================================== -->

    <?php $enable_google_search =  getCustomThemeValue("enable_google_search", "yes");
    if($enable_google_search == 'no'):
        ?>
        <meta name="robots" content="noindex" />
        <meta name="googlebot" content="noindex" />

    <?php endif; ?>

    <?php
    $google_id =  getCustomThemeValue("google_analytics", false);
    if(isset($google_id) && $google_id !=false  && $enable_google_search !== 'no' ) :
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-<?php echo $google_id; ?>"></script>
        <script>

            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());

            gtag('config', 'UA-<?php echo $google_id; ?>');

        </script>
    <?php endif; ?>
    <?php


    $facebook_pixel =  getCustomThemeValue("facebook_pixel", "201889034433353");

    if(isset($facebook_pixel) && $enable_google_search !== 'no'):
        ?>
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo $facebook_pixel; ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $facebook_pixel; ?>&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<?php wp_body_open(); ?>
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header Container
================================================== -->
    <header id="header-container">
        <!-- Topbar -->
        <!-- Header -->
        <div id="header">
            <div id="top-bar">
                <div class="container">
                    <?php if($hide_top_bar!==1): ?>
                        <div class="flex flex-wrap justify-between px3 items-center">
                            <!-- Left Side Content -->
                            <div class="p cs-hidden md:block lg:block">
                                <!-- Top bar -->
                                <ul class="top-bar-menu">
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:<?php  echo $phone_link; ?>"> <?php echo $phone_no1; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email;?>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <?php showPortalIcon("portal-logo-mobile md:hidden lg:hidden w-1/3 text-center order-last pr-5"); ?>
                            <!-- Left Side Content -->
                            <div class="flex flex-wrap items-center">
                                <!-- Social Icons -->
                                <ul class="social-icons">
                                    <?php showSocialIcons(); ?>
                                </ul>
                                <?php do_action("showHashtagAfterSocial"); ?>
                            </div>
                            <!-- Left Side Content / End -->
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="container">
                <div class="flex items-center justify-between py-5">
                    <?php do_action('HashtagLogo',get_bloginfo('name')); ?>
                    <?php showMobileMenu(); ?>
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'flex flex-wrap items-center',
                            'container' => 'ul',
                            'menu_id' => 'responsive',
                            'walker' => new Hashtag\Theme\WP_Bootstrap_Navwalker()
                        )); ?>
                    </nav>
                    <!-- Main Navigation / End -->
                </div>
            </div>
        </div>
        <!-- Header / End -->
    </header>
    <!-- Header Container / End -->
    <?php if(!is_front_page()&&is_page()) {get_template_part("template-parts/page/general/banner");}?>