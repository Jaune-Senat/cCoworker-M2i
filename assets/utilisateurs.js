// constantes
const BOUTONS_SUPPRIMER = Array.from(document.getElementsByClassName("btn-supprimer"));
const POPUP_SUPPRIMER_UTILISATEUR = document.getElementById("supprimer_utilisateur");
const POPUP_SUPPRIMER_UTILISATEUR_OUI = POPUP_SUPPRIMER_UTILISATEUR.getElementsByTagName("span")[0];
const POPUP_SUPPRIMER_UTILISATEUR_NON = POPUP_SUPPRIMER_UTILISATEUR.getElementsByTagName("span")[1];

let idUtilisateur;

POPUP_SUPPRIMER_UTILISATEUR.style.display = "none";

BOUTONS_SUPPRIMER.forEach(bouton => {
    bouton.addEventListener("click", (e) => {
        POPUP_SUPPRIMER_UTILISATEUR.style.display = "flex";
        idUtilisateur = bouton.id.substring(22);
    });
});

POPUP_SUPPRIMER_UTILISATEUR_OUI.addEventListener("click", (e) => {
    console.log(idUtilisateur)
    fetch("index.php?controller=utilisateur&action=delete&id=" + idUtilisateur);
    location.reload();
});

POPUP_SUPPRIMER_UTILISATEUR_NON.addEventListener("click", (e) => {
    POPUP_SUPPRIMER_UTILISATEUR.style.display = "none";
});