/* Fichier JS pour la lightbox */

jQuery(document).ready(function($) {
    let images = []; // Tableau des images valides sur la page
    let currentIndex = 0; // Index de l'image actuelle

    function loadImages() {
        images = [];
        $('.thumbnail-wrapper').each(function() {
            const img = $(this).find('.box img');
            const reference = $(this).data('reference');
            const category = $(this).find('.photo-info-right p').text(); // Récupère la catégorie

            if (img.attr('src')) {
                images.push({
                    src: img.attr('src'),
                    reference: reference,
                    category: category
                });
            }
            console.log(images);
        });
    }

    function openLightbox(index) {
        const image = images[index];
        if (image) {
            $('.middle-image').attr('src', image.src); // Affiche l'image
            $('#lightbox-reference').text(image.reference); // Affiche la référence
            $('#lightbox-category').text(image.category); // Affiche la catégorie
            currentIndex = index;
            $('.lightbox-container').addClass('opened');
        }
    }

    // Ouvrir la lightbox au clic sur l'icône
    $(document).on('click', '.thumbnail-wrapper .lightbox-icon', function(e) {
        e.preventDefault();
        loadImages(); // Charge les images de la page
        const imageSrc = $(this).closest('.thumbnail-wrapper').find('img').attr('src');
        currentIndex = images.findIndex(image => image.src === imageSrc); // Trouve l'image actuelle
        openLightbox(currentIndex);
    });

    // Fermer la lightbox
    $('.btn-close').click(function() {
        $('.lightbox-container').removeClass('opened');
    });

    // Navigation dans la lightbox
    $('.left-arrow').click(function() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox(currentIndex);
    });

    $('.right-arrow').click(function() {
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox(currentIndex);
    });

    $('.lightbox-wrapper, .left-arrow, .right-arrow').click(function(e) {
        e.stopPropagation();
    });
});
