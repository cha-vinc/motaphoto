<?php

function motaphoto_test() {
    echo '<!-- Test Function Loaded -->';
}
add_action('wp_enqueue_scripts', 'motaphoto_test');

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

function motaphoto_enqueue_assets() {
    // Styles
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0');
    wp_enqueue_style('custom-single-photo-css', get_template_directory_uri() . '/css/single-photo.css', array(), '1.0');
    
    // Scripts
    wp_enqueue_script('header-modal-contact', get_template_directory_uri() . '/js/header-modal-contact.js', array('jquery'), '1.1.1', true); // Ajout de 'jquery' et chargement dans le footer
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets', 99);


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
















