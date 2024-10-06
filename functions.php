<?php
// Enregistrement - Menu Principal
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Enregistrement - Menu pied de page
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Menu du pied de page', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );

// Style
function motaphoto_styles() {
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'motaphoto_styles');

// Script
function motaphoto_script() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_script', 'motaphoto_script')






?>







