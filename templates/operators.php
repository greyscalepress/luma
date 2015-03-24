<?php
/*
Template Name: Operators
*/


get_header(); ?>

<?php /* The loop */ ?>
<?php while (have_posts()): the_post(); ?>

	<?php
	$result = wpShower::getContentAndAttachments();
	if (!empty($result['attachments'])) outspoken_formatted_gallery($result['attachments']);
	?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
<?php if (has_post_thumbnail() && !post_password_required()): ?>
				<div class="entry-thumbnail">
					<?php outspoken_formatted_image(); ?>
				</div>
<?php endif; ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				
				<?php // echo $result['content']; ?>
				
				<ul class="tag-cloud text">
				<?php 
				      		
				$args = array(
				    'show_option_all'    => '',
				    	'orderby'            => 'name',
				    	'order'              => 'ASC',
				    	'style'              => 'list',
				    	'show_count'         => 1,
				    	'hide_empty'         => 1,
				    	'use_desc_for_title' => 0,
				    	'exclude'            => '',
				    	'exclude_tree'       => '',
				    	'hierarchical'       => 0,
				    	'title_li'           => '',
				    	'number'             => null,
				    	'echo'               => 1,
				    	'depth'              => 0,
				    	'current_category'   => 0,
				    	'pad_counts'         => 0,
				    	'taxonomy'           => 'operateur',
				    	'walker'             => null
				   ); 
				   
				wp_list_categories( $args );
							 
				?>
				</ul>
				
			</div><!-- .entry-content -->
		</article><!-- #post -->


	</div><!-- #content -->
</div><!-- #primary -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
