<!-- Fichier PHP pour le modal de contact dans les
 fichier header.php & single-photo.php -->

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">X</span>
        <img src="<?php echo esc_url(wp_get_attachment_url(119)); ?>" alt="Contact" />
        <?php echo do_shortcode('[contact-form-7 id="b7799d6" title="Single-photo-modal-contact"]'); ?>
    </div>
</div>