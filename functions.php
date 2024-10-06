<?php

function motaphoto_styles() {
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0', 'all');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'motaphoto_styles');







