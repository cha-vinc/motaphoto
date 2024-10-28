jQuery(document).ready(function ($) {
    let currentPage = 1;

    $('#load-more-posts').on('click', function (e) {
        e.preventDefault(); // Empêche le rechargement de la page si le bouton est de type 'submit'
        
        currentPage++; // Incrémente le numéro de la page

        $.ajax({
            url: wp_data.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: currentPage,
            },
            success: function (response) {
                // Insérer les nouvelles photos avant le bouton "Charger plus"
                $('.thumbnail-container-accueil').append(response);

                // Si la réponse contient un message indiquant qu'il n'y a plus de photos, cacher le bouton
                if (response.includes('no-more-posts')) {
                    $('#load-more-posts').hide();
                }
            },
            error: function () {
                console.log('Erreur lors du chargement des photos.');
            }
        });
    });
});
