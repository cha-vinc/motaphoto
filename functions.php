<?php
// Menu Principal - Header
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Menu pied de page - Footer
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Menu du pied de page', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );

// Styles
function motaphoto_styles() {
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'motaphoto_styles');

// Scripts
function motaphoto_script() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_script', 'motaphoto_script');

function motaphoto_theme_support() {

    add_theme_support( 'custom-logo', array(
        'height' => 22,
        'width'  => 345,
        'flex-height' => true,
        'flex-width' => true,

    ) );

    add_theme_support('post-thumbnails'); //activer les images mises en avant

}
add_action('after_setup_theme', 'motaphoto_theme_support');




?>







