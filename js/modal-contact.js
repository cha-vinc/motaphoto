/* Fichier JS pour l'ouverture du modal de contact dans le Header' */

var modal = document.getElementById('myModal'); /* Création du modal */

/* Création des boutons qui ouvrent le modal */
var btn = document.getElementById("contact-button-header"); /* Header */
var btnsingle = document.getElementById("myBtn-photo"); /* Btn page single photo */
var refmodal = document.getElementById("ref-photo"); /* Pour que ref photo soit vide dans le modal du header */
var refphoto = document.getElementById("ph-reference"); /*Pour que ref photo soit complété dans le modal de la single photo */

var span = document.getElementsByClassName("close")[0]; /*Fermeture de la modale */

/* Quand on clique sur le bouton contact du header */
btn.onclick = function() {
    modal.style.display = "flex";
    refmodal.value = ""; /*Ref photo contenu vide */

}
/*Si on clique sur le bouton contact dans la single photo */
if(btnsingle){
btnsingle.onclick = function() {
    modal.style.display = "flex";
        /*console.log(refphoto.innerText);*/
    refmodal.value = refphoto.innerText; /* Insertion de la ref photo dans la modale */

}
}

/* Quand on clique sur la X le modal se ferme */
span.onclick = function() {
    modal.style.display = "none";
}

/* Si on clique n'importe où en dehors du modal, ça se ferme */
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
