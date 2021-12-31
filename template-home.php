
<?php 
/**
* Template Name: Home
*/
get_header(); ?>

<main id="core">
	
	<?php while ( have_posts() ) : the_post(); ?>
		<section class='hero' style="background: url(<?php echo get_template_directory_uri(); ?>/assets/pexels-pixabay-326058.jpg) center no-repeat; background-size:cover;">
			<div class='inner'>
				<strong class='intro'>Introduction</strong>
				<h1 class='title'>
					<?php GetMod('discovery_welcome_title', "Welcome headline, update with WordPress 'Customize' menu."); ?>
				</h1>
				<p>
					<a href='<?php GetMod('discovery_welcome_button_link', "/wp-admin/customize.php?return=%2Fwp-admin%2Fthemes.php"); ?>' class='button'>
						<?php GetMod('discovery_welcome_button_text', "Customize me!"); ?>
					</a>
				</p>
			</div>
		</section><!-- e: header -->

		
		<section class='introduction'>
			<div class='inner'>
				<?php if ( has_post_thumbnail() ) { ?>
				<figure>
					<img src='<?php echo get_the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>' />
				</figure>
				<?php } else { ?>
				<figure>
					<img src='<?php echo get_template_directory_uri(); ?>/assets/pexels-anastasia-shuraeva-7664136.jpg' alt='' />
				</figure>
				<?php }; ?>
				<article>
					<strong class='intro'>Introductional Piece</strong>
					<h2 class='title'>
						<?php the_title(); ?>
					</h3>
					<?php 
					$the_content = apply_filters('the_content', get_the_content());
					if ( empty($the_content) ) {
						echo "<p>Add an introduction to your site, or about yourself by editing the content of this page. You can replace the image to the left with the 'Featured Image' option.</p>";
					} else {
						the_content();
					} ?>
				</article>
			</div>
		</section><!-- e: introduction -->


		<section class='feature'>
			<div class='feature-title'>
				<span>From My Blog</span>
			</div>
			<div class='items'>
				
				<?php $args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'category_name' => 'featured'
					);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class='item' style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;" alt="<?php the_title(); ?>">
					<?php } else { ?>
						<div class='item' style="background: url(<?php echo get_template_directory_uri(); ?>/assets/pexels-quang-nguyen-vinh-2159106.jpg); background-size: cover;" alt="<?php the_title(); ?>">
					<?php }; ?>
						<div class='inner'>
							<strong class='type'>Featured</strong>
							<span class='date'><?php echo get_the_date('M jS, Y' ); ?></span>
							<h3 class='title'>
								<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
							</h3>
							<?php the_excerpt(); ?>
							<p><a href='<?php the_permalink(); ?>' class='button'>Read more</a></p>
						</div>
					</div>
					<?php endwhile;
				} else { ?>
					<div class='item' style="background: url(<?php echo get_template_directory_uri(); ?>/assets/pexels-quang-nguyen-vinh-2159106.jpg); background-size: cover;" alt="">
						<div class='inner'>
							<strong class='type'>Featured</strong>
							<span class='date'>Dec 27, 2021</span>
							<h3 class='title'>
								<a href='/'>Welcome to Discovery!</a>
							</h3>
							<p>This is an example of a Featured Post. Simply set the category of a post to "Featured", to show it here.</p>
							<p><a href='/' class='button'>Read more</a></p>
						</div>
					</div>	
				<?php }
					wp_reset_postdata();
				?>
			
				
			</div>
		</section><!-- e: features -->


		<section class='latest'>
			<div class='inner'>
				<h3 class='section-title'>Latest Posts</h3>

				<div class='section-main'>
					<?php $args = array(
						'post_type' => 'post',
						'posts_per_page' => 3
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
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
				</div>

			</div>
		</section><!-- e: latest posts -->

		
		<?php 
			if ( ! function_exists( 'is_woocommerce_activated' ) ) {
			if ( class_exists( 'woocommerce' ) ) { ?>


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
				
				<p><a href='/cart/' class="button">Visit The Shop</a></p>
			</div>
		</section><!-- e: products -->
	
		<?php }
			}
		?>
	
	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
