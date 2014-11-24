<?php

$cf_num = get_post_meta($post->ID, 'Numero-Original', true);

$itemclass = '';
if ( $cf_num == $cf_numero ) {
	$itemclass = " current";
}

 echo '<li class="sequence-li'.$itemclass.'">';
	
	?>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
	
	lumiere_post_thumbnail_large($cf_num);
	
	echo '<span class="boxed-title">';
	the_title();
	echo '</span>';
	
//	if($cf_num !== '') { 
//	    	echo ' ('. $cf_num;
//	    	echo ')';
//	} 
	 ?></a>
</li>
<?php 