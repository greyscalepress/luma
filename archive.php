<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Outspoken
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

<?php if (have_posts()): ?>
		
		<?php 
		
		$headr_open = '<h1 class="archive-title">';
		$headr_close = '</h1>';
		// $current_term = single_term_title("", false);
		
		$queried_object = get_queried_object();
		// var_dump( $queried_object );
			
		 ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php
				if (is_day()):
					printf(__('Daily Archives: %s', 'outspoken'), get_the_date());
				elseif (is_month()):
					printf(__('Monthly Archives: %s', 'outspoken'), get_the_date(_x('F Y', 'monthly archives date format', 'outspoken')));
				elseif (is_year()):
					printf(__('Yearly Archives: %s', 'outspoken'), get_the_date(_x('Y', 'yearly archives date format', 'outspoken')));
				elseif (is_tax()):
					
					$tax_slug = $queried_object->taxonomy;
					$tax_info = get_taxonomy( $tax_slug );
					
					// print_r($tax_info);
					
					echo $tax_info->singular_label;
					echo ': ';
					
					single_term_title();
				else:
					_e('Archives', 'outspoken');
				endif;
				?></h1>
		</header><!-- .archive-header -->
		
		<?php 
			/*
			 * Show taxonomy description
			 * and custom meta
			*/
			
			
			$term_id = $queried_object->term_id;
			$term_description = $queried_object->description;
			
			if (!empty($term_description)) {
				echo '<div class="infobox">';
				echo apply_filters( 'the_content', $term_description );
				echo '</div>';
			}
			
		?>
		
	<?php /* The loop */ ?>
	<?php while (have_posts()): the_post(); ?>
		<?php get_template_part('content', get_post_format()); ?>
	<?php endwhile; ?>

		<?php outspoken_paging_nav(); ?>

<?php else: ?>

		<?php get_template_part('content', 'none'); ?>

<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
