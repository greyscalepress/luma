
<h1 class="entry-title">
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
	if($cf_numero !== '') { 
	    	echo '('. $cf_numero;
	    	echo ') ';
	} 
	the_title(); ?></a>
</h1>

				<?php outspoken_share(); ?>

				<div class="entry-meta">
					<?php // outspoken_entry_meta(); 
					
					if($cf_operateur !== '') {
						echo '<p><b>Opérateur:</b> '. $cf_operateur .'</p>';
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

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
