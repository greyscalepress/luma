<?php

$cf_num = get_post_meta($post->ID, 'Numero-Original', true);

?><li class="chron"><?php 
	

	$cf_date = get_post_meta($post->ID, 'Date-Visible', true);
	
	if($cf_date !== '') { 
	    	echo $cf_date .' : ';
	}
	
//	if ( function_exists('mem_date_processing') ) {
//		
//		$mem_date = mem_date_processing( 
//			get_post_meta($post->ID, '_mem_start_date', true) , 
//			get_post_meta($post->ID, '_mem_end_date', true)
//		);
//		
//		if ($mem_date["start-iso"] !=="") { 
//		
//			echo $mem_date["date-num"].': ';
//		
//		}
//	}
	
	?>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
	
	the_title();
	
	if($cf_num !== '') { 
	    	echo ' ('. $cf_num;
	    	echo ')';
	} 
	 ?></a>
</li>
<?php 