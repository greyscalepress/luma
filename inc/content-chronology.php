<div class="chronology">
		<?php
		/*
		// CHRONOLOGY
		
		check date stamp of current post.
		something like: 1896-11-17
		var: $cf_timestamp
		
		*/
		
		if ( $cf_timestamp !== '' ) {
			// echo $cf_timestamp;
		
		// 1. query for posts before.
		
		?>
		<h3 class="sub-content">Chronologie</h3>
		<ul>
		<?php
		
		$custom_query = new WP_Query( array(
				 	'meta_key' => '_mem_start_date',
				 	'meta_value' => $cf_timestamp,
				 	'meta_compare' => '<',
				 	'posts_per_page' => 5,
				 	'orderby' => 'meta_value',
				 	'order' => 'DESC', // DESC = newest first
		) );
		
		if ( $custom_query->have_posts() ) :
		    
		    while ( $custom_query->have_posts() ) : $custom_query->the_post();
		    
		    	include 'inc/item-chron.php'; 
					
				endwhile;
		endif; //
		wp_reset_postdata();
		
		
		// 2. query for posts after.
		
		$custom_query = new WP_Query( array(
				 	'meta_key' => '_mem_start_date',
				 	'meta_value' => $cf_timestamp,
				 	'meta_compare' => '>',
				 	'posts_per_page' => 5,
				 	'orderby' => 'meta_value',
				 	'order' => 'ASC', // DESC = newest first
		) );
		
		if ( $custom_query->have_posts() ) :
		    
		    while ( $custom_query->have_posts() ) : $custom_query->the_post();
		    
		    	include 'inc/item-chron.php'; 
					
				endwhile;
		endif; //
		wp_reset_postdata();
		
		
		// test date stamp:
		?></ul><?php
		
		}
		
?> </div><!-- CHRONOLOGY -->
<?php 