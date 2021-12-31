<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section id="product-<?php the_ID(); ?>"class="single-product">

	<div class="inner">
		<div class="product-main">
			<h1 class="title"><?php woocommerce_template_single_title(); ?></h1>

			<div class="prices">
				<?php woocommerce_template_single_price(); ?>
			</div>

			<div class="description">
				<?php the_content(); ?>
			</div>

			<div class="actions">
				<?php woocommerce_template_single_add_to_cart(); ?>
			</div>

			<!-- <div class="notes">
				<p>Soluta officiis expedita pariatur incidunt culpa maiores.</p>
			</div> -->
		</div>

		<div class="product-media">
			<?php
				global $product;
				$post_thumbnail_id = $product->get_image_id();
				$attachment_ids = $product->get_gallery_image_ids();
				
				if ( $post_thumbnail_id ) {
					echo '<img src="'.esc_url( wp_get_attachment_image_src( $post_thumbnail_id, $full_size )[0] ).'" alt="" />';
				}
				
				if ( $attachment_ids && $product->get_image_id() ) {
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<img src="'.esc_url( wp_get_attachment_image_src( $attachment_id, $full_size )[0] ).'" alt="" />';
					}
				}
			?>
		</div>
	</div>
</section>


<section class='products'>
	<div class='inner'>

		<strong class='section-intro'>On the shop</strong>
		<h3 class='section-title'>Our <br /> Products</h3>

		<div class='section-main'>
			<?php $args = array(
				'post_type' => 'product',
				'posts_per_page' => 3
				);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class='card product'>
				<a href='<?php the_permalink(); ?>'>
					<?php if ( has_post_thumbnail() ) { ?>
					<figure>
						<img src='<?php echo get_the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>' />
					</figure>
					<?php }; ?>
					<h3 class='title'>
						<?php the_title(); ?>
					</h3>
					<span class='cost'>
					<?php echo wc_get_product(get_the_ID())->get_price_html(); ?>
					</span>
				</a>
			</div>
			<?php endwhile;
				} else { ?>
					<div class='card product' style="width: 100%; padding-bottom: 50px;">
						<h3 class='title'>
							Your WooCommerce products will show here <br />once added.
						</h3>
					</div>	
				<?php }
				wp_reset_postdata();
			?>
			
		</div><!-- e: section main -->
	</div>
</section><!-- e: products -->
		


<?php do_action( 'woocommerce_after_single_product' ); ?>
