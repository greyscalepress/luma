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
//				
//				echo '<pre>';
//				var_dump($cf_video);
//				echo '</pre>';
				
				if ( count( $cf_video ) > 1 ) {
				
					$post_class_variable .= ' has-videos';
					
				}
				
			} else if (!empty($video_array)) {
				$post_class_variable .= ' has-video';
				
			} else {
				$post_class_variable .= ' no-video';
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

<?php 	if (is_single()):
		
		include 'content-singlefilm.php'; 
 
		else: 

		include 'content-archive.php'; 

		endif; // is_single() ?>


<?php if ($html_fix): ?>
			</div>
<?php endif; ?>

		</article><!-- #post -->
