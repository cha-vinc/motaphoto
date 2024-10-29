jQuery(document).ready(function($) {
    $('#filtre-categorie, #filtre-format, #tri-date').on('change', function() {
        loadFilteredPhotos(1); // Recharger les photos à la première page si un filtre change
    });

    function loadFilteredPhotos(page) {
        let category = $('#filtre-categorie').val();
        let format = $('#filtre-format').val();
        let order = $('#tri-date').val();

        $.ajax({
            url: wp_data.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page,
                category: category,
                format: format,
                order: order
            },
            success: function(response) {
                $('#photo-container .thumbnail-container-accueil').html(response); // Mettre à jour le conteneur avec les photos filtrées
            },
            error: function(xhr, status, error) {
                console.error('Erreur de chargement des photos:', error);
            }
        });
    }
    
});
