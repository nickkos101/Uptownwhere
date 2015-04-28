<?php 
// Theme Supports:
add_theme_support('post-thumbnails');
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'woocommerce' );
add_theme_support('html5', array('search-form'));
//Add Scripts & Styleshits
function uptownwhere_scripts() {
	//Stylesheets
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'normalize' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style' );
	wp_register_style( 'theme', get_template_directory_uri() . '/css/theme.css' );
	wp_enqueue_style( 'theme' );
	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'responsive' );
	wp_register_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css' );
	wp_enqueue_style( 'slick' );
    wp_register_style( 'swipebox', get_template_directory_uri() . '/js/swipebox/swipebox.css' );
    wp_enqueue_style( 'swipebox' );
    wp_register_style( 'lightbox', get_template_directory_uri() . '/js/lightbox/lightbox.css' );
    wp_enqueue_style( 'lightbox' );
    wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style( 'fontawesome' );

	//Scripts
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mapgenerator', get_template_directory_uri() . '/js/map-gen.js', array( 'jquery' ) );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array( 'jquery' ) );
    wp_enqueue_script( 'linkpreview', get_template_directory_uri() . '/js/linkpreview.js', array( 'jquery' ) );
    wp_enqueue_script( 'proxyajax', get_template_directory_uri() . '/js/proxy-ajax.js', array( 'jquery' ) );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox/lightbox.js', array( 'jquery' ) );
    wp_enqueue_script( 'swipebox', get_template_directory_uri() . '/js/swipebox/jquery.swipebox.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'function', get_template_directory_uri() . '/js/function.js', array('jquery', 'slick'), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'uptownwhere_scripts' );

function uptownwhere_title( $title )
{
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return __( 'Home', 'theme_domain' ) . ' | '. get_bloginfo( 'name' ). ' | '. get_bloginfo( 'description' );
	}
	return $title;
}
add_filter( 'wp_title', 'uptownwhere_title' );

function instaGramFeed($userID, $accessToken){
    $url = "https://api.instagram.com/v1/users/".$userID."/media/recent/?access_token=".$accessToken;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch); 
    $result = json_decode($result);
    $i = 0;
    echo '<div class="half-height-minus-header">';
    foreach ($result->data as $post) if ($i < 20) {
        echo '<div class="column fifth tight-space"><a rel="gallery-1" class="swipebox" title="'.$post->caption->text.'<br /><small>@uptownwhere | &#10084; '.$post->likes->count.'</small>" href="'.$post->images->standard_resolution->url.'"><div class="ig-square cover eighth-height-minus-header three-s-transition" style="background-image: url('.$post->images->thumbnail->url.');"><p class="three-s-transition">&#10084; '.$post->likes->count.'</p></div></a></div>';
        $i++;
    }
    echo '</div>';
}

function uptownwhere_create_post_type() {
    register_post_type('Snapshots', array(
        'labels' => array(
            'name' => __('Snapshots'),
            'singular_name' => __('Snapshot'),
            'add_new'            => _x( 'Add New', 'snapshots' ),
            'add_new_item'       => __( 'Add New Snapshot' ),
            'new_item'           => __( 'New Snapshot' ),
            'edit_item'          => __( 'Edit Snapshot' ),
            'view_item'          => __( 'View Snapshot' ),
            'all_items'          => __( 'All Snapshots' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'snapshots'),
        'menu_icon'   => 'dashicons-camera',
        'supports' => array('title' ,'page-attributes'),
        )
    );
}
add_action('init', 'uptownwhere_create_post_type');


function uptownwhere_tax() {
    register_taxonomy(
        'galleries',
        'videos',
        array(
            'label' => __( 'Galleries' ),
            'hierarchical' => true,
            'rewrite' => true
            )
        );

}
add_action( 'init', 'uptownwhere_tax' );


register_nav_menus( array(
    'Header_Nav' => 'Header Navigation Area',
    'Footer_Nav' => 'Footer Navigation Area',
    ));


register_sidebar( 
    array(
        'name' => __( 'Shop Sidebar', 'wpb' ),
        'id' => 'sidebar-shop',
        'description' => __( 'This sidebar appears on the left hand side of all pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );



//Setup backend menu order
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'edit.php?post_type=solutions', // Solutions
        'edit.php?post_type=by-industry', // By Industry
        'edit.php?post_type=by-department', // By Department
        'separator1', // First separator
        'edit.php?post_type=platform-features', // Platform Features
        'edit.php?post_type=data-connectors', // Data Connectors
        'edit.php?post_type=resources', // Resources
        'edit.php?post_type=marketing', // Marketing Pages
        'edit.php?post_type=event-promos', // Event Promotions
        'separator2', // Second separator
        'edit.php?post_type=videos', // Videos
        'edit.php?post_type=print-materials', // Print Materials
        'edit.php?post_type=webinars', // Webinars
        'edit.php?post_type=white-papers', // White Papers
        'edit.php?post_type=careers', // Careers
        'separator-last', // Last separator
        'index.php', // Dashboard
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        'upload.php', // Media
        'edit-comments.php', // Comments
        'separator3', // Third separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order

?>