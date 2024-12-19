<!-- Fichier PHP que chaque page créer via Wordpress soit généré 
avec le header et le footer -->
<?php get_header();?> <!-- Insertion du header | Inclut le fichier header.php-->
<main>
    <?php
    // Boucle WordPress pour afficher le contenu de la page
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content(); // Affiche le contenu de la page
        endwhile;
    else :
        echo '<p>Aucun contenu trouvé</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?> <!-- Insertion du footer | Inclut le fichier footer.php-->

