

// toggle menu

let openCloseMenu = () => {
    menu.classList.toggle('open');
    parent.classList.toggle('fixed-position');

}

const closeMenu =() => {
    menu.classList.remove('open')
    parent.classList.toggle('fixed-position');

}

const body = document.querySelector('body')
const humbrgerMune = document.querySelector('#menuToggle input');
const menu = document.querySelector('.mobile-menu')
const parent = menu.parentElement;
const container = document.querySelector('.container')
humbrgerMune.addEventListener('click', openCloseMenu)
container.addEventListener('click', closeMenu)

//  carousel navigation
const carousel = document.querySelector('.carousel');
const navigation = document.querySelector('.carousel-navigation');
const slides = carousel.querySelectorAll('img');
const navigationImages = navigation.querySelectorAll('img');

navigationImages.forEach((image, index) => {
  image.addEventListener('click', () => {
    const currentSlide = carousel.querySelector('.active');
    currentSlide.classList.remove('active');
    slides[index].classList.add('active');
    image.classList.add('active');
  });
});



// scroll top 
const backToTopButton = document.querySelector(".back-top");

backToTopButton.addEventListener("click", function() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});



document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll(".animate");
    const windowHeight = window.innerHeight;
  
    function animateSections() {
      sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        if (sectionTop < windowHeight - 100) {
          section.classList.add("animate-active");
        }
      });
    }
  
    animateSections();
  
    window.addEventListener("scroll", function() {
      animateSections();
    });
  });
  

// vedio popup
jQuery(document).ready(function() {
	jQuery('.popup-youtube').magnificPopup({
    type: 'iframe'
  });
});