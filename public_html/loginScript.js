var arrayUsuario = [];

function confirmarContraseña() {
    var contraseña = document.getElementById("contraseñaRegistro").value;
    var confirmacionContraseña = document.getElementById("confirmacionContraseñaRegistro").value;
    var isAccepted = true;

    if (contraseña != confirmacionContraseña) {
        isAccepted = false;
    }

    return isAccepted;
}

function validarRegistro() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var usuario = document.getElementById("usuarioRegistro").value;
    var correo = document.getElementById("correo").value;
    var contraseñaRegistro = document.getElementById("contraseñaRegistro").value;
    var confirmacionContraseñaRegistro = document.getElementById("confirmacionContraseñaRegistro").value;
    emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if(String.length(contraseñaRegistro) < 6){
        window.alert("Contraseña muy corta")
    }
    
    if (emailRegex.test(correo) == true) {
        if (nombre && apellido && usuario && correo && contraseñaRegistro && confirmacionContraseñaRegistro != null) {
            if (confirmarContraseña() == true) {
                arrayUsuario = [nombre, apellido, usuario, correo, contraseñaRegistro];
                window.alert("Usuario creado.");
            }
            else {
                window.alert("La contraseña no coincide.");
            }
        }
        else {
            window.alert("No se han completado todos los campos.");
        }
    }
    else {
        window.alert("Correo invalido.");
    }
}

function obtenerUsuario() {
    var usuarioAcceso = document.getElementById("usuarioAcceso").value;
    var contraseñaAcceso = document.getElementById("contraseñaAcceso").value;

    if (usuarioAcceso == arrayUsuario[2]) {
        if (contraseñaAcceso == arrayUsuario[4]) {
            window.alert("Bienvenido " + arrayUsuario[0]);
            // Sets the new location of the current window.
            window.location = "perfilArtista.html";

        }
        else {
            window.alert("La contraseña es incorrecta.");
        }
    }
    else {
        window.alert("No existe ese usuario.");
    }
}
