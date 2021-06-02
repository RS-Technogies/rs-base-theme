<?php

use PAIG\Common\Option;

define( "HASHTAG_THEME_VERSION", "1.35" );
define( "HASHTAG_STYLE_VERSION", "1.1.20" );
define( "HASHTAG_SCRIPT_VERSION", "1.1.5" );

define( "HASHTAG_CHILD_DIRECTORY", get_stylesheet_directory() );
define( "HASHTAG_CHILD_URL", get_stylesheet_directory_uri() );

define( "HASHTAG_THEME_URL", get_template_directory_uri() );
define( "HASHTAG_THEME_DIRECTORY", get_template_directory() );

include HASHTAG_THEME_DIRECTORY . "/inc/init.php";

add_action( "wp_enqueue_scripts", "add_stylesheet_script" );

function add_stylesheet_script() {
	$css_folder = get_template_directory_uri() . "/assets/dist/";
	// wp_enqueue_style( 'base-ndis-style', $css_folder . "style.css", array(), HASHTAG_STYLE_VERSION );
	// wp_enqueue_style( 'ndis-user', $css_folder . "user.css", array(), HASHTAG_STYLE_VERSION );
	wp_enqueue_style( 'ndis-color', $css_folder . "18.style.min.css", array(), HASHTAG_STYLE_VERSION );
	// wp_enqueue_style( 'ndis-style', get_stylesheet_uri(), array(), HASHTAG_STYLE_VERSION );
//	if(!is_plugin_active('hashtag-properties')){
		wp_enqueue_style("tailwind-css",'https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css');
//	}
}

add_action("wp_footer","add_google_font_script");

function add_google_font_script(){?>
	<script>
		WebFontConfig = {
			google: {
				families: ['Open Sans:400,700']
			}
		};

		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>		
<?php
}

if ( ! function_exists( 'getDefaultSectionClasses' ) ) {
	function getDefaultSectionClasses() {
		return 'fullwidth margin-top-0 offer-section py-24';
	}
}

add_filter( "HashtagContactTo", function ( $to ) {
	if ( class_exists( Option::class ) ) {
		$to = ! empty( Option::getValue( "email" ) ) ? Option::getValue( "email" ) : get_theme_mod( "email_address", get_option( 'admin_email' ) );
	}
	$to = "ramesh@paigtechnologies.com.au";

	return $to;
}, 10 );

add_filter( "HashtContactCC", function ( $cc ) {
	if ( class_exists( Option::class ) ) {
		$cc = Option::getValue( "cc_email" );
	}

	return $cc;
} );
