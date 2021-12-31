<?php get_header();  

if(is_activewoo_page()){
	require_once('page_woo.php');
} else { 
	require_once('page_wp.php');
}; 

get_footer();