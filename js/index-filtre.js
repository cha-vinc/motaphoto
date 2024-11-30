/* Fichier JS pour les filtres dans la page d'accueil */


document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filtre-tri .filtre-btn");
    const loadMoreButton = document.querySelector(".load-more-button");
    let selectedCategory = '';
    let selectedFormat = '';
    let selectedOrder = "DESC";
    let currentPage = 1;

    filterButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            button.classList.toggle("active");
            // Récupérer l'élément img.icon-btn associé
            const icon = button.querySelector(".icon-btn");
            if (icon) {
                icon.classList.toggle("rotated");
            }
            event.stopPropagation();
        });
    
        button.querySelectorAll(".options li").forEach(option => {
            option.addEventListener("click", function () {
                const filterType = button.parentElement.classList[0];
                const value = this.getAttribute("data-filter");
    
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
    
                // Fermez le menu après la sélection
                button.classList.remove("active");
    
                // Réinitialiser la page et charger les photos filtrées
                currentPage = 1;
                loadPhotosWithFilters();
            });
        });
    });
    

    // Gestion du clic sur le bouton "load more"
    loadMoreButton.addEventListener("click", function () {
        currentPage++;
        loadPhotosWithFilters(currentPage);
    });

    

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

// Ajout de l'écouteur d'événements sur les options du filtre
document.querySelectorAll('.filtre-tri .options li').forEach(option => {
    option.addEventListener('click', () => {
        // Supprime la classe "selected" de toutes les options
        document.querySelectorAll('.filtre-tri .options li').forEach(item => {
            item.classList.remove('selected');
        });

        // Ajoute la classe "selected" à l'option cliquée
        option.classList.add('selected');
    });
});
