document.getElementById("subirImagenBtn").addEventListener("click", function() {
    const inputImagenProducto = document.getElementById("inputImagenProductoBtn");
    const imagenContainer = document.getElementById("imagenContainer");

    const file = inputImagenProducto.files[0]; // Obtén el archivo seleccionado

    if (file && file.type.startsWith("image/")) {
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.classList.add("ImagenProductos");
        img.alt = file.name;

        // Crea un div para contener cada imagen y agrega la imagen al div
        const imgDiv = document.createElement("div");
        imgDiv.appendChild(img);

        // Agrega un controlador de eventos 'click' a la imagen para eliminarla
        img.addEventListener("click", function() {
            imagenContainer.removeChild(imgDiv);
        });

        // Verifica si ya hay tres imágenes mostradas y elimina la primera si es necesario
        if (imagenContainer.children.length >= 3) {
            imagenContainer.removeChild(imagenContainer.firstElementChild);
        }

        // Agrega el nuevo div con la imagen al contenedor
        imagenContainer.appendChild(imgDiv);
    } else {
        // Maneja el caso en que no se selecciona un archivo de imagen válido
        alert("Por favor, seleccione una imagen válida.");
    }

    // Limpia el valor del input para permitir la selección de otra imagen
    inputImagenProducto.value = "";
});


// previsualizarVideo.js

document.addEventListener("DOMContentLoaded", function() {
    const videoSubido = document.getElementById("videoSubido");
    const videoPreview = document.getElementById("videoPreview");

    videoSubido.addEventListener("change", function() {
        const file = this.files[0];

        if (file && file.type.startsWith("video/")) {
            // Habilitar la previsualización del video
            videoPreview.style.display = "block";
            videoPreview.src = URL.createObjectURL(file);
        } else {
            alert("Por favor, seleccione un archivo de video válido.");
        }
    });
});

