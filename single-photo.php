<!-- Fichier PHP pour les pages photos -->

<!-- Insertion du header | Inclut le fichier header.php-->
<?php 
get_header(); ?>

<main id="main" class="content-area">
    <section class ="contenu-principal">
    <div class="zone-contenu mobile-first">

        <!-- Informations de la Photo - Gauche-->
        <div class="left-container">
            <div class="left-contenu">
                <h1><?php the_title(); ?></h1>
                <?php
                // Référence de la photo
                // Récupère la valeur du champ personnalisé 'reference_photo' et l'affiche s'il existe.
                $reference_photo = get_field('reference');
                if ($reference_photo) {
                    echo '<p>Référence : <span id="ph-reference">' . esc_html($reference_photo) . '</span></p>';
                }

                // Catégories de la photo
                // Récupère les catégories associées à la photo actuelle.
                $categories = get_the_terms(get_the_ID(), 'categorie');
                $current_category_slugs = array(); // Initialise un tableau vide pour les slugs de catégorie.

                if ($categories) {
                    // Parcourir les catégories et stocker leurs slugs dans le tableau.
                    foreach ($categories as $category) {
                        $current_category_slugs[] = $category->slug;
                    }
                }

                if ($categories) {
                    // Si des catégories existent, les afficher.
                    echo '<p>Catégorie : <span id="ph-category">';
                    $category_names = array();
                    foreach ($categories as $category) {
                        $category_names[] = esc_html($category->name);
                    }
                    echo implode(', ', $category_names); // Utiliser implode pour joindre les noms de catégorie par une virgule.
                    echo '</span></p>';
                }

                // Format de la photo
                // Récupère les termes de format associés à la photo actuelle.
                $format_terms = get_the_terms(get_the_ID(), 'format');
                if ($format_terms) {
                    // Si des termes de format existent, les afficher.
                    echo '<p>Format : ';
                    $format_names = array();
                    foreach ($format_terms as $format_term) {
                        $format_names[] = esc_html($format_term->name);
                    }
                    echo implode(', ', $format_names); // Utiliser implode pour joindre les noms de format par une virgule.
                    echo '</p>';
                }

                // Type de la photo
                // Récupère la valeur du champ personnalisé 'type_de_photo' et l'affiche s'il existe.
                $type_de_photo = get_field('type');
                if ($type_de_photo) {
                    echo '<p>Type : ' . esc_html($type_de_photo) . '</p>';
                }

                 // L'année de capture
                // Récupère l'année de capture et l'affiche si elle existe.
                $date_capture = get_the_date('Y');
                if ($date_capture) {
                    echo '<p>Année : ' . esc_html($date_capture) . '</p>';
                }
                ?>
            </div>
        </div>
        <!-- Informations de la Photo - Droit -->
        <div class="right-container">
            <div class="photo">
                <?php if (has_post_thumbnail()) : ?>
                     <?php the_post_thumbnail('large'); ?>
            <?php endif; ?> 
            </div>
        </div>
    </div>

     <!-- Bouton de contact + Navigation Photos -->
     <div class="zone-contact">
        <!-- Bouton de Contact -->
        <div class="left-contact">
            <div class="texte-contact">
                <p>Cette photo vous intéresse ?</p>
            </div>
            <div class="bouton-contact">
                <?php include get_template_directory() . '/template-parts/contact-single-photo.php'; ?>
                <?php
                // Récupère la valeur du champ personnalisé 'reference_photo' et la définit comme une variable JavaScript.
                $reference_photo = get_field('reference');
                if ($reference_photo) {
                    echo '<script type="text/javascript">';
                    echo 'var acfReferencePhoto = "' . esc_js($reference_photo) . '";';
                    echo '</script>';
                }
                ?>
            </div>
        </div>

        <!-- Navigation photos - Fleches & Miniature -->
        <div class="right-contact">
        <?php
            // Récupère l'ID de la publication actuelle.
            $current_post_id = get_the_ID();

            // Récupère toutes les publications de type 'photo'.
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );
            $all_photo_posts = get_posts($args);

            // Trouve l'index de la publication actuelle dans le tableau de toutes les publications de photos.
            $current_post_index = array_search($current_post_id, array_column($all_photo_posts, 'ID'));

            // Calcule les index des publications précédentes et suivantes.
            $prev_post_index = $current_post_index - 1;
            $next_post_index = $current_post_index + 1;

            // Récupère les publications précédentes et suivantes.
            $prev_post = ($prev_post_index >= 0) ? $all_photo_posts[$prev_post_index] : end($all_photo_posts);
            $next_post = ($next_post_index < count($all_photo_posts)) ? $all_photo_posts[$next_post_index] : reset($all_photo_posts);

            $prev_permalink = get_permalink($prev_post);
            $next_permalink = get_permalink($next_post);

            // Récupère les miniatures des publications précédentes et suivantes.

            $prev_thumbnail = get_the_post_thumbnail_url($prev_post, 'thumbnail');
            $next_thumbnail = get_the_post_thumbnail_url($next_post, 'thumbnail');
            ?>
            <!-- Miniatures individuelles -->
            <div class="thumbnail-container">
                <div class="thumbnail-wrapper">
                    
                </div>
                <a href="<?php echo esc_url($prev_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($prev_post, 'thumbnail')); ?>" id="prev-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche.png" alt="Précédent" class="arrow-img-gauche" id="prev-arrow" />
                </a>
                <a href="<?php echo esc_url($next_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($next_post, 'thumbnail')); ?>" id="next-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite.png" alt="Suivant" class="arrow-img-droite" id="next-arrow" />
                </a>
            </div>
                </div>
            </div>
        </div>
    </div>
    </section>        
    <!-- Section Photos Apparentées -->
    <div class="related-images">
        <h3>VOUS AIMEREZ AUSSI</h3>
        <div class="image-container">
        <?php
            // Récupère deux photos aléatoires de la même catégorie que la photo actuelle.
            $args_related_photos = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post__not_in' => array(get_the_ID()), // Exclut la photo actuelle
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $current_category_slugs, // Utilise le slug de la catégorie de la photo actuelle
                    ),
                ),
            );

            $related_photos_query = new WP_Query($args_related_photos);

            while ($related_photos_query->have_posts()) :
                $related_photos_query->the_post();
            ?>
            <?php include get_template_directory() . '/template-parts/custom-photo-block.php'; ?>
        </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); // Restaure les données originales des publications ?>
    </div>

</main>

<!-- Insertion du footer | Inclut le fichier footer.php-->
<?php get_footer();?>