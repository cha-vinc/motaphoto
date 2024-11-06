document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filtre-tri .filtre-btn");
    let selectedCategory = '';
    let selectedFormat = '';
    let selectedOrder = "DESC"; // Par défaut

    filterButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            button.classList.toggle("active");
            event.stopPropagation();
        });

        button.querySelectorAll(".options li").forEach(option => {
            option.addEventListener("click", function () {
                const filterType = button.parentElement.classList[0];
            
                const value = this.getAttribute("data-filter");

                // Mettre à jour la sélection
                if (filterType === "filtre-categorie") {
                    selectedCategory = value;
                    button.textContent = this.textContent;
                } else if (filterType === "filtre-format") {
                    selectedFormat = value;
                    button.textContent = this.textContent;
                } else if (filterType === "tri-date") {
                    selectedOrder = value;
                    button.textContent = this.textContent;
                }

                // Charger les photos filtrées
                loadPhotosWithFilters();
            });
        });
    });

    function loadPhotosWithFilters(page = 1) {
        const data = {
            action: 'my_ajax_filter_search',
            category: selectedCategory,
            format: selectedFormat,
            order: selectedOrder,
            offset: (page - 1) * 8
        };
    
        console.log("Données envoyées à AJAX :", data); // Ajoutez cette ligne pour déboguer
    
        jQuery.post(ajaxurl, data, function (response) {
            if (response.success) {
                if (page === 1) {
                    jQuery(".thumbnail-container-accueil").html(response.data);
                } else {
                    jQuery(".thumbnail-container-accueil").append(response.data);
                }
            } else {
                jQuery(".thumbnail-container-accueil").html('<p>Aucune photo trouvée.</p>');
            }
        });
    }
});    