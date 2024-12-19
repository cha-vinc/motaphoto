<!-- Fichier PHP pour la lightbox et le footer -->

<?php include get_template_directory() . '/template-parts/modale-contact.php'; ?>

<?php include get_template_directory() . '/template-parts/lightbox.php';?>

<!-- Footer -->

<footer>
    <nav class="footer-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer-menu', //Affiche le menu pied de page
        ]);
        ?>
        <p class="text-footer">Tous droits réservés</p>
    </nav>
</footer>

<?php wp_footer(); ?>


</body>
</html>