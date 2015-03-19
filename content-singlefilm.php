<?php 

// note: HEADER tag is alread open

// outspoken_post_thumbnail(); 
		
		if ( 'post' == get_post_type() ) {
			echo '<div class="main-image">';
			lumiere_post_thumbnail_large($cf_numero);
			echo '</div>';
						
		}
		
		// test for attached mp4 file
		     if (!empty($video_array)) {
		     	foreach ($video_array as $key => $value) {
		     		echo do_shortcode('[video width="350" height="262" mp4="'.$value["url"].'"][/video]');
		     	}
		     }
		
		// test for video custom field
		if ( $cf_video ) {
			video_links( $cf_video );
		}
		
?>


<h1 class="entry-title"><?php the_title(); ?></h1>

<?php outspoken_share(); ?>


	<p class="numero-vue">
	<?php if($cf_numero !== '') { 
		echo 'Vue N° '. $cf_numero;
	 } 
	  if($cf_numero_livre !== '') { 
	// echo ' / '. $cf_numero_livre .' (CD-R)';
	 } ?>
	</p>
	<?php
						
?>
				
</header><!-- .entry-header -->


<div class="entry-content">
	<div class="main-description">
		
		<div class="main-descr-content">
		<?php the_content(__('Read More', 'outspoken')); ?>
		</div>
		
		<?php if($cf_remarque !== '') { ?>
		<p class="cf-remarque clear"><?php echo $cf_remarque; ?></p>
		<?php } ?>
					
	</div>
	
	<?php 
	
	// START formulaire
	
	include 'inc/form-item.php'; 
		
	 ?>
			
<dl class="entry-meta">
								
	<?php
	
	// opening, middle and closing tags
	$cfmt_opn = '<p class="meta-box"><dt class="meta-term">';
	$cfmt_mid = '</dt><dd class="meta-desc">';
	$cfmt_cls = '</dd></p>';

	if($cf_operateur !== '') { 
		
		$operator_array = wp_get_object_terms( $post->ID, 'operateur' );
		
		if (!empty($operator_array)) {
		
		echo $cfmt_opn.'Opérateur:'. $cfmt_mid .'<a href="http://catalogue-lumiere.com/operateur/'.$operator_array[0]->slug.'/">'. $cf_operateur .'</a>' .$cfmt_cls;
		} else {
			echo $cfmt_opn.'Opérateur:'.$cfmt_mid . $cf_operateur . $cfmt_cls;
		}
		
	 } 
		
	if($cf_date !== '') { 
		echo $cfmt_opn.'Date:'. $cfmt_mid. $cf_date .$cfmt_cls;
	} 
	
	if($cf_lieu !== '') { 
		echo $cfmt_opn.'Lieu:'. $cfmt_mid. $cf_lieu .$cfmt_cls;
	 } 
	 
	if($cf_personnes !== '') { 
		echo $cfmt_opn.'Personnes:'. $cfmt_mid. $cf_personnes .$cfmt_cls;
	}

	if($cf_projection !== '') { 
		echo $cfmt_opn.'Projections:'. $cfmt_mid. $cf_projection .$cfmt_cls;
	}
	
	if($cf_tech !== '') {
		echo $cfmt_opn.'Technique:'. $cfmt_mid. $cf_tech .$cfmt_cls;
	}
	
	if($cf_support !== '') {
		echo $cfmt_opn.'Eléments filmiques:'. $cfmt_mid. $cf_support .$cfmt_cls;
	} ?>

</dl><!-- .entry-meta -->
						
		<dl class="taxonomies-box">
		<?php
		     
		echo get_the_term_list( $post->ID, 'pays', $cfmt_opn.'Pays:'.$cfmt_mid, ', ', $cfmt_cls );
		echo get_the_term_list( $post->ID, 'ville', $cfmt_opn.'Ville:'.$cfmt_mid, ', ', $cfmt_cls );
		echo get_the_term_list( $post->ID, 'lieux', $cfmt_opn.'Lieu:'.$cfmt_mid, ', ', $cfmt_cls );
		echo get_the_term_list( $post->ID, 'identi', $cfmt_opn.'Personnes identifiées:'.$cfmt_mid, ', ', $cfmt_cls );
		echo get_the_term_list( $post->ID, 'events', $cfmt_opn.'Événement:'.$cfmt_mid, ', ', $cfmt_cls);
		echo get_the_term_list( $post->ID, 'genres', $cfmt_opn.'Genre:'.$cfmt_mid, ', ', $cfmt_cls);
		echo get_the_term_list( $post->ID, 'sujet', $cfmt_opn.'Sujet:'.$cfmt_mid, ', ', $cfmt_cls);
		echo get_the_term_list( $post->ID, 'objet', $cfmt_opn.'Objet:'.$cfmt_mid, ', ', $cfmt_cls);
		// echo get_the_term_list( $post->ID, 'mouv', '<p>Action: ', ', ', '</p>' );
		
		echo get_the_term_list( 
				$post->ID, 
				array(
					'info-1',
					// 'info-2',
					// 'info-3',
					// 'info-4',
					'info-5',
					// 'info-6',
					// 'info-7'
					), 
				$cfmt_opn.'Séries:'.$cfmt_mid, ', ', $cfmt_cls );
		
		?>
		</dl>
		<?php 
		
		if ( $cf_seq1 !== '' || $cf_seq2 !== '' ) {
				
				// example: 1367 - 1368 - 1369 - 1370 - 1371 - 1372 - 1373
				// numbers match: Numero-Livre CF
				
				?><div class="sequence">
				<h3 class="sub-content">Séquence</h3>
				<ul>
				<?php 
				
				$cf_seq1_array = array();
				$cf_seq2_array = array();
				
				if ( $cf_seq1 !== '' ) {
					$cf_seq1_array = explode(" - ", $cf_seq1);
				}
				if ( $cf_seq2 !== '' ) {
					$cf_seq2_array = explode(" - ", $cf_seq2);
				}
				
				$cf_seq_array = $cf_seq1_array + $cf_seq2_array;
				
//								echo '<div class="hidden">';
//								var_dump($cf_seq_array);
//								echo '</div>';

				foreach ( $cf_seq_array as $i => $item ) {
				  // echo '<li>'. $item .'</li>';
				  // we have to make a query by Custom Field
				  
				  $custom_query = new WP_Query( array(
				  		 	'meta_key' => 'Numero-Livre',
				  		 	'meta_value' => $item,
				  		 	'meta_compare' => '=',
				  		 	'posts_per_page' => 1,
				  ) );
				  
				  if ( $custom_query->have_posts() ) :
				      
				      while ( $custom_query->have_posts() ) : $custom_query->the_post();
				      
				      	include 'inc/item-sequence.php'; 
				  			
				  		endwhile;
				  endif; //
				  wp_reset_postdata();
				  
				}
			
			 ?>
			 </ul>
			</div>
			<?php
		}
		

				
				// TIMELINE		
				
				// Load timeline via custom plugin.
				// If function exists, run function.
					
					if (function_exists('lumiere_timeline')) {
					    lumiere_timeline($cf_timestamp);
					}
					
				
							 ?>
							
							<?php outspoken_tags(); ?>
							<?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">'.__('Pages:', 'outspoken').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>

</div><!-- .entry-content -->
			
