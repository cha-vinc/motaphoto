<button id="contact-button-header">CONTACT</button>

<div id="myModal" class="modal">
    <!-- Modal Content -->
    <div class="modal-content">
        <span class="close">X</span>
        <img src="<?php echo esc_url(wp_get_attachment_url(34)); ?>" alt="Contact" />
        <!-- Contact Form 7 Shortcode -->
        <?php echo do_shortcode('[contact-form-7 id="1e753f4" title="Header-modal-contact"]'); ?>
    </div>
</div>