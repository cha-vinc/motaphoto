document.addEventListener('DOMContentLoaded', function() {
    let page = 2; // La page commence à 2 car la première est déjà chargée

    document.getElementById('load-more-posts').addEventListener('click', function() {
        // Envoie une requête AJAX
        fetch(ajaxurl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'load_more_photos',
                page: page
            })
        })
        .then(response => response.text())
        .then(data => {
            const container = document.querySelector('.thumbnail-container-accueil');
            container.insertAdjacentHTML('beforeend', data);
            page++; // Incrémente la page

            // Cache le bouton si plus de photos disponibles
            if (data.includes('no-more-posts')) {
                document.getElementById('load-more-posts').style.display = 'none';
            }
        })
        .catch(error => console.error('Erreur : ', error));
    });
});
