<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package discovery
 */

?>
	<footer id='footer'>
		<div class='inner'>
			<nav id='footer-nav'>
				<div class='site-links'>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id' => 'footer-menu',
							)
						);
					?>
				</div>

				<div class='social-links'>
					<ul>
						<li><a href='<?php echo get_theme_mod( "discovery_url_facebook" );?>'><i class="bi-facebook"></i></a></li>
						<li><a href='<?php echo get_theme_mod( "discovery_url_twitter" );?>'><i class="bi-twitter"></i></a></li>
						<li><a href='<?php echo get_theme_mod( "discovery_url_instagram" );?>'><i class="bi-instagram"></i></a></li>
						<li><a href='<?php echo get_theme_mod( "discovery_url_snapchat" );?>'><i class="bi-snapchat"></i></a></li>
						<li><a href='<?php echo get_theme_mod( "discovery_url_tiktok" );?>'><i class="bi-tiktok"></i></a></li>
					</ul>
				</div>
			</nav>

			<div id='copyright'>
				<strong><?php bloginfo( 'name' ); ?></strong>
				<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?> - All Rights Reserved</p>
			</div>
		</div>
	</footer><!-- e: footer -->
	
</div><!-- e: site frame -->

<?php wp_footer(); ?>

</body>
</html>
