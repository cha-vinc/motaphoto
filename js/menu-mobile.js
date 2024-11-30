/* Fichier JS pour le menu format mobile */


const openMenuButton = document.getElementById('open-menu-button');
const closeMenuButton = document.getElementById('close-menu-button-mobile');
const mobileMenu = document.querySelector('nav');
const body = document.body;

openMenuButton.addEventListener('click', () => {
    body.classList.add('mobile-menu-opened');
    mobileMenu.classList.remove('slideLeft'); 
    mobileMenu.classList.add('slideRight');
});

closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('slideRight'); // Enlever l'animation d'ouverture
    mobileMenu.classList.add('slideLeft'); // Ajouter l'animation de fermeture
    
    // Attendre la fin de l'animation avant de retirer complètement le menu
    mobileMenu.addEventListener('animationend', () => {
        if (mobileMenu.classList.contains('slideLeft')) {
            body.classList.remove('mobile-menu-opened');
        }
    }, { once: true });
});
