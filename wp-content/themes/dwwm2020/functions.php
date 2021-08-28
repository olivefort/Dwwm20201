<?php

function chargementFiles(){
    //exemple d'une fonction pour appeler le css => wp_enqueue_style(5 paramètres) : ( nom , source, dépendance, version, média)

    // wp_enqueue_style( 'main', get_stylesheet_directory_uri(  ).'/css/main.css', array(), '1.1', 'all');
    // wp_enqueue_style( 'base', get_stylesheet_directory_uri(  ).'/css/base.css', array(), '1.1', 'all');
    
    
    wp_register_style('base', get_stylesheet_directory_uri(  ).'/css/base.css', [], '1.0');
    wp_register_style('main', get_stylesheet_directory_uri(  ).'/css/main.css', ['base'], '1.0');
	wp_enqueue_script('nav', get_stylesheet_directory_uri(  ) . '/js/nav.js', array(),'1.0', true);

    wp_enqueue_style('main');


    // seul les 2 premiers paramètre sont obligatoire, dans ce cas on pourrait se passer des 3 derniers
    
    //nom : définie par le dev
    //source : on va chercher la source du css avec un système de concatenation avec le "."
    //dépedance : aucune donc la valeur par défaut est 'array()'
    //version : définie par le dev
    //média : pour tous type de média donc 'all'

    //exemple d'une fonction pour appeler le js => wp_enqueue_script(5 paramètres) : ( nom , source, dépendance, version, footer)
    /*
    wp_enqueue_script( 'alert', get_stylesheet_directory_uri(  ).'/js/alert.js', array(), '1.0', false);
    */
    //nom : définie par le dev
    //source : on va chercher la source du js avec un système de concatenation avec le "."
    //dépedance : aucune donc la valeur par défaut est 'array()'
    //version : définie par le dev
    //footer : chargement dans le footer ou non (booléen)

   
}

//fonction d'action qui va lancer la fonction du css au dessus = > add_action(4 paramètres) : (action,fonction,priorité,arguments)
add_action('wp_enqueue_scripts', 'chargementFiles');
// les 2 premiers paramètre sont obligatoire, on ne met presque jamais les 2 autres

//action : on "hook" l'endroit à quoi on veut lier l'action
//fonction : on charge la fonction demandé 

//Support images à la une
// add_theme_support( $feature:string, $args:mixed )
add_theme_support( 'post-thumbnails');

// Support du title
add_theme_support( 'title-tag' );

//Format image
// add_image_size( $name:string, $width:integer, $height:integer, $crop:boolean|array  )
add_image_size( 'img-article', 200, 200, true );
add_image_size( 'img-article2x', 400, 400, true );

//menus
// register_nav_menu( 'menu-du-header', 'mon menu dans le header' );
register_nav_menus(
	array(
		'menu-du-header' => 'mon menu dans le header',
		'menu-du-footer' => 'mon menu dans le footer',
		//'menu-des-reseaux' => 'mon menu pour les reseaux'	
	)
);

//pour contact form
add_filter('wpcf7_autop_or_not', '__return_false');

//Creation Custom Post Type
function dwwm_custom_post_type(){
    /* CPT Formation */
	$args = array(
		'public' => true,
		'label' => 'Formation',
		'show_in_rest' => false,
		'supports' =>  array('title','editor') ,
		'has_archive' => true,
		'menu_icon' => 'dashicons-laptop',
		
	);
	register_post_type('formation', $args);
	
	/* CPT Etudiant */
	$args = array(
		'public' => true,
		'label' => 'Etudiant',
		'show_in_rest' => false,
		'supports' =>  array('title') ,
		'has_archive' => true,
		'menu_icon' => 'dashicons-welcome-learn-more',
		
    );
    register_post_type('etudiant', $args);
}
add_action('init', 'dwwm_custom_post_type');
/* Pages d'options ACF */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Paramétrages du thème',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_others_posts',
        'redirect'		=> false,
        'menu_icon'     => 'dashicons-admin-page'
	));
}

//Fonction pour changer l'ordre de la liste formation
function be_change_event_posts_per_page( $query ) {
	//formations
	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'formation' ) ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
	//étudiants
	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'etudiant' ) ) {
		$query->set( 'posts_per_page', '16' );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'be_change_event_posts_per_page' );