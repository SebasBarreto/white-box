// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

function increaseQuantity() {
    let input = document.getElementById("quantity");
    if (parseInt(input.value) < parseInt(input.max)) {
        input.value = parseInt(input.value) + 1;
    }
}

function decreaseQuantity() {
    let input = document.getElementById("quantity");
    if (parseInt(input.value) > parseInt(input.min)) {
        input.value = parseInt(input.value) - 1;
    }
}

function changeImage(selectedImg) {
    const mainImg = document.getElementById('mainImg');
    mainImg.src = selectedImg.src; // Cambia la imagen principal
}

document.addEventListener('DOMContentLoaded', () => {
    const mainImg = document.getElementById('mainImg');
    const zoomPreview = document.getElementById('zoomPreview');

    mainImg.addEventListener('mousemove', (e) => {
        const rect = mainImg.getBoundingClientRect();
        const zoomPreviewRect = zoomPreview.getBoundingClientRect();
        const viewportWidth = window.innerWidth;
    
        // Ajustar posición si el cuadro se sale del viewport
        if (rect.right + zoomPreviewRect.width > viewportWidth) {
            zoomPreview.style.left = 'auto';
            zoomPreview.style.right = '100%'; // Posicionar a la izquierda de la imagen principal
        } else {
            zoomPreview.style.left = '100%'; // Asegura que se muestre a la derecha
            zoomPreview.style.right = 'auto';
        }
    
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
    
        zoomPreview.style.backgroundImage = `url(${mainImg.src})`;
        zoomPreview.style.backgroundPosition = `${x}% ${y}%`;
    });
    
    

    mainImg.addEventListener('mouseleave', () => {
        zoomPreview.style.backgroundImage = 'none'; // Oculta el zoom al salir
    });
});


function toggleContent() {
    const content = document.getElementById('descripcion-content');
    const button = document.querySelector('.toggle-btn');

    if (content.style.maxHeight === '1000px' || content.style.maxHeight === '') {
        content.style.maxHeight = 'none'; // Expandir contenido
        button.textContent = 'Leer menos';
    } else {
        content.style.maxHeight = '150px'; // Contraer contenido
        button.textContent = 'Leer más';
    }
}


    // Almacena los atributos seleccionados
    const atributosSeleccionados = {};

    // Función para manejar la selección de un atributo
    function selectAtributo(nombre, valor, boton) {
        // Marcar el botón como seleccionado y desmarcar otros del mismo grupo
        const botones = boton.parentNode.querySelectorAll('.atributo-boton');
        botones.forEach((btn) => btn.classList.remove('seleccionado'));
        boton.classList.add('seleccionado');
        if (button.disabled) return;

        const grupo = document.querySelectorAll(`.atributo-boton[data-group="${nombre}"]`);
            grupo.forEach(boton => boton.classList.remove('seleccionado'));

            // Agregar clase al botón seleccionado
            button.classList.add('seleccionado');


        // Guardar el valor seleccionado para el atributo
        atributosSeleccionados[nombre] = valor;

        // Confirmar selección en consola (puedes enviarlo al servidor después)
        console.log('Atributos seleccionados:', atributosSeleccionados);
    }
    document.querySelectorAll('.color-boton').forEach(button => {
        const color = button.getAttribute('data-color');
        if (color) {
            button.style.backgroundColor = color;
            // Opcional: Ajusta el color del texto si el fondo es oscuro
            if (['negro'].includes(color)) {
                button.style.color = 'white';
            } else {
                button.style.color = 'black';
            }
        }
    });
    

    function toggleFavorito(productId, button) {
        // Cambia el estado activo del botón
        const isActive = button.getAttribute('data-active') === 'true';
        button.setAttribute('data-active', !isActive);
    
        // Aquí envías la actualización al servidor si es necesario
        // Ejemplo: hacer un request con Fetch API
    }
    
    // Referencias a los elementos
const toggleButton = document.querySelector('.search-toggle');
const inputField = document.querySelector('.input-field');
const searchForm = document.querySelector('.search-form');

// Función para manejar el clic en el botón
toggleButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Evita que el clic cierre el input cuando se hace clic en el botón
    if (inputField.classList.contains('collapsed')) {
        // Expande el campo de búsqueda
        inputField.classList.remove('collapsed');
        inputField.classList.add('expanded');
    } else {
        // Si ya está expandido, envía el formulario
        if (searchForm.querySelector('.search-input').value.trim() !== '') {
            searchForm.submit();
        }
    }
});

// Función para manejar el clic fuera del campo de búsqueda
document.addEventListener('click', (event) => {
    // Verifica si el clic fue fuera del inputField
    if (!inputField.contains(event.target) && inputField.classList.contains('expanded')) {
        // Colapsa el campo de búsqueda
        inputField.classList.remove('expanded');
        inputField.classList.add('collapsed');
    }
});




getYear();

// owl carousel 

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})