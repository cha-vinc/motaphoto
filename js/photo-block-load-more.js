jQuery(document).ready(function($) {
    let page = 2;

    $('#load-more-posts').on('click', function() {
        $.ajax({
            url: ajaxurl, // Utilise la variable `ajaxurl` fournie par WordPress
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page
            },
            success: function(data) {
                $('.thumbnail-container-accueil').append(data);
                page++; // Incrémente la page

                // Cacher le bouton si plus de photos
                if (data.includes('no-more-posts')) {
                    $('#load-more-posts').hide();
                }
            },
            error: function(error) {
                console.log('Erreur AJAX :', error);
            }
        });
    });
});
