<!-- Fichier PHP pour la page d'accueil du site -->

<!-- Insertion du header | Inclut le fichier header.php-->
<?php
get_header();
?>

<main>
    <!-- Image d'en-tête  -->
<div class="principal-head">
    <?php
    // Sélection d'une photo aléatoire de la même catégorie
    $args_related_photos = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand', // Tri des résultats de manière aléatoire
    );

    $related_photos_query = new WP_Query($args_related_photos);

    // Boucle | Parcourir les résultats 
    while ($related_photos_query->have_posts()) :
        $related_photos_query->the_post();
        $post_permalink = get_permalink(); // Lien permanent de la publication actuelle
    ?>
    <a href="<?php echo esc_url($post_permalink); ?>">
        <div class="home-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titre-homepage.png" alt="Titre Accueil">
        </div>
    </a>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); // Réinitialiser | Données de publication à leur état d'origine ?>
</div>

<!-- Filtres du catalogue photo -->
<div class="filtre-tri">
    <!-- Catégories -->
    <ul class="filtre-categorie">
        <li class="filtre-btn " data-type="categorie" data-filter="ALL">
            <span class="main-option">Catégories</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-filtre.png" alt="icon" class="icon-btn">
            <ul class="options">
                <li class="all-filter" data-filter="ALL">Catégories</li>
                <?php
                $photo_categories = get_terms('categorie');
                foreach ($photo_categories as $category) {
                    echo '<li data-filter="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
                }
                ?>
            </ul>
        </li>
    </ul>
    
    <!-- Formats -->
    <ul class="filtre-format">
        <li class="filtre-btn" data-type="format" data-filter="ALL">
            <span class="main-option">Formats</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-filtre.png" alt="icon" class="icon-btn">
            <ul class="options">
                <li class="all-filter" data-filter="ALL">Formats</li>
                <?php
                $photo_formats = get_terms('format');
                foreach ($photo_formats as $format) {
                    echo '<li data-filter="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</li>';
                }
                ?>
            </ul>
        </li>
    </ul>

    <!-- Trier par date -->
    <ul class="tri-date">
        <li class="filtre-btn " data-type="order" data-filter="ALL">
            <span class="main-option">Trier par</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-filtre.png" alt="icon" class="icon-btn" />
            <ul class="options">
                <li class="all-filter" data-filter="ALL">Trier par</li>
                <li data-filter="DESC">Du plus récent au plus ancien</li>
                <li data-filter="ASC">Du plus ancien au plus récent</li>
            </ul>
        </li>
    </ul>
</div>


<!-- Bloc de photos / reprise du template part du fichier single-photo.php-->
<div id="photo-container" >
    <?php include get_template_directory() . '/template-parts/photo-block.php'; ?>
</div>



</main>

<!-- Insertion du footer | Inclut le fichier footer.php-->

<?php get_footer(); 
?>