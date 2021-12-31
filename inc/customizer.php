<?php
/**
 * discovery Theme Customizer
 *
 * @package discovery
 */

function discovery_customize_register( $wp_customize ) {
	function tidyup( $html ) {
		return wp_filter_post_kses( $html );
	}

	$wp_customize->add_section( 'discovery_settings' , array(
		'title'      => __( 'Discovery Style Settings', 'discovery' ),
		'priority'   => 30,
	));
	
	$wp_customize->add_section( 'discovery_social_settings' , array(
		'title'      => __( 'Discovery Social Settings', 'discovery' ),
		'priority'   => 30,
	));

	// color settings
	function MakeColorMod($n, $l, $d, $wp_customize){
		$wp_customize->add_setting( 'discovery_' . $n, array(
			'label'      => __( $l, 'discovery' ),
			'section'    => 'discovery_settings',
			'default'     => $d,
			'sanitize_callback'    => 'tidyup'
		));	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'discovery_' . $n, array(
			'label'      => __( $l, 'discovery' ),
			'section'    => 'discovery_settings',
			'settings'   => 'discovery_' . $n,
		) ) );
	}
	
	// name, label, default
	MakeColorMod("postLink", "Post/Page Link Color", "#3880ff", $wp_customize);
	MakeColorMod("postLinkHover", "Post/Page Link Hover Color", "#222", $wp_customize);
	MakeColorMod("postLinkHoverBackground", "Post/Page Link Hover Background color", "#fff", $wp_customize);
	MakeColorMod("postContent", "Post Text Color", "#777", $wp_customize);
	
	MakeColorMod("navBackground", "Navigation Background", "#222", $wp_customize);
	MakeColorMod("navLink", "Navigation Link Color", "#fff", $wp_customize);
	MakeColorMod("navLinkHover", "Navigation Link Hover Color", "#fff", $wp_customize);
	MakeColorMod("navLinkBackgroundHover", "Navigation Link Hover Background Color", "#df4c34", $wp_customize);
	
	MakeColorMod("introductionTitle", "Intriduction Title Color", "#222", $wp_customize);
	
	MakeColorMod("buttonBackground", "Global Button Background Color", "#222", $wp_customize);
	MakeColorMod("buttonHoverBackground", "Global Button Hover Background Color", "#222", $wp_customize);
	MakeColorMod("buttonText", "Global Button Text Color", "#fff", $wp_customize);
	MakeColorMod("buttonHoverText", "Global Button Hover Text Color", "#999", $wp_customize);
	
	MakeColorMod("footerBackground", "Footer Background color", "#222", $wp_customize);
	MakeColorMod("footerText", "Footer Text Color", "#fff", $wp_customize);
	MakeColorMod("footerLink", "Footer Link Color", "#fff", $wp_customize);
	MakeColorMod("footerLinkHover", "Footer Link Hover Color", "#999", $wp_customize);
	MakeColorMod("footerLinkBackgroundHover", "Footer Link Background Hover Color", "#222", $wp_customize);
	
	MakeColorMod("categoryLink", "Category Link Color", "#fff", $wp_customize);
	MakeColorMod("categoryLinkHover", "Category Link Hover Color", "#fff", $wp_customize);
	MakeColorMod("categoryLinkBackgroundHover", "Category Link Hover Background Color", "#fff", $wp_customize);
	
	MakeColorMod("indicatorBackground", "Indicator Background", "#df4c34", $wp_customize);
	MakeColorMod("indicatorColor", "Indicator Color", "#fff", $wp_customize);
	
	MakeColorMod("accentColor", "Accent Color", "#df4c34", $wp_customize);
	
	
	// font settings
	$wp_customize->add_setting( 'discovery_option_font', 
		array(
		'default'    => 'yes', 
		'type'       => 'theme_mod', 
		'sanitize_callback'    => 'tidyup'
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'discovery_option_font', array(
			'label'      => __( 'Font Selection', 'discovery' ), 
			'description' => __( "Select the font pairing that most suites you.", 'discovery' ),
			'settings'   => 'discovery_option_font',
			'section'    => 'discovery_settings', 
			'type'    => 'select',
			'choices' => array(
				'01' => "Playfair Display & Inter",
				'02' => "Lore & Meriweather",
				'03' => "Rubik & Karla",
				'04' => "Work Sans & Work Sans",
				'05' => "Space Mono & Space Mono",
				'06' => "Poppins & PT Sans",
				'07' => "Asap & Asap",
				'08' => "Halant & Nunito Sans",
				'09' => "Spectral & Karla",
				'10' => "Dosis & Dosis",
				'11' => "Alegreya & Alegreya Sans",
				'12' => "Cabin & Old Standard",
				'13' => "Istok Web & Lora",
				'14' => "Playfair Display & Alice",
				'15' => "Quattrocentro & Fanwood",
				'16' => "Poppins & Anonymous Pro",
			)
		)
	) );
	
	// social settings
	$wp_customize->add_setting( 'discovery_url_facebook', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_url_facebook',
			array(
				'label'      => __( 'Facebook Profile URL', 'discovery' ),
				'description' => __( "eg https://facebook.com/username", 'discovery' ),
				'section'    => 'discovery_social_settings',
				'settings'   => 'discovery_url_facebook',
			)
		)
	);
	
	$wp_customize->add_setting( 'discovery_url_twitter', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_url_twitter',
			array(
				'label'      => __( 'Twitter Profile URL', 'discovery' ),
				'description' => __( "eg https://twitter.com/username", 'discovery' ),
				'section'    => 'discovery_social_settings',
				'settings'   => 'discovery_url_twitter',
			)
		)
	);
	
	$wp_customize->add_setting( 'discovery_url_instagram', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_url_instagram',
			array(
				'label'      => __( 'Instagram Profile URL', 'discovery' ),
				'description' => __( "eg https://instagram.com/username", 'discovery' ),
				'section'    => 'discovery_social_settings',
				'settings'   => 'discovery_url_instagram',
			)
		)
	);
	
	$wp_customize->add_setting( 'discovery_url_snapchat', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_url_snapchat',
			array(
				'label'      => __( 'Snapchat Profile URL', 'discovery' ),
				'description' => __( "eg https://snapchat.com/username", 'discovery' ),
				'section'    => 'discovery_social_settings',
				'settings'   => 'discovery_url_snapchat',
			)
		)
	);
	
	$wp_customize->add_setting( 'discovery_url_tiktok', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_url_tiktok',
			array(
				'label'      => __( 'TikTok Profile URL', 'discovery' ),
				'description' => __( "eg https://tiktok.com/username", 'discovery' ),
				'section'    => 'discovery_social_settings',
				'settings'   => 'discovery_url_tiktok',
			)
		)
	);
	
	// home page settings
	$wp_customize->add_setting( 'discovery_welcome_title', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_welcome_title',
			array(
				'label'      => __( 'Welcome Headline', 'discovery' ),
				'description' => __( "eg Welcome to my glorious site!", 'discovery' ),
				'section'    => 'static_front_page',
				'settings'   => 'discovery_welcome_title',
			)
		)
	);
	
	$wp_customize->add_setting( 'discovery_welcome_button_text', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_welcome_button_text',
			array(
				'label'      => __( 'Welcome Button Label', 'discovery' ),
				'description' => __( "eg Learn More", 'discovery' ),
				'section'    => 'static_front_page',
				'settings'   => 'discovery_welcome_button_text',
			)
		)
	);
	$wp_customize->add_setting( 'discovery_welcome_button_link', array('sanitize_callback'    => 'tidyup'));
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'discovery_welcome_button_link',
			array(
				'label'      => __( 'Welcome Button Link', 'discovery' ),
				'description' => __( "eg https://google.com", 'discovery' ),
				'section'    => 'static_front_page',
				'settings'   => 'discovery_welcome_button_link',
			)
		)
	);
}
add_action( 'customize_register', 'discovery_customize_register' );


function discovery_customize_preview_js() {
	wp_enqueue_script( 'discovery-customizer', get_template_directory_uri() . '/inc/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'discovery_customize_preview_js' );