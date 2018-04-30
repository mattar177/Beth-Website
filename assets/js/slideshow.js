"Use Strict";

let slideIndex = 0;
slideshow();

function slideshow() {
    let i;
    let x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}    
    x[slideIndex-1].style.display = "block";  
    setTimeout(slideshow, 6000);    
}