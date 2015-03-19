<?php 

/* Register Post Types
 ********************
*/

add_action( 'init', 'luma_register_post_types' );

function luma_register_post_types() {
	
	register_post_type(
			'blog', array(	
				'label' => __( 'Blog' ),
				//'description' => 'Les films produits par Bord Cadre',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				 'menu_icon' => 'dashicons-format-chat', // src: http://melchoyce.github.io/dashicons/
				// dashicons-admin-post
				'capability_type' => 'post',
				'hierarchical' => false,
				'has_archive'		 => true,
				'rewrite' => array('slug' => ''),
				'query_var' => true,
				'exclude_from_search' => false,
				'menu_position' => 6,
				'supports' => array(
					'title',
					'editor',
					'revisions',
					'thumbnail',
					'author',
					'publicize',
					),
				'taxonomies' => array( 'category', 'post_tag' ),
				'labels' => array (
			  	  'name' => 'Blog',
			  	  'singular_name' => 'Blog',
			  	  'menu_name' => 'Blog',
			  	  'add_new' => 'Ajouter',
			  	  'add_new_item' => 'Ajouter un billet',
			  	  'edit' => 'Modifier',
			  	  'edit_item' => 'Modifier le billet',
			  	  'new_item' => 'Nouveau billet',
			  	  'view' => 'Afficher',
			  	  'view_item' => 'Afficher le billet',
			  	  'search_items' => 'Rechercher',
			  	  'not_found' => 'Aucun résultat',
			  	  'not_found_in_trash' => 'Aucun résultat',
			  	  'parent' => 'Élément Parent',
			),
		) 
	);

}


function custom_taxonomies() 
{  	 
	
register_taxonomy( 
			'operateur',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Opérateurs',
		 		'rewrite' => array('slug' => 'operateur'),
		 		'singular_label' => 'Opérateur'
	 		) 
	 );

register_taxonomy( 
			'pays',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Pays',
		 		'rewrite' => array('slug' => 'pays'),
		 		'singular_label' => 'Pays'
	 		) 
	 );

register_taxonomy( 
			'ville',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Villes',
		 		'rewrite' => array('slug' => 'ville'),
		 		'singular_label' => 'Ville'
	 		) 
	 );

register_taxonomy( 
			'lieux',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Lieux',
		 		'rewrite' => array('slug' => 'lieu'),
		 		'singular_label' => 'Lieu'
	 		) 
	 );
 
register_taxonomy( 
			'info-1',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Séries',
		 		'rewrite' => array('slug' => 'series'),
		 		'singular_label' => 'Série'
	 		) 
	 ); 


register_taxonomy( 
			'info-5',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Info-5',
		 		'rewrite' => array('slug' => 'info-5'),
		 		'singular_label' => 'Info-5'
	 		) 
	 ); 



register_taxonomy( 
			'info-7',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Info-7',
		 		'rewrite' => array('slug' => 'info-7'),
		 		'singular_label' => 'Info-7'
	 		) 
	 ); 

register_taxonomy( 
			'events',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Events',
		 		'rewrite' => array('slug' => 'evenement'),
		 		'singular_label' => 'Event'
	 		) 
	 ); 

register_taxonomy( 
			'genres',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Genres',
		 		'rewrite' => array('slug' => 'genre'),
		 		'singular_label' => 'Genre'
	 		) 
	 ); 

register_taxonomy( 
			'sujet',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Sujets',
		 		'rewrite' => array('slug' => 'sujet'),
		 		'singular_label' => 'Sujet'
	 		) 
	 ); 
	 
register_taxonomy( 
			'identi',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Identi',
		 		'rewrite' => array('slug' => 'personne-identifiee'),
		 		'singular_label' => 'Personne identifiée'
	 		) 
	 ); 
	 
register_taxonomy( 
			'objet',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Objet',
		 		'rewrite' => array('slug' => 'objet'),
		 		'singular_label' => 'Objet'
	 		) 
	 ); 
	 
register_taxonomy( 
			'mouv',
			array( 'post' ),
			array( 
		 		'hierarchical' => false, 
		 		'label' => 'Action',
		 		'rewrite' => array('slug' => 'action'),
		 		'singular_label' => 'Action'
	 		) 
	 ); 	 	 	 	 
  
} // end custom_taxonomies()  function
 //hook into the init action and call custom_taxonomies() when it fires
 add_action( 'init', 'custom_taxonomies', 0 ); 


