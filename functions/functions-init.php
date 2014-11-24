<?php  

// Initialize Theme

/* 1. Register CSS and JS
 * 2. Define theme support, menus, image sizes
 * 3. Custom post types and Taxonomies
 * 4. Date variables for MEM plugin
 * 5. 
**************/



/* Allow Automatic Updates
 ******************************
 * http://codex.wordpress.org/Configuring_Automatic_Background_Updates
 */

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'allow_major_auto_core_updates', '__return_true' );



  // Unregister jQuery 
  // (we call it in the footer)
  // ****************************
   
function custom_register_styles() {
				
				/**
				 * Custom CSS
				 */
				
				wp_dequeue_style( 'outspoken-style' );
				
				
				wp_enqueue_style( 
						'google-fonts', 
						'//fonts.googleapis.com/css?family=Chivo:400,400italic,900,900italic',
						false,
						null
				); 
				
				// the MAIN stylesheet
				wp_enqueue_style( 
						'luma-style', 
						get_stylesheet_directory_uri() . '/css/dev/00-main.css', // main.css
						false, // dependencies
						null // version
				); 
				
				
				/**
				 * Custom JavaScript
				 **********************
				 */
	      	      
	      wp_enqueue_script( 
	      // the main JavaScript file 
	      		'main_js', // handle
	      		get_stylesheet_directory_uri() . '/scripts/script.js', // scripts.js
	      		array('jquery'), // dependencies
	      		null, // version
	      		true // in_footer
	      );
	      
	      wp_enqueue_style( 'wp-mediaelement' );
	      
	      wp_enqueue_script( 'mediaelement' );
	      wp_enqueue_script( 'wp-mediaelement' );
	      
}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 20);


function remove_assets() {
    wp_dequeue_style('outspoken-style');
    // wp_deregister_style('outspoken-style');
}
add_action('wp_print_styles', 'remove_assets', 99999);


/* Some header cleanup 
******************************/

remove_action('wp_head', 'shortlink_wp_head');

remove_action('wp_head', 'feed_links' ); // not working...
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3);
// in order to remove the comments feed. need to add manually the main RSS feed to the header.

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

// Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
remove_filter('atom_service_url','atom_service_url_filter'); 

 
/* Post-Thumbnails Support
******************************/
 
 if ( function_exists( 'add_theme_support' ) ) {
	 	add_theme_support( 'post-thumbnails' );
//     set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions  
    // more info: http://codex.wordpress.org/Post_Thumbnails 
 }


/* Custom image sizes
******************************/ 
 
 if ( function_exists( 'add_image_size' ) ) { 
 	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
 		add_image_size( 'thumb-landscape', 240, 180, true ); // true = cropped
 }
 

  
/** 
 * MEM options
 */

function my_mem_settings() {
	mem_plugin_settings( array( 'post' ), 'full' );
}
add_action( 'mem_init', 'my_mem_settings' );  












