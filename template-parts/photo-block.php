<!-- Fichier PHP pour les block photos dans les fichier index.php et single-photo.php -->


<!-- Section | Miniatures Personnalisées -->
<div class="custom-post-thumbnails">
    <input type="hidden" name="page" value="1">
    <div class="thumbnail-container-accueil">
        <?php
        // Arguments | Requête pour les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',          // Type de publication personnalisée (photo) 
            'posts_per_page' => 8,          // Nombre de publications à afficher par page
            'orderby' => 'date',             // Tri des publications par date
            'order' => 'DESC',               // Ordre de tri descendant - (de la plus récente à la plus ancienne).
        );        

        $custom_posts_query = new WP_Query($args_custom_posts);

        // Boucle | Parcourir les publications personnalisées
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
        ?>
            <?php include get_template_directory() . '/template-parts/custom-photo-block.php'; ?>
        </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Rétablir les données de publication d'origine ?>
    </div>

    <div class="view-all-button">
        <button id="load-more-posts" class="load-more-button">Charger plus</button>

    </div>
    
    
</div>