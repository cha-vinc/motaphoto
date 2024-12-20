/* Fichier JS pour le thumbnail dans single-photo.php et la navigation */

document.addEventListener("DOMContentLoaded", function() {
    // Flèches de navigation et le conteneur miniature
    const prevArrow = document.getElementById('prev-arrow-link');
    const nextArrow = document.getElementById('next-arrow-link');
    const thumbnailWrapper = document.querySelector('.thumbnail-wrapper');

    // Récupèration de l'URL de la photo actuelle 
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

    // Quand on ne survole plus des flèches, réinitialisation sur la photo actuelle
    prevArrow.addEventListener('mouseout', () => showThumbnail(currentPhotoUrl));
    nextArrow.addEventListener('mouseout', () => showThumbnail(currentPhotoUrl));
});
