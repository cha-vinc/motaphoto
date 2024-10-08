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