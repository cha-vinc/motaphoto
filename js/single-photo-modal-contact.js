/* Fichier JS pour l'ouverture du modal de contact pour single-photo.php */


if( jQuery('#myBtn-photo').length ){
    // MODAL CONTACT - SINGLE-PHOTO
    var photoModal = document.getElementById('myModal');
    var photoBtn = document.getElementById("myBtn-photo");
    var refmodal = document.getElementById("ref-photo");
    var photoSpan = document.getElementsByClassName("close-photo")[0];

    // Afficher le modal single-photo
    photoBtn.onclick = function() {
        photoModal.style.display = "flex";
        refmodal.value = acfReferencePhoto;
    }

    // Masquer le modal single-photo
    photoSpan.onclick = function() {
        photoModal.style.display = "none";
    }

    // Fermer le modal single-photo en cliquant en dehors
    window.onclick = function(event) {
        if (event.target == photoModal) {
            photoModal.style.display = "none";
        }
    }
/* Modale de contact - single photo - REF.PHOTO Pré-rempli */
    jQuery(document).ready(function($) {
        $("#myBtn-photo").on('click', function() {
            console.log('good')
            $("#ref-photo").val('azer');
            });
           
    });
    
    
}