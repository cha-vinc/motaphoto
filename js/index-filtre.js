jQuery(document).ready(function($) {
    let currentPage = 1;

    // Fonction de chargement et de filtrage
    $('#filtre-categorie, #filtre-format, #tri-date').on('change', function() {
        currentPage = 1; // Réinitialiser la page à 1 lors du changement de filtre
        loadFilteredPhotos(currentPage, true); // Charger les photos filtrées en remplaçant le contenu existant
    });

    // Bouton "charger plus" pour charger la page suivante
    $('#load-more-posts').on('click', function() {
        currentPage++; // Incrémenter le numéro de page
        loadFilteredPhotos(currentPage, false); // Charger plus de photos sans remplacer le contenu existant
    });

    function loadFilteredPhotos(page, replaceContent) {
        // Récupérer les valeurs des filtres
        let category = $('#filtre-categorie').val();
        let format = $('#filtre-format').val();
        let order = $('#tri-date').val();

        // Exécuter la requête AJAX
        $.ajax({
            url: wp_data.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos', // Action pour l’appel serveur
                page: page,                 // Page courante
                category: category,         // Filtre de catégorie
                format: format,             // Filtre de format
                order: order                // Ordre de tri
            },
            success: function(response) {
                if (replaceContent) {
                    // Remplace le contenu si c'est un nouveau filtrage
                    $('#photo-container .thumbnail-container-accueil').html(response);
                } else {
                    // Ajoute le contenu pour un chargement supplémentaire
                    $('#photo-container .thumbnail-container-accueil').append(response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur de chargement des photos:', error);
            }
        });
    }
});
