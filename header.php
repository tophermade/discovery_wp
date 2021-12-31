<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Dancing+Script&family=Fasthand&family=Inter:wght@100;400;700&family=Playfair+Display:ital@0;1&family=Source+Serif+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php 
		$font = "01";
		if(get_theme_mod( "discovery_option_font" )){
			$font = get_theme_mod( "discovery_option_font" );
		}?>
		
		<?php if($font == "01") {?>
			<?php 
			$hfont = "'Playfair Display', serif;";
			$bfont = "'Inter', Helvetica, Arial, sans-serif";
			}
		if($font == "02") {?>
			<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Merriweather&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Lora', serif;";
			$bfont = "'Merriweather', serif;";
			}
		if($font == "03") {?>
			<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Rubik:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Rubik', serif;";
			$bfont = "'Karla', serif;";
			}
		if($font == "04") {?>
			<link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Asap', serif;";
			$bfont = "'Asap', serif;";
			}
		if($font == "05") {?>
			<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,800&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Work Sans', serif;";
			$bfont = "'Work Sans', serif;";
			}
		if($font == "06") {?>
			<link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Space Mono', serif;";
			$bfont = "'Space Mono', serif;";
			}
		if($font == "07") {?>
			<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700|Poppins:400,700,900&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Poppins', serif;";
			$bfont = "'PT Sans', serif;";
			}
		if($font == "08") {?>
			<link href="https://fonts.googleapis.com/css?family=Halant:400,700|Nunito+Sans:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Halant', serif;";
			$bfont = "'Nunito Sans', serif;";
			}
		if($font == "09") {?>
			<link href="https://fonts.googleapis.com/css?family=Karla|Spectral:400,700,800&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Spectral', serif;";
			$bfont = "'Karla', serif;";
			}
		if($font == "10") {?>
			<link href="https://fonts.googleapis.com/css?family=Dosis:400,700,800&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Dosis', serif;";
			$bfont = "'Dosis', serif;";
			}
		 if($font == "11") {?>
			<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,900|Alegreya:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Alegreya Sans', serif;";
			$bfont = "'Alegreya', serif;";
			}
		if($font == "12") {?>
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,600,700|Old+Standard+TT:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Cabin', serif;";
			$bfont = "'Old Standard TT', serif;";
			}
		if($font == "13") {?>
			<link href="https://fonts.googleapis.com/css?family=Istok+Web:400,700|Lora:400,700&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Istok Web', serif;";
			$bfont = "'Lora', serif;";
			}
		if($font == "14") {?>
			<link href="https://fonts.googleapis.com/css?family=Alice|Playfair+Display:400,700,900&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Playfair Display', serif;";
			$bfont = "'Alice', serif;";
			}
		if($font == "15") {?>
			<link href="https://fonts.googleapis.com/css?family=Fanwood+Text|Quattrocento:400,700&display=swap" rel="stylesheet">	
			<?php 
			$hfont = "'Quattrocento', serif;";
			$bfont = "'Fanwood Text', serif;";
			}
		if($font == "16") {?>
			<link href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,700|Poppins:400,700,900&display=swap" rel="stylesheet">
			<?php 
			$hfont = "'Poppins', serif;";
			$bfont = "'Anonymous Pro', serif;";
			}
		?>
		
	<style>
		:root {
			<?php function GetMod($n, $d){
				if(get_theme_mod($n)){
					$d = get_theme_mod($n);
				}
				echo $d;
			} 
			?>
			--hfont:<?php echo $hfont; ?>;
			--bfont:<?php echo $bfont; ?>;

			--postLink: <?php GetMod('discovery_postLink', '#df4c34'); ?>;
			--postLinkHover: <?php GetMod('discovery_postLinkHover', '#222'); ?>;
			--postLinkHoverBackground: <?php GetMod('discovery_postLinkHoverBackground', '#fff'); ?>;
			--postContent: <?php GetMod('discovery_postContent', '#777'); ?>;
			
			--navBackground: <?php GetMod('discovery_navBackground', '#222'); ?>;
			--navLink: <?php GetMod('discovery_navLink', '#fff'); ?>;
			--navLinkHover: <?php GetMod('discovery_navLinkHover', '#fff'); ?>;
			--navLinkBackgroundHover: <?php GetMod('discovery_navLinkBackgroundHover', '#df4c34'); ?>;

			--introductionTitle: <?php GetMod('discovery_introductionTitle', '#222'); ?>;
			--introductionContent: <?php GetMod('discovery_introductionContent', '#989898'); ?>;

			--buttonBackground: <?php GetMod('discovery_buttonBackground', '#222'); ?>;
			--buttonHoverBackground: <?php GetMod('discovery_buttonHoverBackground', '#222'); ?>;
			--buttonText: <?php GetMod('discovery_buttonText', '#fff'); ?>;
			--buttonHoverText: <?php GetMod('discovery_buttonHoverText', '#999'); ?>;

			--footerBackground: <?php GetMod('discovery_footerBackground', '#222'); ?>;
			--footerText: <?php GetMod('discovery_footerText', '#fff'); ?>;
			--footerLink: <?php GetMod('discovery_footerLink', '#fff'); ?>;
			--footerLinkHover: <?php GetMod('discovery_footerLinkHover', '#999'); ?>;
			--footerLinkBackgroundHover: <?php GetMod('discovery_footerLinkBackgroundHover', '#222'); ?>;

			--categoryLink: <?php GetMod('discovery_categoryLink', '#222'); ?>;
			--categoryLinkHover: <?php GetMod('discovery_categoryLinkHover', '#fff'); ?>;
			--categoryLinkBackgroundHover: <?php GetMod('discovery_categoryLinkBackgroundHover', '#222'); ?>;

			--indicatorBackground: <?php GetMod('discovery_indicatorBackground', '#df4c34'); ?>;
			--indicatorColor: <?php GetMod('discovery_indicatorColor', '#fff'); ?>;

			--accentColor: <?php GetMod('discovery_accentColor', '#df4c34'); ?>;

			--blue: #1e90ff;
			--white: #ffffff;
		}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<div id='site-frame'>
		

		<nav id='nav'>
			<div class='inner'>
				<div class='the-menus'>
					<div id='grip' aria-controls="primary-menu" aria-expanded="false">
						<i class="bi bi-list"></i>
					</div>
					
					<form class='nav-search' action="/" method="GET">
						<i class="bi-search"></i>
						<input type='text' name='s' />
					</form>
					
					<?php 
					if ( ! function_exists( 'is_woocommerce_activated' ) ) {
						if ( class_exists( 'woocommerce' ) ) { ?>
								<div class='nav-cart'>
									<a href='/cart'><i class="bi bi-cart"></i> <span>(<?php global $woocommerce; echo $woocommerce->cart->cart_contents_count;?>)</span></a>
								</div>
						<?php }
					}
					?>
					
					<div class='nav-main'>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'header-menu',
								)
							);
						?>
					</div>
				</div>
			</div>
		</nav><!-- e: nav -->


		<header id='header'>
			<div class='inner'>
				<strong><?php bloginfo( 'name' ); ?></strong>
			</div>
		</header><!-- e: header -->
