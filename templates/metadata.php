<?php
/*
Template Name: Metadata
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
				

				<h2 class="h2">Genres</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('genres'),
				    'number' => 200, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Évènements / Events</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('events'),
				    'number' => 0, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Action</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('mouv'),
				    'number' => 200, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				
				<h2 class="h2">Lieux / Filming Locations</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('lieux'),
				    'number' => 200, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Sujets / Topics</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('sujet'),
				    'number' => 200, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Objets</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('objet'),
				    'number' => 200, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Personnes identifiées / People</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('identi'),
				    'number' => 0, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
				   ); 
				wp_tag_cloud($args);
				?>
				</ul>

				<h2 class="h2">Séries / Film sequences</h2>
				<ul class="tag-cloud text">
				<?php 
				$args = array(
				    'taxonomy'  => array('info-1'),
				    'number' => 0, 
				    'largest'	=> 16,
					'show_count' => true,
					'separator' => ' – ',
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
