<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once('includes/api_data.php');
require_once('includes/order_form.php');
require_once('includes/cart.php');

// main menu 
require_once('includes/wp_bootstrap_navwalker.php');

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main_menu' =>'Main Menu',
		  'secondary_menu' => 'Secondary Menu',
		)
	);
}

// custom css 

add_editor_style('/assets/css/editor-style.css');

// avatar 

if ( !function_exists('saudi_addgravatar') ) {
	function saudi_addgravatar( $avatar_defaults ) {
		$myavatar = get_template_directory_uri() . '/images/avatar.png';
		$avatar_defaults[$myavatar] = 'avatar';
		return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'saudi_addgravatar' );
}

// theme support 

add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

add_theme_support( 'post-thumbnails' );

// images size

// regular size
add_image_size( 'regular', 400, 350, true );

// medium size
add_image_size( 'medium', 650, 500, true );
	
// large thumbnails
add_image_size( 'large', 960, '' );

function saudi_show_image_sizes($sizes) {
    $sizes['regular'] = __( 'Our Regular Size', 'fda' );
    $sizes['medium'] = __( 'Our Medium Size', 'fda' );
    $sizes['large'] = __( 'Our Large Size', 'fda' );
    return $sizes;
}
add_filter('image_size_names_choose', 'saudi_show_image_sizes');


add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('my_theme', get_template_directory() . '/languages');

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}




function new_excerpt_more($more) {
    global $post;
 	return '...<br /><br /><a href="'. get_permalink($post->ID) . '" class="read_more">read more →</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


	
function saudi_styles() {
	// Register theme stylesheet.
	
	wp_register_style(
		'lightbox',
		get_template_directory_uri() . '/assets/css/lightbox.min.css',
		array(),
		true
	);

	// wp_register_style(
	// 	'bootstrap',
	// 	get_template_directory_uri() . '/assets/css/bootstrap.min.css',
	// 	array(),
	// 	true
	// );

	wp_register_style(
		'aos',
		get_template_directory_uri() . '/assets/css/aos.css',
		array(),
		true
	);

	wp_register_style(
		'animate',
		get_template_directory_uri() . '/assets/css/animate.css',
		array(),
		true
	);

	wp_register_style(
		'creditcard',
		get_template_directory_uri() . '/assets/css/creditcard.css',
		array(),
		true
	);

	wp_register_style(
		'fedex',
		get_template_directory_uri() . '/assets/css/fedex.css',
		array(),
		true
	);

	wp_register_style(
		'finalform',
		get_template_directory_uri() . '/assets/css/finalform.css',
		array(),
		true
	);


	wp_register_style(
		'order-form-style',
		get_template_directory_uri() . '/assets/css/order-form.css',
		array(),
		"1.0.2.1"
	);

	wp_register_style(
		'saudi-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		"1.0.2.1"
	);

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'saudi-style' );
	wp_enqueue_style( 'order-form-style' );
	wp_enqueue_style( 'lightbox' );
	// wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'aos' );
	wp_enqueue_style( 'animate' );
	wp_enqueue_style( 'creditcard' );
	wp_enqueue_style( 'fedex' );
	wp_enqueue_style( 'finalform' );
	wp_enqueue_style( 'main-style' );
	wp_enqueue_style( 'fontawesome' );

}



add_action( 'wp_enqueue_scripts', 'saudi_styles' );


