var idImage = 0;
var maxIdValue = 0;

function chargeComments(idComment) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("area-comentarios").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "Controller/commentInicioController.php?id=" + idComment + "&p=" + Math.random(), true);
    xhttp.send();
}

function getIdImage() {
    return idImage;
}

function setNumMaxIdImage(numMax) {
    maxIdValue = numMax;
}

function setIdImage(newValue) {
    if (newValue < 0) {
        idImage = maxIdValue;
    } else if (newValue > maxIdValue) {
        idImage = 0;
    } else {
        idImage = newValue;
    }
}

function agregarComentario(usuario, imageID) {

    /*Iniciamos conexion con el servidor*/
    var nuevoComentario = document.getElementById('commentBox').value;
    if (nuevoComentario != "") {
        //--------------------------------------------------------------------------------------------------------
        if (isSessionInit(usuario)) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('area-comentarios').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "Controller/commentInicioController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('user=' + usuario + '&' + 'imageID=' + imageID + '&' + 'comment=' + nuevoComentario);
            document.getElementById('commentBox').value = "";
            window.alert('El comentario se cargó exitosamente!');
            chargeComments(idImage);
        }
        //--------------------------------------------------------------------------------------------------------
    } else {
        window.alert("El comentario no puede estar vacio");
    }
}

function isSessionInit(usuario) {
    if (usuario == "") {
        var statusConfirm = confirm("Necesitas una cuenta para realizar esto,\n" +
                "¿te gustaría crear una ahora mismo?");
        if (statusConfirm)
        {
            window.location = 'Index.php'
        }
        return false;
    } else {
        return true;
    }
}