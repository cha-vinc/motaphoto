<!-- Lightbox Photo -->
<div class="lightbox-container">
    <span class="btn-close">X</span>
    <div class="lightbox-wrapper">
        <div class="left-arrow">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-prev.png" alt="Précédent">
        </div>
        <div class="lightbox-block">
            <div class="lightbox-img">
                <img src="" class="middle-image" alt="Image en plein écran">
            </div>
            <div class="info-photo">
                <span id="lightbox-reference" class="info-left"></span>
                <span id="lightbox-category" class="info-right"></span>
            </div>
        </div>
        <div class="right-arrow">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-next.png" alt="Suivant">
        </div>
    </div>
</div>


<footer>
    <nav class="footer-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer-menu', //Affiche le menu pied de page
        ]);
        ?>
        <p class="text-footer">TOUS DROITS RÉSERVÉS</p>
    </nav>
</footer>

<?php wp_footer(); ?>


</body>
</html>