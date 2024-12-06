<!-- Fichier PHP pour la lightbox et le footer -->


<!-- Lightbox Photo -->
<div class="lightbox-container">
    <span class="btn-close">X</span>
    <div class="lightbox-wrapper">
        <div class="left-arrow">
            <img class="hover-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-prev.png" alt="Précédent">
        </div>
        <div class="lightbox-block">
            <div class="lightbox-img">
                <img src="" class="middle-image" alt="Image en plein écran">
            </div>
            <div class="info-photo">
                <span id="lightbox-reference" class="info-left"></span>
                <span id="lightbox-category" class="info-right"></span> <!-- Affiche la catégorie -->
            </div>
        </div>
        <div class="right-arrow">
            <img class="hover-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-next.png" alt="Suivant">
        </div>
    </div>
</div>


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