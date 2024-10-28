document.addEventListener("DOMContentLoaded", function() {
    // Sélection des flèches
    const prevArrow = document.getElementById('prev-arrow-link');
    const nextArrow = document.getElementById('next-arrow-link');
    
    // Sélection de l'emplacement où l'image de miniature sera affichée
    const thumbnailWrapper = document.querySelector('.thumbnail-wrapper');

    // Fonction pour afficher la miniature
    function showThumbnail(event, thumbnailUrl) {
        const img = document.createElement('img');
        img.src = thumbnailUrl;
        img.classList.add('thumbnail-image'); // Classe pour styliser l'image
        thumbnailWrapper.innerHTML = ''; // Réinitialiser le contenu du wrapper
        thumbnailWrapper.appendChild(img);
        thumbnailWrapper.style.opacity = '1';
    }

    // Fonction pour masquer la miniature
    function hideThumbnail() {
        thumbnailWrapper.style.opacity = '0';
        thumbnailWrapper.innerHTML = ''; // Retire l'image
    }

    // Écouteurs pour les événements de survol
    prevArrow.addEventListener('mouseover', (event) => showThumbnail(event, prevArrow.dataset.thumbnail));
    prevArrow.addEventListener('mouseout', hideThumbnail);

    nextArrow.addEventListener('mouseover', (event) => showThumbnail(event, nextArrow.dataset.thumbnail));
    nextArrow.addEventListener('mouseout', hideThumbnail);
});
