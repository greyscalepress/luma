<?php
/*
Template Name: Lieux
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
				
				<h2 class="h2">Pays / Countries</h2>
				<ul class="tag-cloud text">
				<?php 
				      		
				
				$args = array(
				    'taxonomy'  => array('pays'),
				    //info = 19, test=23, event=10
				    'number' => 200, 
				    'largest'	=> 16,
				   ); 
				   
				wp_tag_cloud($args);
							 
				?>
				</ul>
				
				<h2 class="h2">Villes / Cities</h2>
				<ul class="tag-cloud text">
				<?php 
				
				$args = array(
				    'taxonomy'  => array('ville'),
				    //info = 19, test=23, event=10
				    'number' => 200, 
				    'largest'	=> 16,
				   ); 
				   
				wp_tag_cloud($args);
							 
				?>
				</ul>
				
				
			</div><!-- .entry-content -->
		</article><!-- #post -->


	</div><!-- #content -->
</div><!-- #primary -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
