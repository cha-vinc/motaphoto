          <!-- Trigger/Ouvrir Modale - Single Photo -->
          <button id="myBtn-photo">Contact</button>

<!-- Modale - Single Photo -->
<div id="myModal-photo" class="modal-photo">

    <!-- Contenu Modale - Single Photo -->
    <div class="modal-content-photo">
        <span class="close-photo">X</span>
        <img src="<?php echo esc_url(wp_get_attachment_url(119)); ?>" alt="Contact" />
        <!-- Contact Form 7 Shortcode -->
        <?php echo do_shortcode('[contact-form-7 id="b7799d6" title="Single-photo-modal-contact"]'); ?>
    </div>

</div>