<?php

/**
 * A Widget that produces a list of Operators
 *
 * since MEM 1.0.5
 *
 *
 **/


class lum_operators extends WP_Widget {
		
		
				/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			
			parent::__construct(
				'lum_operators', // Base ID
				__('Lumière Operators', 'luma'), // Name
				array( 
					'description' => __( 'Display a list of operators', 'luma' ), 
					'classname' => 'lum_operators',
				) // Args
			); // parent::__construct
			
			// Refreshing the widget's cached output with each new post
//			add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
//			add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
//			add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
			
		} // __construct()
		

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		function form( $instance ) {
		
			?>
					<p>Nothing to configure</p>
			<?php 			
			
		} // function form()

	/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		function update( $new_instance, $old_instance ) {
		
			
		} // function update()

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		function widget( $args, $instance ) {
		
					// Check if there is a cached output
//					$cache = wp_cache_get('widget_lum_operators', 'widget');
//			
//					if ( !is_array($cache) )
//						$cache = array();
//			
//					if ( ! isset( $args['widget_id'] ) )
//						$args['widget_id'] = $this->id;
//			
//					if ( isset( $cache[ $args['widget_id'] ] ) ) {
//						echo $cache[ $args['widget_id'] ];
//						return;
//					}
					
					?>
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
					<?php
			
		
			
//					$cache[$args['widget_id']] = ob_get_flush();
//					wp_cache_set('widget_lum_operators', $cache, 'widget');
			
		}	// function widget
		
		function flush_widget_cache() {
			wp_cache_delete('widget_lum_operators', 'widget');
		}
	
	
} // class mem_event_list

// register widget

function register_lum_operators_widget(){
	register_widget('lum_operators');	
}
add_action('widgets_init', 'register_lum_operators_widget');