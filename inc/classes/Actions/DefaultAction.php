<?php
namespace Hashtag\Actions;

class DefaultAction
{
    private static $instance;
    private $page_id;
    public function __construct()
    {

        $this->page_id = get_option('page_on_front');
        if(!is_favicon()){
            add_action("wp_head",array($this,'showFavicon'));
        }
        add_action("HashtagLogo",array($this,'renderCustomLogo'),10);
        add_action("HashtagLogoFooter",array($this,'renderFooterLogo'),10);
        add_action("wp_head",array($this,'renderAnalytics'),99);
        add_action("showHashtagSocialMedia",array($this,'addSocialIcons'),10,2);
        add_action("HashtagBannerAfterHeader",array($this,'loadBannerAfterHeader'),10);
        add_action("sectionClasses",array($this,'addCustomSectionClass'));
        add_action('HashtagTopSectionTitle',array($this,'renderTopTitle'),10,2);
        add_action('HashtagSectionTitle',array($this,'renderTitle'),10,2);
        add_action('HashtagWhatWeDo',array($this,'renderWhatWeDo'));
        add_action('HashtagHotOpportunities',array($this,'renderHotOpportunities'));
        add_action('hashtagWhatWeDoContent',array($this,'renderWhatWeDoContent'));
        add_action('HashtagWhatWeOffer',array($this,'renderWhatWeOffer'));
        add_action('HashtagMiddleBanner',array($this,'renderMiddleBanner'),10);
        add_action('HashtagWhyChooseUs',array($this,'renderWhyChooseUs'));
        add_action('HashtagBeforeFooter',array($this,'renderBottomBanner'),10);
        add_action('HashtagBeforeFooter',array($this,'renderContactMap'),20);
    }

    public static function getInstance() {
        self::$instance=self::$instance===null?new self:self::$instance;
        return self::$instance;
    }
    
    public function showFavicon(){
        $link=get_template_directory_uri() . "/assets/img/favicon.ico";
        // var_dump($link);
       echo sprintf("<link rel='icon' href='%s' />",$link);
    }

    public function renderCustomLogo(){
        get_template_part("template-parts/header/logo",null,[
            'name'=>get_bloginfo('name'),
            'wrapper_id'=>'logo',
        ]);
    }
    public function renderFooterLogo(){
    	$logo='https://paig.com.au/wp-content/uploads/1/2020/07/cropped-paig.jpg';
    	if(has_custom_logo()){
    		$logo=wp_get_attachment_image(get_theme_mod('custom_logo'), 'full');
	    }
        get_template_part("template-parts/header/logo",null,[
            'name'=>get_bloginfo('name'),
	        'wrapper_id'=>'footer-logo',
	        'logo'=>$logo
        ]);
    }
    
    public function renderAnalytics(){
        $google_id =  getCustomThemeValue("google_analytics", false);
        $facebook_id=getCustomThemeValue("facebook_pixel", "201889034433353");
        get_template_part("template-parts/components/analytics",null,[
            'google_id'=>$google_id,
            'facebook_id'=>$facebook_id
        ]);
    }

    public function addSocialIcons($name,$key){
        $value=getCustomThemeValue($name);
        if (!empty($value)){
            get_template_part("template-parts/components/socials",null,[
                'iconName'=>$name,
                'link'=>$value
            ]);
        }
    }

    public function loadBannerAfterHeader($banner_image){
        $content=apply_filters("HashtagBannerContent",$this->page_id);
    
        if(intval($content)!==$this->page_id){
            $content=do_shortcode("[paig_property_search]");
        }
        get_template_part("template-parts/page/home/banner",null,[
            'content'=>$content,
            'banner'=>$banner_image
        ]);
    }

    public function addCustomSectionClass($classes){
        return $classes." py-24";
    }

    public function renderTopTitle($content,$template=null){
        $template=is_null($template)?"template-parts/components/box/title":$template;
        get_template_part($template,null,[
            'content'=>$content
        ]);
    }

    public function renderTitle($content,$template=null){
        $template=is_null($template)?"template-parts/components/section/title":$template;
        get_template_part($template,null,[
            'content'=>$content
        ]);
    }


    public function renderWhatWeDo(){
        get_template_part("template-parts/page/home/what-we-do", null, array(
            'content' => get_post_meta($this->page_id, 'what_we_do_desc', true),
            'title' => 'What We Do',
            'isBoxTitle' => false,
            'sectionClasses' => 'fullwidth margin-top-0 offer-section py-0',
        ));
    }

    public function renderWhatWeDoContent($content){
        get_template_part("template-parts/default/home/whatwedo_content", null, array(
            'content' => $content
        ));
    }

    public function renderHotOpportunities(){
        get_template_part("template-parts/page/home/hot-opportunities");
    }

    public function renderWhatWeOffer(){
        $content=apply_filters('HashtagWhatWeOfferContent',getOfferMetaValues($this->page_id));
        get_template_part("template-parts/page/home/what-we-offer", null, array(
            'content' => $content,
            'title' => 'What We Offer',
            'isBoxTitle' => false,
            'sectionClasses' => 'fullwidth margin-top-0 offer-section py-0'
        ));
    }

    public function renderWhyChooseUs(){
        get_template_part("template-parts/page/home/why-choose-us", null, array(
            'content' => getServiceMetaValues($this->page_id),
            'title' => 'Why Choose Us',
            'isBoxTitle' => false,
            'sectionClasses' => 'fullwidth margin-top-0 offer-section py-0'
        ));
    }

    public function renderMiddleBanner(){
        $banner=apply_filters("HashtagMiddleBannerContent",get_front_banner("middle_banner"));
        // var_dump($banner);
        get_template_part("template-parts/page/home/cs-banner-static",null,$banner);
    }

    public function renderBottomBanner(){
        $banner=apply_filters("HashtagBottomBannerContent",get_front_banner("bottom_banner"));
        get_template_part("template-parts/page/home/cs-banner",null,$banner);
    }

    public function renderContactMap(){
        get_template_part("template-parts/forms/book-time");
    }
}