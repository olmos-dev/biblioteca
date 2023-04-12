document.addEventListener("DOMContentLoaded", (event) => {
    const portada = document.getElementById('portada');
    portada.addEventListener("change", (event) => {
        toastr.info('la portada del libro se ha subido', 'Carga');
    });
});