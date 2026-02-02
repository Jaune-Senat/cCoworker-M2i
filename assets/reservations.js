// constantes
const BOUTONS_SUPPRIMER = Array.from(document.getElementsByClassName("btn-supprimer"));
const POPUP_SUPPRIMER_RESERVATION = document.getElementById("supprimer_reservation");
const POPUP_SUPPRIMER_RESERVATION_OUI = POPUP_SUPPRIMER_RESERVATION.getElementsByTagName("div")[0];
const POPUP_SUPPRIMER_RESERVATION_NON = POPUP_SUPPRIMER_RESERVATION.getElementsByTagName("div")[1];

let idReservation;

POPUP_SUPPRIMER_RESERVATION.style.display = "none";

BOUTONS_SUPPRIMER.forEach(bouton => {
    bouton.addEventListener("click", (e) => {
        POPUP_SUPPRIMER_RESERVATION.style.display = "block";
        idReservation = bouton.id.substring(22);
    });
});

POPUP_SUPPRIMER_RESERVATION_OUI.addEventListener("click", (e) => {
    fetch("index.php?controller=reservation&action=delete&id=" + idReservation);
    location.reload();
});

POPUP_SUPPRIMER_RESERVATION_NON.addEventListener("click", (e) => {
    POPUP_SUPPRIMER_RESERVATION.style.display = "none";
});