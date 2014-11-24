<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 */
?>

		</div><!-- #main -->

		<div id="footer-widgets" class="sidebar-container" role="complementary">
			<div class="sidebar-inner">
				<div class="widget-area">
					<h2 class="h2">Opérateurs</h1>
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
				</div>
				
				<div class="widget-area">
					
					<h2 class="h2">Pays</h1>
					<ul class="tag-cloud text">
					<?php 
					      		
					
					$args = array(
					    'taxonomy'  => array('pays'),
					    //info = 19, test=23, event=10
					    'number' => 80, 
					    'largest'	=> 16,
					   ); 
					   
					wp_tag_cloud($args);
								 
					?>
					</ul>
					<?php dynamic_sidebar('sidebar-footer-center'); ?>
				</div>
				
				<div class="widget-area">
					<h2 class="h2">Villes</h1>
					<ul class="tag-cloud text">
					<?php 
					
					$args = array(
					    'taxonomy'  => array('ville'),
					    //info = 19, test=23, event=10
					    'number' => 80, 
					    'largest'	=> 16,
					   ); 
					   
					wp_tag_cloud($args);
								 
					?>
					</ul>
					
					<?php dynamic_sidebar('sidebar-footer-right'); ?>
				</div>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php do_action('outspoken_credits'); ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a>
				
				– made in 2013-2014 – built with WordPress
				
<?php ?>
			</div><!-- .site-info -->
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-52346430-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
	
</body>
</html>