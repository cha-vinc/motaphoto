document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filtre-tri .filtre-btn");
    let selectedCategories = [];
    let selectedFormats = [];
    let selectedOrder = "DESC"; // Par défaut

    filterButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            // Basculer l'affichage du menu actuel
            button.classList.toggle("active");
            event.stopPropagation();
        });

        button.querySelectorAll(".options li").forEach(option => {
            option.addEventListener("click", function () {
                const filterType = button.parentElement.classList[0]; // Détecter le type de filtre
                const value = this.getAttribute("data-filter");

                // Stocker la sélection selon le type de filtre
                if (filterType === "filtre-categorie") {
                    selectedCategories = [value]; // Remplacer la catégorie sélectionnée
                    button.querySelector(".main-option").textContent = this.textContent;
                } else if (filterType === "filtre-format") {
                    selectedFormats = [value];
                    button.querySelector(".main-option").textContent = this.textContent;
                } else if (filterType === "tri-date") {
                    selectedOrder = value;
                    button.querySelector(".main-option").textContent = this.textContent;
                }

                // Recharger les photos avec les filtres mis à jour
                loadPhotosWithFilters();
            });
        });
    });

    function loadPhotosWithFilters(page = 1) {
        const data = {
            action: 'load_more_photos',
            page: page,
            category: selectedCategories[0] || '', // Envoyer la catégorie sélectionnée
            format: selectedFormats[0] || '',      // Envoyer le format sélectionné
            order: selectedOrder                   // Envoyer l'ordre
        };

        // Requête AJAX
        jQuery.post(ajaxurl, data, function (response) {
            if (page === 1) {
                jQuery(".thumbnail-container-accueil").html(response);
            } else {
                jQuery(".thumbnail-container-accueil").append(response);
            }
        });
    }

    // Gestion du bouton "Charger plus"
    document.getElementById("load-more-posts").addEventListener("click", function () {
        const currentPage = parseInt(document.querySelector("input[name='page']").value);
        loadPhotosWithFilters(currentPage + 1);
        document.querySelector("input[name='page']").value = currentPage + 1;
    });
});
