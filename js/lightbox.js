jQuery(document).ready(function($) {
    let images = []; // Tableau des images valides sur la page
    let currentIndex = 0; // Index de l'image actuelle

    function loadImages() {
        images = [];
        $('.thumbnail-wrapper').each(function() {
            const img = $(this).find('img');
            const reference = $(this).data('reference'); // Récupère la référence depuis data-reference
            const category = $(this).find('.photo-info-right p').text();

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
            $('.middle-image').attr('src', image.src);
            $('#lightbox-reference').text(image.reference);
            $('#lightbox-category').text(image.category);
            currentIndex = index;
            $('.lightbox-container').addClass('opened');
        }
    }

    $('.thumbnail-wrapper .lightbox-icon').click(function(e) {
        e.preventDefault();
        loadImages();
        const imageSrc = $(this).closest('.thumbnail-wrapper').find('img').attr('src');
        currentIndex = images.findIndex(image => image.src === imageSrc);
        openLightbox(currentIndex);
    });

    $('.btn-close').click(function() {
        $('.lightbox-container').removeClass('opened');
    });

    $('.lightbox-wrapper, .left-arrow, .right-arrow').click(function(e) {
        e.stopPropagation();
    });

    $('.left-arrow').click(function() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox(currentIndex);
    });

    $('.right-arrow').click(function() {
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox(currentIndex);
    });
});
