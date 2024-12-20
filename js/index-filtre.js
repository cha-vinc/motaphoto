/* Fichier JS pour les filtres de la page d'accueil */

document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filtre-tri .filtre-btn");
    const loadMoreButton = document.querySelector(".load-more-button");
    let selectedCategory = '';
    let selectedFormat = '';
    let selectedOrder = "DESC";
    let currentPage = 1;

    // Gestion des boutons de filtre
    filterButtons.forEach(button => {
        // Clic sur le bouton principal (ouvrir ou fermer le menu)
        button.addEventListener("click", function (event) {
            // Ferme tous les autres menus
            filterButtons.forEach(btn => {
                if (btn !== button) btn.classList.remove("active");
            });

            // Ouvre ou ferme le menu actuel
            button.classList.toggle("active");
            event.stopPropagation(); // Empêche la propagation
        });

        // Clic sur une option
        button.querySelectorAll(".options li").forEach(option => {
            option.addEventListener("click", function (event) {
                const filterType = button.parentElement.classList[0];
                const value = this.getAttribute("data-filter");

                // Réinitialiser les autres options
                button.querySelectorAll(".options li").forEach(opt => opt.classList.remove("selected"));

                // Pour que le filtre choisi soit de la couleur rouge lorsque qu'on ouvre le menu déroulant
                this.classList.add("selected");

                // Mettre à jour la sélection
                if (filterType === "filtre-categorie") {
                    selectedCategory = value;
                    button.querySelector(".main-option").textContent = this.textContent;
                } else if (filterType === "filtre-format") {
                    selectedFormat = value;
                    button.querySelector(".main-option").textContent = this.textContent;
                } else if (filterType === "tri-date") {
                    selectedOrder = value;
                    button.querySelector(".main-option").textContent = this.textContent;
                }

                // Fermer le menu après sélection
                button.classList.remove("active");

                // Réinitialiser la page et charger les photos filtrées
                currentPage = 1;
                loadPhotosWithFilters();
                event.stopPropagation(); // Empêche la propagation
            });
        });
    });

    // Ferme tous les menus si l'utilisateur clique en dehors
    document.addEventListener("click", function () {
        filterButtons.forEach(button => button.classList.remove("active"));
    });

    // Gestion du clic sur le bouton "load more"
    if (loadMoreButton) {
        loadMoreButton.addEventListener("click", function () {
            currentPage++;
            loadPhotosWithFilters(currentPage);
        });
    }

    function loadPhotosWithFilters(page = 1) {
        const data = {
            action: 'my_ajax_filter_search',
            category: selectedCategory,
            format: selectedFormat,
            order: selectedOrder,
            offset: (page - 1) * 8
        };

        console.log("Données envoyées à AJAX :", data);

        jQuery.post(ajaxData.ajaxurl, data, function (response) {
            if (response.success) {
                if (page === 1) {
                    jQuery(".thumbnail-container-accueil").html(response.data);
                } else {
                    jQuery(".thumbnail-container-accueil").append(response.data);
                }
            } else {
                if (page === 1) {
                    jQuery(".thumbnail-container-accueil").html('<p>Aucune photo trouvée pour les filtres sélectionnés.</p>');
                }
            }
        });
    }

    // Chargement initial des photos
    loadPhotosWithFilters();
});
