/* Fichier JS pour le menu format mobile */


const openMenuButton = document.getElementById('open-menu-button');
const closeMenuButton = document.getElementById('close-menu-button-mobile');
const mobileMenu = document.querySelector('nav');
const contactButton = document.getElementById('contact-button-header');
const body = document.body;

    /* Ouverture du menu mobile au clic */
openMenuButton.addEventListener('click', () => {
    body.classList.add('mobile-menu-opened');
    mobileMenu.classList.remove('slideLeft'); 
    mobileMenu.classList.add('slideRight');
});

    /* Fermeture du menu mobile au clic */
closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('slideRight'); 
    mobileMenu.classList.add('slideLeft'); 
    
    /* Attendre la fin de l'animation avant de retirer complètement le menu */
    mobileMenu.addEventListener('animationend', () => {
        if (mobileMenu.classList.contains('slideLeft')) {
            body.classList.remove('mobile-menu-opened');
        }
    }, { once: true });
});


    /* Pour que le menu mobile se ferme automatiquement quand on clique sur Contact */
if (contactButton) {
    contactButton.addEventListener('click', () => {
        /* Fermer le menu avec les mêmes animations que pour closeMenuButton */
        mobileMenu.classList.remove('slideRight'); 
        mobileMenu.classList.add('slideLeft'); 

        /* Attendre la fin de l'animation avant de retirer complètement le menu */
        mobileMenu.addEventListener('animationend', () => {
            if (mobileMenu.classList.contains('slideLeft')) {
                body.classList.remove('mobile-menu-opened');
            }
        }, { once: true });
    });
}

