
function searchTextOf(idElement) {
    if (((document.all) ? event.keyCode : event.which) === 13) {
        var cadenaABuscar = document.getElementById(idElement).value;
        console.log(cadenaABuscar);
        open('searchResults.html', '_parent', 'false', '', cadenaABuscar);
    }
}

function editName() {
    var nombre = document.getElementById('nombreUsuario');
    var nuevoNombre = document.getElementById('edit-name-textBox');

    if (nuevoNombre == null) {
        nombre.innerHTML = "<input type= \"text\" id=\"edit-name-textBox\"><a class=\"button-edit\" id=\"change-name-btn\" onclick=\"editName()\">Listo</a>";
    } else{
        nuevoNombre = nuevoNombre.value;
        nombre.innerHTML = nuevoNombre + "<a class=\"button-edit\" id=\"change-name-btn\" onclick=\"editName()\">Editar</a>";
    }
}

function editInfo(){
    var c_nombre = document.getElementById('description-pane');
    var cadena = document.getElementById('edit-description-textBox');

    if (cadena == null) {
        c_nombre.innerHTML = "<input type= \"text\" id=\"edit-description-textBox\"><a class=\"button-edit\" id=\"edit-description-button\" onclick=\"editInfo()\">Listo</a>";
    } else{
        cadena = cadena.value;
        c_nombre.innerHTML = cadena; //+ "<a class=\"button-edit\" id=\"edit-description-button\" onclick=\"editInfo()\">Editar</a>";
    }
}

var slideIndex = 1;
showSlides(slideIndex);

// control para los botones siguiente/anterior
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// mostrar imágenes
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    
    if(n > slides.length) {
        slideIndex = 1;
    }
    
    if(n < 1) {
        slideIndex = slides.length;
    }
    
    for(i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }
    
    slides[slideIndex - 1].style.display = "block";
    
}