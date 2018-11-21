<?php 

/* vincular Scripts y estios */

function wmt_theme_style () {
	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'flexslider_css', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/css/estilos.css' );
}
add_action( 'wp_enqueue_scripts', 'wmt_theme_style' );

function wmt_theme_js () {
 	wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'bootstrap_js', 'flexslider_js' ), '', 'true' );
 	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', 'true' );
 	wp_enqueue_script( 'flexslider_js', get_template_directory_uri() . '/js/jquery.flexslider.js', '', '', 'true' );
}

add_action( 'wp_enqueue_scripts', 'wmt_theme_js' );

/* Menus */ 

//add_theme_support('menus');

function register_mis_menus() {
	register_nav_menus( 
		array(
			'menu-principal' => __('Menu Principal'),
			'portafolio-menu' => __('Menu Portafolio')
		)
	);
}
add_action( 'init', 'register_mis_menus' );

/* Thumbnails */

add_theme_support( 'post-thumbnails' );

/*********************/
/* Post portafolio */

function wordpress_init_portafolio() {
  register_post_type( 'portafolio',
    array(
      'labels' => array(
        'name' => __( 'Portafolio' ),
        'singular_name' => __( 'Trabajo' )
      ),
      'public' => true,
      'has_archive' => true, 
	  'supports' => array (	//Agregamos los soportes.
	 	 'title', 'editor', 'thumbnail'
	),
	  'rewrite' => array('slug' => 'portafolio')
    )
  );
	register_taxonomy( 'clasificacion', array('portafolio'), array(
		'hierarchical' => true,
		'labels' => $labels, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'clasificacion-portafolio')
	));
}
add_action( 'init', 'wordpress_init_portafolio' );

/****************************************/
/*Limitar Excerpt                       */

function get_excerpt($count){
	$permalink = get_permalink( $post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	//$excerpt = $excerpt . '... <a href="'. $permalink . '">leer más</a>';
	return $excerpt;
}


 