const openMenuButton = document.getElementById('open-menu-button');
const closeMenuButton = document.getElementById('close-menu-button');
const body = document.body;

openMenuButton.addEventListener('click', () => {
    body.classList.add('mobile-menu-opened');
});

closeMenuButton.addEventListener('click', () => {
    body.classList.remove('mobile-menu-opened');
});
