jQuery(document).ready(function($) {
    let images = []; // Tableau des images valides sur la page
    let currentIndex = 0; // Index de l'image actuelle

    function loadImages() {
        images = [];
        // Sélectionne uniquement les images valides dans la lightbox
        $('.thumbnail-wrapper').each(function() {
            const img = $(this).find('img');
            const reference = $(this).data('reference'); // Récupère la référence depuis data-reference
            const category = $(this).find('.photo-info-right p').text();

            // Vérifie que l'image a bien une source (exclut les icônes)
            if (img.attr('src')) {
                images.push({
                    src: img.attr('src'),
                    reference: reference,
                    category: category
                });
            }
        });
    }

    function openLightbox(index) {
        const image = images[index];
        if (image) {
            // Met à jour uniquement les éléments de la lightbox
            $('.middle-image').attr('src', image.src);
            $('#lightbox-reference').text(image.reference); // Affiche la référence correcte
            $('#lightbox-category').text(image.category);
            currentIndex = index; // Met à jour l'index de l'image actuelle
            $('.lightbox-container').addClass('opened'); // Affiche la lightbox
        }
    }

    // Déclenche l'ouverture de la lightbox uniquement sur les miniatures d'images
    $('.thumbnail-wrapper .lightbox-icon').click(function(e) {
        e.preventDefault();
        loadImages(); // Charge les images valides
        const imageSrc = $(this).closest('.thumbnail-wrapper').find('img').attr('src');
        currentIndex = images.findIndex(image => image.src === imageSrc); // Trouve l'index de l'image cliquée
        openLightbox(currentIndex);
    });

    $('.btn-close, .lightbox-container').click(function() {
        $('.lightbox-container').removeClass('opened');
    });

    $('.left-arrow').click(function(e) {
        e.stopPropagation();
        // Navigue vers l'image précédente
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox(currentIndex);
    });

    $('.right-arrow').click(function(e) {
        e.stopPropagation();
        // Navigue vers l'image suivante
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox(currentIndex);
    });

    
});
