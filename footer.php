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
										
					<?php 
					
					// NOTE: la liste des opérateurs est dans le widget custom
					
					dynamic_sidebar('sidebar-footer-left'); ?>
					
				</div>
				
				<div class="widget-area">
					
					
					<?php dynamic_sidebar('sidebar-footer-center'); ?>
				</div>
				
				<div class="widget-area">
					
										
					<?php dynamic_sidebar('sidebar-footer-right'); ?>
				</div>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php do_action('outspoken_credits'); ?>
				
				Ce site repose sur les données produites par l'équipe de recherche de Michelle Aubert et Jean-Claude Seguin. Il a été développé par Manuel Schmalstieg et des étudiants de l’EAA La Chaux-de-Fonds (<a href="//catalogue-lumiere.com/">voir crédits</a>).
				
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