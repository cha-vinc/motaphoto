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
    <!-- Categorie -->
    <label for="filtre-categorie"></label>
    <select name="filtre-categorie" id="filtre-categorie">
        <option value="ALL">CATÉGORIE</option>
        <?php
        $photo_categories = get_terms('categorie');
        foreach ($photo_categories as $category) {
            echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
    </select>
    
        <!-- Format -->
        <label for="filtre-format"></label>
    <select name="filtre-format" id="filtre-format">
        <option value="ALL">FORMAT</option>
        <?php
        $photo_formats = get_terms('format');
        foreach ($photo_formats as $format) {
            echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
        }
        ?>
    </select>

    <!-- Trier par date -->
    <label for="tri-date"></label>
    <select name="tri-date" id="tri-date">
        <option value="DESC">Du plus récent au plus ancien</option>
        <option value="ASC">Du plus ancien au plus récent</option>
    </select>
</div>

<!-- Bloc de photos / reprise du template part du fichier single-photo.php-->
<div id="photo-container" >
    <?php include get_template_directory() . '/template-parts/photo-block.php'; ?>
</div>



</main>


<?php get_footer(); 
?>