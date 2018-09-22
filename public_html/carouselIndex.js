/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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