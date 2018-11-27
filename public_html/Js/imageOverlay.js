/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function on() {
    document.getElementById("overlay").style.display = "inline-flex";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

function iconoVisible() {
    document.getElementById("iconClose").style.opacity = 1.0;
}

function iconoOculto() {
    document.getElementById("iconClose").style.opacity = 0.15;
}

function obtenerElemento(elemento) {
    var cadena = '<img src="' + elemento + '" class="img-fluid rounded">';
    document.getElementById('rolloGaleria').innerHTML = cadena;
}