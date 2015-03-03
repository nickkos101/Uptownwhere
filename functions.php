<?php

//Theme Supports
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

//Menu Registration
register_nav_menus( array(
	'Header_Nav' => 'Header Navigation Area',
	) );

//Sidebar Registration
register_sidebar( array(
	'name' => __( 'Blog Sidebar', 'wpb' ),
	'id' => 'sidebar-1',
	'description' => __( 'The blog sidebar appears on the right hand side.', 'wpb' ),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	) 
);

?>