function saudi_scripts() {
	wp_deregister_script('jquery');

	wp_register_script(
		'jqueryjs',
		get_theme_file_uri( '/assets/js/jquery-1.10.2.js' ),
		array(),
		null,
		true
	);

	wp_register_script(
		'bootstrap',
		get_theme_file_uri( '/assets/js/bootstrap.min.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'popper',
		get_theme_file_uri( '/assets/js/popper.min.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'select2',
		'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'aos',
		get_theme_file_uri( '/assets/js/aos.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
	wp_register_script(
		'appostileMyFBI',
		get_theme_file_uri( '/assets/js/appostileMyFBI.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'jquery-mask',
		get_theme_file_uri( '/assets/js/jquery.mask.min.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'order-form',
		get_theme_file_uri( '/assets/js/order-form.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'script',
		get_theme_file_uri( '/assets/js/script.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_register_script(
		'scripts',
		get_theme_file_uri( '/assets/js/scripts.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
	wp_enqueue_script('jqueryjs');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('popper');
	wp_enqueue_script('select2');
	wp_enqueue_script('aos');
	wp_enqueue_script('appostileMyFBI');
	wp_enqueue_script('jquery-mask');
	wp_enqueue_script('order-form');
	wp_enqueue_script('scripts');
	wp_enqueue_script('script');
	


	wp_localize_script('script', 'connect', array('ajax_url' =>admin_url('admin-ajax.php')));
	wp_localize_script('scripts', 'connect2', array('ajax_url' => admin_url('admin-ajax.php')));
	wp_localize_script('order-form', 'orderform', array('ajax_url' => admin_url('admin-ajax.php')));

}



add_action('wp_enqueue_scripts', 'saudi_scripts');

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function saudi_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'saudi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'saudi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'saudi_widgets_init' );

	
function validate_contact_info2() {
	$data = new order_form;
	
	$data->validate_rate_fedex();
}
function validate_shipping2() {
	$data = new order_form;
	
	$data->validate_shipping();
}

function retreive_session() {
	$cart = new cart;
	$session = $cart->retreive_session();

	if ($session != null) {
		return $session;
	} else {
		return array('user' => array(
				'userInfo' => array(
						'firstname' => '',
						'lastname' => '',
						'city' => '',
						'email' => '',
						'address' => '',
						'zipcode' => '',
						'companyName' => '',
						'state' => '',
						'tel' => '',
						)
					)
				);
		
	}
}
function payment_process2() {
	
	$data = new order_form;
	$data->payment_process();
}

function autocomplete_zipcode2() {
	$data = new order_form;
	$data->zipcode_autocomplete();
}

function autocomplete_user_data2() {
	$data = new order_form;
	$data->auto_complete_user_data();
}

function update_current_step2() {
	$data = new order_form;
	$data->update_current_step();
}

function retrieveWebsiteData() {
	$data = new order_form;
	return $data->retrieveWebsiteData();

}

function get_documents() {
	$data = new api_data;
	return $data->get_documents_by_countryID();
}

function get_services_without_post($SelectedDocument) {
	$data = new api_data;
	return $data->get_services_without_post($SelectedDocument);
}

function get_services_ajax2() {
	$data = new api_data;
	return $data->get_services();
}
	
function get_countries_findembassy() {
	$data = new api_data;
	return $data->get_countries_findembassy();
}
function add_return_shipping2() {
	$data = new order_form;
	return $data->add_return_shipping2();
}
	
add_action( 'wp_ajax_nopriv_payme2nt_proc11ess', 'payment_process2' );
add_action( 'wp_ajax_nopriv_validate_contact_info', 'validate_contact_info2' );
add_action( 'wp_ajax_nopriv_validate_shipping', 'validate_shipping2' );
add_action( 'wp_ajax_nopriv_autocomplete_zipcode', 'autocomplete_zipcode2' );
add_action( 'wp_ajax_nopriv_autocomplete_user_data', 'autocomplete_user_data2' );
add_action( 'wp_ajax_nopriv_update_current_step', 'update_current_step2' );
add_action( 'wp_ajax_nopriv_get_services_ajax', 'get_services_ajax2' );
add_action( 'wp_ajax_nopriv_add_return_shipping', 'add_return_shipping2' );

// session_start();
// session_destroy();


function empassy_location_post() {
    $labels = array(
        'name'                  => _x( 'empassy_location', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'location', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'locations', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'location', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New location', 'textdomain' ),
        'new_item'              => __( 'New location', 'textdomain' ),
        'edit_item'             => __( 'Edit location', 'textdomain' ),
        'view_item'             => __( 'View location', 'textdomain' ),
        'all_items'             => __( 'All locations', 'textdomain' ),
        'search_items'          => __( 'Search locations', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent locations:', 'textdomain' ),
        'not_found'             => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'location Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'location archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'locations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'locations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
		'hierarchical'        => true,
	);
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'location' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
		// 'taxonomies'         => array( 'category' ),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'category', 'page-attributes' ),
    );
 
    register_post_type( 'empassy_location', $args );
}
 
add_action( 'init', 'empassy_location_post' );

// // Register Custom Taxonomy
// function custom_taxonomy() {

//     $labels = array(
//         'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
//         'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
//         'menu_name'                  => __( 'Categories', 'text_domain' ),
//         'all_items'                  => __( 'All Items', 'text_domain' ),
//         'parent_item'                => __( 'Parent Item', 'text_domain' ),
//         'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
//         'new_item_name'              => __( 'New Item Name', 'text_domain' ),
//         'add_new_item'               => __( 'Add New Item', 'text_domain' ),
//         'edit_item'                  => __( 'Edit Item', 'text_domain' ),
//         'update_item'                => __( 'Update Item', 'text_domain' ),
//         'view_item'                  => __( 'View Item', 'text_domain' ),
//         'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
//         'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
//         'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
//         'popular_items'              => __( 'Popular Items', 'text_domain' ),
//         'search_items'               => __( 'Search Items', 'text_domain' ),
//         'not_found'                  => __( 'Not Found', 'text_domain' ),
//         'no_terms'                   => __( 'No items', 'text_domain' ),
//         'items_list'                 => __( 'Items list', 'text_domain' ),
//         'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
//     );
//     $args = array(
//         'labels'                     => $labels,
//         'hierarchical'               => true,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//     );
//     register_taxonomy( 'custom_category', array( 'custom_post_type' ), $args );

// }
// add_action( 'init', 'custom_taxonomy', 0 );

// Disable RSS feed from url
function turn_off_feed() {
	wp_redirect( get_permalink( $post->post_parent ), 301 ); 
	exit;
}

add_action('do_feed', 'turn_off_feed', 1);
add_action('do_feed_rdf', 'turn_off_feed', 1);
add_action('do_feed_rss', 'turn_off_feed', 1);
add_action('do_feed_rss2', 'turn_off_feed', 1);
add_action('do_feed_atom', 'turn_off_feed', 1);
add_action('do_feed_rss2_comments', 'turn_off_feed', 1);
add_action('do_feed_atom_comments', 'turn_off_feed', 1);
