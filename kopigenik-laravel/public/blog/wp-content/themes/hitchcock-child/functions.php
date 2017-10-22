<?php
function my_theme_enqueue_styles() {

    $parent_style = 'hitchcock-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style ('bootstrap', get_stylesheet_directory_uri().'/bootstrap.css', array( $parent_style ));
    wp_enqueue_style ('kopigenik', get_stylesheet_directory_uri().'/kopigenik.css', array( $parent_style ));
    wp_enqueue_style ('Montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat', array( $parent_style ));
    wp_enqueue_style ('Lato-font', 'https://fonts.googleapis.com/css?family=Lato', array( $parent_style ));

    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap.js', array (), false, true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>