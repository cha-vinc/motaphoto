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
    wp_enqueue_style('custom-index-css', get_template_directory_uri() . '/css/index.css', array(), '1.0');
    wp_enqueue_style('custom-single-photo-css', get_template_directory_uri() . '/css/single-photo.css', array(), '1.0');
    wp_enqueue_style('lightbox', get_template_directory_uri() . '/css/lightbox.css', array(), '1.0');
    wp_enqueue_style('custom-modal-contact', get_template_directory_uri() . '/css/modal-contact.css', array(), '1.0');
    wp_enqueue_style('custom-photo-block', get_template_directory_uri() . '/css/photo-block.css', array(), '1.0');
    // Scripts
    wp_enqueue_script('header-modal-contact', get_template_directory_uri() . '/js/header-modal-contact.js', array('jquery'), '1.1.1', true); // Ajout de 'jquery' et chargement dans le footer
    wp_enqueue_script('single-photo-modal-contact', get_template_directory_uri() . '/js/single-photo-modal-contact.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('single-photo-thumbnail', get_template_directory_uri() . '/js/single-photo-thumbnail.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('index-filtre', get_template_directory_uri() . '/js/index-filtre.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('load-more', get_template_directory_uri() . '/js/photo-block-load-more.js', array('jquery'), '1.1.1', true);
    wp_localize_script('load-more', 'ajaxurl', admin_url('admin-ajax.php'));
    wp_enqueue_script('infinite-pagination', get_template_directory_uri() . '/js/infinite-pagination.js', array('jquery'), '1.1.1', true);
    wp_enqueue_script('index-filtre', get_template_directory_uri() . '/js/index-filtre.js', array('jquery'), '1.1.1', true);
    wp_localize_script('index-filtre', 'ajaxurl', admin_url('admin-ajax.php'));
    
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets', 99);

/* Intégration des Google Fonts */
function motaphoto_enqueue_google_fonts() {
    wp_enqueue_style( 'Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false );
    wp_enqueue_style('Space mono', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap', false);
}
add_action( 'wp_enqueue_scripts', 'motaphoto_enqueue_google_fonts' );


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

// Ajout du fichier JavaScript (Pagination infinie - Bloc Photo)
function enqueue_infinite_pagination_js() {
    wp_enqueue_script('infinite-pagination', get_template_directory_uri() . '/js/infinite-pagination.js', array('jquery'), '', true);
    wp_localize_script('infinite-pagination', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_infinite_pagination_js');


// Fonction pour le bouchon "Charger plus" dans la page d'accueil
function load_more_photos() {
    // Récupérer les paramètres de la requête AJAX
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';

    // Arguments pour récupérer les photos
    $args_custom_posts = array(
        'post_type' => 'photo',
        'posts_per_page' => 4, 
        'paged' => $page,
        'orderby' => 'date',
        'order' => $order,
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    // Ajout du filtre catégorie si présent
    if ($category && $category !== 'ALL') {
        $args_custom_posts['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    // Ajout du filtre format si présent
    if ($format && $format !== 'ALL') {
        $args_custom_posts['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        );
    }

    $custom_posts_query = new WP_Query($args_custom_posts);

    // Boucle pour afficher les photos
    if ($custom_posts_query->have_posts()) {
        while ($custom_posts_query->have_posts()) {
            $custom_posts_query->the_post();
            $related_categories = get_the_terms(get_the_ID(), 'categorie');
            $related_category_names = array();

            if ($related_categories) {
                foreach ($related_categories as $category) {
                    $related_category_names[] = esc_html($category->name);
                }
            }
            ?>
            <div class="custom-post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumbnail-wrapper">
                            <?php the_post_thumbnail(); ?>
                            <div class="thumbnail-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.png" alt="Icône de l'œil">
                                <div class="lightbox-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullsreen.png" alt="Icône de lightbox"> 
                                </div>
                                <div class="photo-info">
                                    <div class="photo-info-left">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                    <div class="photo-info-right">
                                        <p><?php echo implode(', ', $related_category_names); ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
            <?php
        }
    } else {
        echo '<p>Aucune photo trouvée pour les filtres sélectionnés.</p>';
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');