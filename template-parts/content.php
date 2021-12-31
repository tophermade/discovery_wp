<div id="post-<?php the_ID(); ?>" class='card post'>
	<a href='<?php the_permalink(); ?>'>
		<?php if ( has_post_thumbnail() ) { ?>
		<figure>
			<img src='<?php echo get_the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>' />
		</figure>
		<?php }; ?>
		
		<span class='date'><?php echo get_the_date('M jS, Y' ); ?></span>
		<h3 class='title'>
			<?php the_title(); ?>
		</h3>
	</a>
</div>