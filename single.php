<?php get_header(); ?>
		
<section id="category-bar">
	<div class="inner">
		<ul>
			<li><a href="#">Wood Working</a></li>
			<li><a href="#">Video Games</a></li>
			<li><a href="#">Travel</a></li>
			<li><a href="#">Projects</a></li>
			<li><a href="#">Downloads</a></li>
		</ul>
	</div>
</section><!-- e: category bar -->


<main id="core">
	
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="single-post">
		<div class="inner">
			<div class="post">
				<header class="post-header">
					<div class="category">
						<a href="#">Projects</a>
					</div>

					<span class="date"><?php echo get_the_date('M jS, Y' ); ?></span>

					<h3 class="title"><?php the_title(); ?></h3>
				</header>
				
				<?php if ( has_post_thumbnail() ) { ?>
				<figure class="post-image">
					<img src='<?php echo get_the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>' />
				</figure>
				<?php }; ?>

				<article class="post-content">
					<?php the_content(); ?>
				</article>

				<footer class="post-footer">
					<div class="footer-meta">
						<span class="meta-date"><?php echo get_the_date('M jS, Y' ); ?></span>
						<span class="meta-comment-count"><?php echo $post->comment_count; ?> Comment(s)</span>
					</div>

					<ul class="footer-share">
						<li><a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>'><i class="bi-facebook"></i></a></li>
						<li><a href='https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>'><i class="bi-twitter"></i></a></li>
					</ul>
				</footer>
			</div><!-- e: post -->

		</div>
	</section><!-- e: single post -->
	
	<?php if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
?>