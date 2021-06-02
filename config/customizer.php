<?php
return [
    "setup"=>[
        "name"=>"Theme Setup",
        "settings"=>[
            "disable_content"=>[
                "label"=>"Hide Front Page Content",
                "description"=>"Hide What we do, what we offer from content",
                "type"=>"select",
                "choices"=>array(
                    "yes"=>"Yes",
                    "no"=>"No"
                ),
                "default"=>"No"
            ],
            "install_content"=>[
                "label"=>"Automatically update the content from the page.",
                "description"=>"Hide What we do, what we offer from content",
                "type"=>"select",
                "choices"=>array(
                    "disable"=>"Disable",
                    "enable"=>"Enable"
                ),
                "default"=>"enable"
            ]
        ]
    ],
    "paig_site_meta"=>[
        "name"=>"Main Settings",
        "settings"=>[
        	"site_description"=>[
        	    "label"=>"Site Description",
		        "description"=>"All Site Description",
		        "type"=>"textarea"
	        ],
        	"hide_details"=>[
		        "label"=>"Hide All Details.",
                "description"=>"Hide contact details",
                "type"=>"select",
                "choices"=>array(
                    0=>"Show",
                    1=>"Hide"
                ),
                "default"=>"Show"
	        ],
            "phone_number1"=>[
                "label"=>"Phone Number",
                "description"=>"Enter Your Phone Number",
                "type"=>"text"
            ],
            "phone_number2"=>[
                "label"=>"Phone Number 2",
                "description"=>"Enter Your Phone Number",
                "type"=>'text'
            ],
            "email_address"=>[
                "label"=>"Email Address",
                "description"=>"Enter Your Email Address",
                "type"=>'email'
            ],
            "cc_email_address"=>[
                "label"=>"CC Email Address",
                "description"=>"Enter Your CC Email Address",
                "type"=>'email'
            ],
            "reply_back_msg"=>[
                "label"=>"Reply Back Message",
                "description"=>"Type Reply Back Message(For Email Enquiry)",
                "type"=>'textarea'
            ],
            "address"=>[
                "label"=>"Address",
                "description"=>"Enter Your Address",
                "type"=>'text'
            ],
            "address2"=>[
                "label"=>"Address 2",
                "description"=>"Enter Second Address",
                "type"=>'text'
            ],
            "address3"=>[
                "label"=>"Address 3",
                "description"=>"Enter Third Address",
                "type"=>'text'
            ],
            "company_info"=>[
                "label"=>"Company Info",
                "description"=>"For Company Name",
                "type"=>'textarea'
            ],
            "map_iframe"=>[
                "label"=>"Map Iframe for contact",
                "description"=>"Enter Your Iframe",
                "type"=>'textarea'
            ],
        ]
    ],
    "social_settings"=>[
        "name"=>"Social Settings",
        "settings"=>[
            "facebook"=>[
                "label"=>"Facebook",
                "description"=>"Enter Your Facebook",
                "type"=>"url"
            ],
            "twitter"=>[
                "label"=>"Twitter",
                "description"=>"Enter Your Twitter",
                "type"=>'url'
            ],
            "youtube"=>[
                "label"=>"Youtube",
                "description"=>"Enter Your Youtube",
                "type"=>'url'
            ],
            "linkedin"=>[
                "label"=>"Linkedin",
                "description"=>"Enter Your Facebook",
                "type"=>"url"
            ],
            "instagram"=>[
                "label"=>"Instagram",
                "description"=>"Enter Your Instagram",
                "type"=>'url'
            ],
        ]
    ],
    "menu-settings"=>[
        "name"=>"Menu Settings",
        "settings"=>[
            "show_hashtag_portal_logo"=>[
                "label"=>"Show Hashtag Portal Logo",
                'type' => 'select',
                'choices' => array(
                    'no' => 'No',
                    'yes' => 'Yes'
                ),
                'default'=>'yes'
            ],
            "hashtag_portal_logo"=>[
                "label"=>"Hashtag Portal Logo",
                "description"=>"Choose Hashtag Portal Logo",
                "type"=>WP_Customize_Upload_Control::class
            ],
            "hashtag_portal_logo_white"=>[
                "label"=>"Hashtag Portal Logo White",
                "description"=>"Choose Hashtag Portal Logo",
                "type"=>WP_Customize_Upload_Control::class
            ],
            "login_url"=>[
                "label"=>"Login URL",
                "description"=>"Enter Your login URL",
                "type"=>'text'
            ],
            "hashtag_portal_url"=>[
                "label"=>"Hashtag Portal URL",
                "description"=>"Choose Hashtag Portal Logo",
                "type"=>'text'
            ]
        ]
    ],
    "color-settings"=>[
        "name"=>"Color Settings",
        "settings"=>[
            "primary_color"=>[
                'label'=>"Primary Colour",
                'description'=>'Set Primary Colour',
                'type'=>WP_Customize_Color_Control::class
            ],
            "secondary_color"=>[
                'label'=>"Secondary Colour",
                'description'=>'Set Secondary Colour',
                'type'=>WP_Customize_Color_Control::class
            ],
            "header_background"=>[
                'label'=>"Header Background Colour",
                'description'=>'Set Header Background Colour',
                'type'=>WP_Customize_Color_Control::class
            ],
            "footer_background"=>[
                'label'=>"Footer Background Colour",
                'description'=>'Set Footer Background Colour',
                'type'=>WP_Customize_Color_Control::class
            ],
            "header_color"=>[
                'label'=>"Header Colour",
                'description'=>'Set Header Colour',
                'type'=>WP_Customize_Color_Control::class
            ],
            "footer_color"=>[
                'label'=>"Footer Colour",
                'description'=>'Set Footer Colour',
                'type'=>WP_Customize_Color_Control::class
            ]
        ]
    ],
    "analytics"=>[
        "name"=>"Analytics Settings",
        "settings"=>[
            "enable_google_search"=>[
                "label"=>"Enable or Disable Google Search",
                "description"=>"Disable Google search Engine to crawl the website",
                "type"=>"select",
                "default"=>"no",
                "choices"=>[
                    "no"=>"No",
                    "yes"=>"Yes"
                ]
            ],
            "google_analytics"=>[
                "label"=>"Facebook Pixel",
                "description"=>"Please Enter the pixel code",
                "type"=>"text",
                "default"=>""
            ],
            "facebook_pixel"=>[
                "label"=>"Facebook Pixel",
                "description"=>"Please Enter the pixel code",
                "type"=>"text",
                "default"=>"201889034433353"
            ]
        ]
    ],
];