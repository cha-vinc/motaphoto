<!-- Fichier PHP pour la Lightbox -->

<div class="lightbox-container">
    <span class="btn-close">X</span>
    <div class="lightbox-wrapper">
        <div class="left-arrow">
            <img class="hover-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-arrow-left.png" alt="Précédent">
            <p class="text-arrow">Précédente</p>
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
            <p class="text-arrow">Suivante</p>
            <img class="hover-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox-arrow-right.png" alt="Suivant">
        </div>
    </div>
</div>