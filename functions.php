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


/****************************************/
/*Custom Post Types                     */

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

/*****************************/
/* Post Testimonios y Slider */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Testimonios.
	 */

	$labels = array(
		"name" => __( "Testimonios", "" ),
		"singular_name" => __( "Testimonio", "" ),
	);

	$args = array(
		"label" => __( "Testimonios", "" ),
		"labels" => $labels,
		"description" => "Incluir testimonios..",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonios", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "testimonios", $args );

	/**
	 * Post Type: Sliders.
	 */

	$labels = array(
		"name" => __( "Sliders", "" ),
		"singular_name" => __( "Slider", "" ),
	);

	$args = array(
		"label" => __( "Sliders", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slider", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "slider", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

/*****************************/
/* Custom Fields             */

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

// Including fields. 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5bef25a14092f',
	'title' => 'Bienvenida',
	'fields' => array(
		array(
			'key' => 'field_5bef25bba93b2',
			'label' => 'titulo intro',
			'name' => 'titulo_intro',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5bef25d2a93b3',
			'label' => 'Texto Intro',
			'name' => 'texto_intro',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page',
				'operator' => '==',
				'value' => '5',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5bef1c0b45071',
	'title' => 'Sliders',
	'fields' => array(
		array(
			'key' => 'field_5bef1c15faf49',
			'label' => 'Descripcion Sliders',
			'name' => 'descripcion_sliders',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5bef1c52faf4a',
			'label' => 'Link Slider',
			'name' => 'link_slider',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5beb68436c7f6',
	'title' => 'Testimonios',
	'fields' => array(
		array(
			'key' => 'field_5beb685cb980d',
			'label' => 'testimonios',
			'name' => 'testimonios',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'text',
			'media_upload' => 0,
			'toolbar' => 'full',
			'delay' => 0,
		),
		array(
			'key' => 'field_5beb68b6b980e',
			'label' => 'Nombre cliente',
			'name' => 'nombre_cliente',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Nombre del Cliente',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5beb6905b980f',
			'label' => 'Sitio Web',
			'name' => 'sitio_web',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'http://',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'testimonios',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'slug',
		7 => 'author',
		8 => 'format',
		9 => 'page_attributes',
		10 => 'featured_image',
		11 => 'categories',
		12 => 'tags',
		13 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5beda30462fd3',
	'title' => 'Texto sobre mi',
	'fields' => array(
		array(
			'key' => 'field_5beda31f83697',
			'label' => 'mi referencia',
			'name' => 'mi_referencia',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page',
				'operator' => '==',
				'value' => '9',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
