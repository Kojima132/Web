

let currentSlide = 0;
 

function showSlide(slideIndex) {
    let slides = document.querySelectorAll('.slide');
    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        if (index === slideIndex) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

document.addEventListener("DOMContentLoaded", function() {
    showSlide(currentSlide);
});
