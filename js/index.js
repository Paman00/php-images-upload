const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get("error");
const upload = urlParams.get("upload");

const messages = {
    uploaderror: "Error al subir la imagen",
    exists: "Parece que la imagen ya existe",
    bigfile: "La imagen es demasiado grande",
    invalidtype: "Tipo de archivo no permitido",
    success: "Imagen subida con éxito",
};

const alert = document.getElementById("alert");
if (error || upload) {
    alert.innerText = messages[error || upload];
    alert.classList.add(error ? "error" : "success");
    setTimeout(() => {
        alert.classList.remove(error ? "error" : "success");
        window.history.replaceState(
            {},
            document.title,
            window.location.pathname
        );
    }, 3500);
} else {
    alert.classList.add("hidden");
}

const deleteButtons = document.querySelectorAll(".deleteButton");
deleteButtons.forEach(button => {
    button.addEventListener("click", event => {
        event.preventDefault();
        if (confirm("¿Estás seguro de que quieres eliminar la imagen?")) {
            window.location.href = button.href;
        }
    });
});
