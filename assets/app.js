// constantes
const BOUTONS_SUPPRIMER = Array.from(document.getElementsByClassName("btn-supprimer"));
const POPUP_SUPPRIMER_ESPACE = document.getElementById("supprimer_espace");
const POPUP_SUPPRIMER_ESPACE_TITRE = POPUP_SUPPRIMER_ESPACE.getElementsByTagName("h2")[0];
const POPUP_SUPPRIMER_ESPACE_OUI = POPUP_SUPPRIMER_ESPACE.getElementsByTagName("div")[0];
const POPUP_SUPPRIMER_ESPACE_NON = POPUP_SUPPRIMER_ESPACE.getElementsByTagName("div")[1];

let idEspace;

POPUP_SUPPRIMER_ESPACE.style.display = "none";

BOUTONS_SUPPRIMER.forEach(bouton => {
    bouton.addEventListener("click", (e) => {
        POPUP_SUPPRIMER_ESPACE.style.display = "block";
        POPUP_SUPPRIMER_ESPACE_TITRE.innerText = "Supprimer l'espace numéro " + bouton.id.substring(17) + " ?";
        idEspace = bouton.id.substring(17);
    });
});

POPUP_SUPPRIMER_ESPACE_OUI.addEventListener("click", (e) => {
    fetch("index.php?controller=espace&action=delete&id=" + idEspace);
    location.reload();
});

POPUP_SUPPRIMER_ESPACE_NON.addEventListener("click", (e) => {
    POPUP_SUPPRIMER_ESPACE.style.display = "none";
});