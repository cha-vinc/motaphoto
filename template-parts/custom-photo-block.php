<div class="custom-post-thumbnail">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
        <div class="thumbnail-wrapper" data-reference="<?php echo get_field('reference'); ?>">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                <!-- Section | Overlay Catalogue -->
                <div class="thumbnail-overlay " >
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Informations sur la photo -->
                    <div class="lightbox-icon" >
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullsreen.png" alt="Icône de lightbox"> 
                    </div>
                    <?php
                    // Récupère la référence et la catégorie de l'image associée.
                    $related_reference_photo = get_field('reference_photo');   // Récupère la référence de la photo
                    $related_categories = get_the_terms(get_the_ID(), 'categorie');   // Récupère les catégories de la photo
                    $related_category_names = array();

                    if ($related_categories) {
                        foreach ($related_categories as $category) {
                            $related_category_names[] = esc_html($category->name);
                        }
                    }
                    ?>
                    <!-- Overlay | Récupère la Référence et la Catégorie de l'image associée au survol-->
                    <div class="photo-info">
                        <div class="photo-info-left">
                            <p><?php the_title(); ?></p>
                            <p><?php echo esc_html($related_reference_photo); ?></p>
                        </div>
                    <div class="photo-info-right">
                        <p><?php echo implode(', ', $related_category_names); ?></p>
                    </div>
                </div>
                               
        </div>
        <?php endif; ?>

    </a>
</div>
                    