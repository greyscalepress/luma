<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
 
 
require_once('functions/functions-init.php');

require_once('functions/functions-tax.php');

require_once('widgets/operators-list.php');



function lumiere_post_thumbnail($cf_numero = '') {
	if ( has_post_thumbnail() ) { 
	 	echo '<a href="'.get_permalink().'">';
	   the_post_thumbnail('thumb-landscape');
	   echo '</a>'; 
	 } else if ( !empty ($cf_numero) ) {
	      
			// test if file exists: based on $cf_numero
			
			$upload_dir = wp_upload_dir();
			
			// $file_name_test = $upload_dir['basedir'].'/2013/12/'.$cf_numero.'.jpg';
			
			if (file_exists($upload_dir['basedir'].'/2013/12/'.$cf_numero.'-240x180.jpg')) {   
				
				echo '<a href="'.get_permalink().'">';
				echo '<img width="480" height="360" src="'.$upload_dir['baseurl'].'/2013/12/'.$cf_numero.'-240x180.jpg" class="attachment-large wp-post-image" alt="" />';
				echo '</a>'; 
			
			} else {
				// echo 'negative: '.$file_name_test;
			}
	
	} // end Post Thumbnail
}

function lumiere_post_thumbnail_large($cf_numero = '') {
	if ( has_post_thumbnail() ) { 
	
	  the_post_thumbnail('large'); 
	
	} else if ( !empty ($cf_numero) ) {
	
			// test if file exists: based on $cf_numero
			
			$upload_dir = wp_upload_dir();
			
			// $file_name_test = $upload_dir['basedir'].'/2013/12/'.$cf_numero.'.jpg';
			
			if (file_exists($upload_dir['basedir'].'/2013/12/'.$cf_numero.'.jpg')) {   
				
				echo '<img width="480" height="360" src="'.$upload_dir['baseurl'].'/2013/12/'.$cf_numero.'.jpg" class="attachment-large wp-post-image" alt="" />';
			
			} else {
				// echo 'negative: '.$file_name_test;
			}
	
	} // end image testing
}


function video_links($cf_video = '') {
	foreach($cf_video as $video_url) {
				
				// https://www.youtube.com/watch?v=WLuOM0QYk9s
				
				if (substr($video_url, 0, 32) == "https://www.youtube.com/watch?v=") {
							
							$video_url = str_replace("https://www.youtube.com/watch?v=", "", $video_url);
							
							echo '<iframe width="420" height="315" src="//www.youtube-nocookie.com/embed/'. $video_url .'?rel=0" frameborder="0" allowfullscreen></iframe>';
				     
				} else if (substr($video_url, 0, 31) == "http://www.youtube.com/watch?v=") {
				
						$video_url = str_replace("http://www.youtube.com/watch?v=", "", $video_url);
						
						echo '<iframe width="420" height="315" src="//www.youtube-nocookie.com/embed/'. $video_url .'?rel=0" frameborder="0" allowfullscreen></iframe>';
						
				}
	
	}
}


function video_tester( $howmany = -1 ) {
	if ( $images = get_children ( array (
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => $howmany , // -1 = show all
		'post_status'    => null,
		'post_mime_type' => 'video/mp4',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		// 'linked' => $link, // link = create link
	))) {
	
		// init the array!
		$img_gallery_array = array();
	
		foreach ( $images as $image ) {
			
			$img_id = $image->ID;
			// we will use that a few times
			
			// put everything into the array...
			
			$img_gallery_array[] = array( 
					"id" => $img_id, 
			    	// TEXT
			    	"url" => wp_get_attachment_url( $img_id ),
			    	"title" => apply_filters('the_title',$image->post_title),
			    	"caption" => $image->post_excerpt,
			    	"description" => $image->post_content,
			   );
			   
 
		} // end foreach
		
		return $img_gallery_array;
		
	} 
}


/* Customize Archive Query
******************************/

function archive_page_query($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( is_archive() ) {
    	if ( is_category( 'blog' ) ) {
    		// category = blog 
    		
    		set_query_var('post_type', array('posts','blog') );
    		
    	} else {
      set_query_var('meta_key', 'Numero-Original');
      set_query_var('orderby', 'meta_value_num');
      set_query_var('order', 'ASC');
      }
      // 
    }
  }
}

add_action('pre_get_posts','archive_page_query');




/* admin interface
******************************/

require_once('functions/functions-admin.php');



// end of functions.php