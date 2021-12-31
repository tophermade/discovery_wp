<?php get_header(); ?>

<main id="core" class="page-woo">
	
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="single-post">
		<div class="inner">
			<div class="post">
				
				<?php if ( has_post_thumbnail() ) { ?>
				<figure class="post-image">
					<img src='<?php echo get_the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>' />
				</figure>
				<?php }; ?>

				<article class="post-content">
					<?php the_content(); ?>
				</article>
			</div><!-- e: post -->

		</div>
	</section><!-- e: single post -->
	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
