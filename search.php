<?php get_header(); ?>

<main id="core">
	
	<?php include_once("template-parts/categories.php"); ?>
	
	<section class='latest'>
		<div class='inner'>
			<h3 class='section-title'>
				<?php
					printf( esc_html__( 'Search Results for: %s'),  get_search_query() );
				?>
			</h3>
			<div class='section-main'>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				<?php endwhile; 
				else :?> 
					<div class='card post'>
						<h3 class='title'>
							No results found.
						</h3>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
	</section><!-- e: latest posts -->
	
<?php
get_footer();
