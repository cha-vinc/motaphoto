/* Fichier JS pour l'ouverture du modal de contact dans le Header' */


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("contact-button-header");
var btnsingle = document.getElementById("myBtn-photo");
var refmodal = document.getElementById("ref-photo");
var refphoto = document.getElementById("ph-reference");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "flex";
    refmodal.value = "";

}
if(btnsingle){
btnsingle.onclick = function() {
    modal.style.display = "flex";
        console.log(refphoto.innerText);
    refmodal.value = refphoto.innerText;

}
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
