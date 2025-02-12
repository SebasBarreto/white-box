document.addEventListener("DOMContentLoaded", function() {
    // Tu código de validaciones aquí
});

// Función para validar la coincidencia de las contraseñas
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password_confirmation").value;
    
    // Si las contraseñas no coinciden, mostramos un mensaje y cambiamos el borde a rojo
    if (password !== confirmPassword) {
        document.getElementById("password_confirmation").style.borderColor = "#d9534f"; // Rojo
        document.getElementById("password_confirmation_error").style.display = "block"; // Mostrar error
        return false;
    } else {
        document.getElementById("password_confirmation").style.borderColor = "#ddd"; // Borde original
        document.getElementById("password_confirmation_error").style.display = "none"; // Ocultar error
        return true;
    }
}

// Función para validar el correo
function validateEmail() {
    var email = document.getElementById("email").value;
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Expresión regular para el formato de email

    // Si el correo no tiene un formato válido, mostramos un mensaje y cambiamos el borde a rojo
    if (!emailRegex.test(email)) {
        document.getElementById("email").style.borderColor = "#d9534f"; // Rojo
        document.getElementById("email_error").style.display = "block"; // Mostrar error
        return false;
    } else {
        document.getElementById("email").style.borderColor = "#ddd"; // Borde original
        document.getElementById("email_error").style.display = "none"; // Ocultar error
        return true;
    }
}

// Función para validar si el correo ya está registrado usando AJAX
function checkEmailExists() {
    var email = document.getElementById("email").value;

    // Realizar la petición AJAX al servidor para verificar si el correo existe
    if (email) {
        fetch('/check-email', { // Aquí debes poner la URL de tu API para verificar el correo
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                document.getElementById("email").style.borderColor = "#d9534f"; // Rojo
                document.getElementById("email_error_exists").style.display = "block"; // Mostrar error
            } else {
                document.getElementById("email").style.borderColor = "#ddd"; // Borde original
                document.getElementById("email_error_exists").style.display = "none"; // Ocultar error
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

// Asociar la función de validación con el evento 'submit' del formulario
document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Verificar si las contraseñas coinciden y si el correo es válido
    if (!validatePassword() || !validateEmail()) {
        event.preventDefault(); // Evitar que se envíe el formulario si hay un error
    }
});
