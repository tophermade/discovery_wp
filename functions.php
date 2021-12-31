<?php
if ( ! defined( '_THEME_VERSION' ) ) {
	define( '_THEME_VERSION', '0.0.1' );
}

if ( ! function_exists( 'discovery_setup' ) ) :
	function discovery_setup() {
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'post-thumbnails' );
		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 120,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Header', 'discovery' ),
				'menu-2' => esc_html__( 'Footer', 'discovery' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'discovery_setup' );


function discovery_scripts() {
	wp_enqueue_style( 'discovery-style', get_template_directory_uri() . '/assets/style.css', array(), _THEME_VERSION );
	wp_enqueue_script( 'discovery-js', get_template_directory_uri() . '/assets/scripts.js', array(), _THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'discovery_scripts' );


remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );


if( ! function_exists( 'discovery_comments' ) ){
	function discovery_comments($comment, $args, $depth) {
		?>
		<div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="single-comment">
				<div class="comment-meta">
					<strong><?php echo get_comment_author() ?></strong>
					<span><?php echo get_comment_date(); ?></span>
				</div>
				<div class="comment-content">
					<?php if ($comment->comment_approved == '0') : ?>
						<p><em><?php esc_html_e('Your comment is awaiting moderation.','discovery') ?></em></p>
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
				<div class="comment-actions">
					<?php
					// maybe no reply option in this theme? perhaps less bad
					// behavior if users cannot directly reply to other users?
					// comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) 
					?>
				</div>
			</div>
		</div>
		
	
	<?php
	}
}


// disabling woocommerce forced activation
// add_action( 'after_switch_theme', 'check_theme_dependencies', 10, 2 );
// function check_theme_dependencies( $oldtheme_name, $oldtheme ) {
// 	$missing_dependencies = true;
// 	if ( ! function_exists( 'is_woocommerce_activated' ) ) {
// 		if ( class_exists( 'woocommerce' ) ) {
// 			$missing_dependencies = false;
// 		}
// 	}
// 	if ( $missing_dependencies ) :
// 		add_filter( 'gettext', 'update_activation_admin_notice', 10, 3 );
// 		add_action( 'admin_head', 'error_activation_admin_notice' );
// 		switch_theme( $oldtheme->stylesheet );
// 		return false;
// 	endif;
// }

// function update_activation_admin_notice( $translated, $original, $domain ) {
// 	$strings = array(
// 		'New theme activated.' => 'Theme not activated. WooCommerce must be installed and activated before theme.'
// 	);
// 	if ( isset( $strings[$original] ) ) {
// 		$translations = get_translations_for_domain( $domain );
// 		$translated = $translations->translate( $strings[$original] );
// 	}
// 	return $translated;
// }


// function error_activation_admin_notice() {
// 	echo '<style>#message2{border-left-color:#dc3232;}</style>';
//}


require get_template_directory() . '/inc/customizer.php';


// woocommerce mods
function discovery_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );	
}
add_action( 'after_setup_theme', 'discovery_add_woocommerce_support' );


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


function is_activewoo_page () {
	if( function_exists ( "is_woocommerce" ) && is_woocommerce()){
		return true;
	}
	$woocommerce_keys = array ( 
		"woocommerce_shop_page_id",
		"woocommerce_pay_page_id" ,
		"woocommerce_cart_page_id" ,
		"woocommerce_terms_page_id" ,
		"woocommerce_logout_page_id" ,
		"woocommerce_thanks_page_id" ,
		"woocommerce_checkout_page_id" ,
		"woocommerce_myaccount_page_id" ,
		"woocommerce_view_order_page_id" ,
		"woocommerce_edit_address_page_id" ,
		"woocommerce_change_password_page_id" ,
		"woocommerce_lost_password_page_id" ) ;

	foreach ( $woocommerce_keys as $wc_page_id ) {
		if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
			return true ;
		}
	}
	return false;
}