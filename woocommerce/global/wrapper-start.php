<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();

switch ( $template ) {
	default:
		$orderby = 'name';
		$order = 'asc';
		$hide_empty = false ;
		$cat_args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => $hide_empty,
		);

		$product_categories = get_terms( 'product_cat', $cat_args );

		if( !empty($product_categories) ){
			echo '
		<section id="category-bar">
		<div class="inner">
		<ul>';
			foreach ($product_categories as $key => $category) {
				echo '
			<li>';
				echo '<a href="'.get_term_link($category).'" >';
				echo $category->name;
				echo '</a>';
				echo '</li>';
			}
			echo '</ul>
			</div>
			</section><!-- e: category bar -->
		';
	}
	echo '<section class="products"><div class="inner">';
	break;
}
