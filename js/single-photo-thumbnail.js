/* Fichier JS pour le thumbnail dans single-photo.php et la navigation */


document.addEventListener("DOMContentLoaded", function() {
    // Sélection des flèches de navigation et du conteneur de miniature
    const prevArrow = document.getElementById('prev-arrow-link');
    const nextArrow = document.getElementById('next-arrow-link');
    const thumbnailWrapper = document.querySelector('.thumbnail-wrapper');

    // Récupère l'URL de la photo actuelle de la page
    const currentPhotoUrl = document.querySelector('.right-container .photo img').src;

    // Fonction pour afficher une miniature donnée
    function showThumbnail(url) {
        const img = document.createElement('img');
        img.src = url;
        img.classList.add('thumbnail-image'); // Classe pour styliser l'image
        thumbnailWrapper.innerHTML = ''; // Réinitialise le contenu du wrapper
        thumbnailWrapper.appendChild(img);
        thumbnailWrapper.style.opacity = '1';
    }

    // Affiche la photo actuelle par défaut
    showThumbnail(currentPhotoUrl);

    // Événements de survol pour afficher les miniatures de la photo précédente ou suivante
    prevArrow.addEventListener('mouseover', () => showThumbnail(prevArrow.dataset.thumbnail));
    nextArrow.addEventListener('mouseover', () => showThumbnail(nextArrow.dataset.thumbnail));

    // Lorsque le survol des flèches cesse, réinitialise avec la photo actuelle
    prevArrow.addEventListener('mouseout', () => showThumbnail(currentPhotoUrl));
    nextArrow.addEventListener('mouseout', () => showThumbnail(currentPhotoUrl));
});
