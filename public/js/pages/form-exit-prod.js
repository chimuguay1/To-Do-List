const openForm = document.getElementById("new-form");
const openFormMovile = document.getElementById("new-form-movile");
const formProd = document.querySelector(".forms-data");
const closeForm = document.querySelector(".close-btn");
const chargeData = document.getElementById("carga");
const lectorForm = document.getElementById("lector-code");
const formEntries = document.getElementById("infoForm");
const containerForms = document.getElementById("container-forms");
const closeform = document.getElementById("close");

let mostrarForm = false;

openForm.addEventListener("click", () => {
    if (mostrarForm === false) {
        formProd.setAttribute("class", "forms-data");
        lectorForm.setAttribute("class", "info info-prod not-show");
        formEntries.setAttribute("class", "info");
        mostrarForm = true;
        console.log(mostrarForm);
    }
});

openFormMovile.addEventListener("click", () => {
    if (mostrarForm === false) {
        formProd.setAttribute("class", "forms-data");
        lectorForm.setAttribute("class", "info info-prod not-show");
        formEntries.setAttribute("class", "info");
        mostrarForm = true;
    }
});

closeForm.addEventListener("click", () => {
    formProd.setAttribute("class", "forms-data not-show");
    mostrarForm = false;
});

chargeData.addEventListener("click", () => {
    lectorForm.setAttribute("class", "info info-prod");
    formEntries.setAttribute("class", "info not-show");
});

closeform.addEventListener("click", () => {
    mostrarForm = false;
    containerForms.setAttribute("class", "forms-data not-show");
});
