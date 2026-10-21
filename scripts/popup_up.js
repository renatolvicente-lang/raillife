const btnAbrir = document.getElementById("btnAbrir");
const overlay = document.getElementById("overlay");

btnAbrir.addEventListener("click", () => {
    overlay.style.display = "flex";
});

overlay.addEventListener("click", (event) => {

    if (event.target === overlay) {
        overlay.style.display = "none";
    }

});