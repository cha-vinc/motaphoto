<?php

function motaphoto_styles() {
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'motaphoto_styles');







