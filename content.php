<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>

<?php
		
		$post_class_variable = '';
		
		// check for meta fields : Title, Year, Type
		$cf_numero = get_post_meta($post->ID, 'Numero-Original', true);
		$cf_numero_livre = get_post_meta($post->ID, 'Numero-Livre', true);
		$cf_operateur = get_post_meta($post->ID, 'Nom-Operateur', true);
		$cf_lieu = get_post_meta($post->ID, 'Lieu', true);
		$cf_date = get_post_meta($post->ID, 'Date-Visible', true);
		
		if (is_single()) {
			
			// things not displayed for index/archive/search
			
			$cf_remarque = get_post_meta($post->ID, 'Remarque', true);
			$cf_projection = get_post_meta($post->ID, 'Projection', true);
			$cf_personnes = get_post_meta($post->ID, 'Personnes', true);
			$cf_tech = get_post_meta($post->ID, 'Technique', true);
			$cf_support = get_post_meta($post->ID, 'Support', true);
			
			$cf_seq1 = get_post_meta($post->ID, 'sequence-1', true);
			$cf_seq2 = get_post_meta($post->ID, 'sequence-2', true);
			
			$cf_timestamp = get_post_meta($post->ID, '_mem_start_date', true);
			
			$cf_video = get_post_meta($post->ID, 'video', false); // false = array
			
			// test for attached mp4 file
			$video_array = video_tester();
			
			if ( $cf_video ) { 
				$post_class_variable .= ' has-video';
			} else if (!empty($video_array)) {
				$post_class_variable .= ' has-video';
			}
		
		}


$html_fix = false;
if (is_single()):
?>
<?php outspoken_share_side(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
<?php endif; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class($post_class_variable); ?>>
<?php if (wpShower::isMasonry()): ?>
			<?php outspoken_post_thumbnail('outspoken-thumbnail'); ?>
<?php
elseif (!is_single() && !post_password_required() && !wpShower::isBlog()):
	$html_fix = true;
?>
			<?php // outspoken_post_thumbnail(); 
					lumiere_post_thumbnail($cf_numero);
			?>
			<div class="entry-column">
<?php endif; ?>

			<header class="entry-header">
<?php if (!wpShower::isFrontPage() || get_theme_mod('outspoken_home_categories')): ?>
				<div class="entry-meta-top">
					<?php // outspoken_entry_categories(); ?>
				</div><!-- .entry-meta -->
<?php endif; ?>

<?php if (is_single()): ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
<?php else: ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
					if($cf_numero !== '') { 
					    	echo '('. $cf_numero;
					    	echo ') ';
					} 
					the_title(); ?></a>
				</h1>
				
<?php endif; // is_single() ?>

				<?php outspoken_share(); ?>

				<div class="entry-meta">
					<?php // outspoken_entry_meta(); 
					
					if (is_single()) {
						?>
						<p>
						<?php if($cf_numero !== '') { 
							echo 'N° '. $cf_numero .' (cat. lumière)';
						 } 
						  if($cf_numero_livre !== '') { 
						echo ' / '. $cf_numero_livre .' (CD-R)';
						 } ?>
						</p>
						<?php
						
						if($cf_operateur !== '') { 
							
							$operator_array = wp_get_object_terms( $post->ID, 'operateur' );
							
							// echo $operator_array[0];
							
//							echo '<pre>';
//							var_dump($operator_array);
//							echo '</pre>';
							
							// $operator_array = $operator_array[0];
							
							// echo 'test:'.$operator_array[0]->slug;
							
							if (!empty($operator_array)) {
							
							echo '<p><b>Opérateur:</b> <a href="http://catalogue-lumiere.com/operateur/'.$operator_array[0]->slug.'/">'. $cf_operateur .'</a></p>';
							} else {
								echo '<p><b>Opérateur:</b> '. $cf_operateur .'</p>';
							}
							
							// echo get_the_term_list( $post->ID, 'operateur', '<p>Opérateur: ', ', ', '</p>' );
						 } 
						
					} else { // is NOT single()
							
						if($cf_operateur !== '') {
							echo '<p><b>Opérateur:</b> '. $cf_operateur .'</p>';
						}
					
					}
					
					if($cf_date !== '') { 
						echo '<p><b>Date:</b> '. $cf_date .'</p>';
					} 
					
					if($cf_lieu !== '') { 
						echo '<p><b>Lieu:</b> '. $cf_lieu .'</p>';
					 } 
					
					?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

<?php if (outspoken_is_excerpt()): ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
<?php else: ?>
			<div class="entry-content">
				<?php the_content(__('Read More', 'outspoken')); ?>
				<?php // outspoken_post_thumbnail(); 
						
						echo '<div class="main-image">';
						lumiere_post_thumbnail_large($cf_numero);
						echo '</div>';
						
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
						
						<?php if($cf_remarque !== '') { ?>
						<p class="cf-remarque clear"><?php echo $cf_remarque; ?></p>
						<?php } ?>
						
						<?php if($cf_projection !== '') { ?>
						<p class="clear"><b>Projections:</b> <?php echo $cf_projection; ?></p>
						<?php } ?>
						
						<?php if($cf_personnes !== '') { ?>
						<p class="clear"><b>Personnes:</b> <?php echo $cf_personnes; ?></p>
						<?php } ?>
						
						<?php if($cf_tech !== '') { ?>
						<p class="clear"><b>Technique:</b> <?php echo $cf_tech; ?></p>
						<?php } ?>
						
						<?php if($cf_support !== '') { ?>
						<p class="clear"><b>Eléments filmiques:</b> <?php echo $cf_support; ?></p>
						<?php } ?>
						
						<div class="taxonomies-box">
						<?php
						     
						echo get_the_term_list( $post->ID, 'pays', '<p>Pays: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'ville', '<p>Ville: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'lieux', '<p>Lieu: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'identi', '<p>Personnes identifiées: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'events', '<p>Événement: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'genres', '<p>Genre: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'sujet', '<p>Sujet: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'objet', '<p>Objet: ', ', ', '</p>' );
						echo get_the_term_list( $post->ID, 'mouv', '<p>Action: ', ', ', '</p>' );
						
						echo get_the_term_list( 
								$post->ID, 
								array(
									'info-1',
									// 'info-2',
									// 'info-3',
									// 'info-4',
									'info-5',
									// 'info-6',
									'info-7'
									), 
								'<p>Séries: ', ', ', '</p>' );
						
						?>
						</div>
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
						
						 ?>
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
						
				?>
						</div>
				<?php outspoken_tags(); ?>
				<?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">'.__('Pages:', 'outspoken').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
			</div><!-- .entry-content -->
<?php endif; ?>


<?php if ($html_fix): ?>
			</div>
<?php endif; ?>
		</article><!-- #post -->
