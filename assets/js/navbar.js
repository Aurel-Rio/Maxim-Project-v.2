document.addEventListener("DOMContentLoaded", function() {
  const navbar = document.querySelector("nav");

  if (window.location.pathname.includes("index.php") || window.location.pathname.includes("/pages/accueil.php"))  {
    window.addEventListener("scroll", function() {
      if (window.pageYOffset > 0) {
        navbar.classList.remove("big");
        navbar.classList.remove("no-transition");
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
        navbar.classList.remove("no-transition");
        navbar.classList.add("big");
      }
    });
  } else {
    navbar.classList.add("scrolled");
    navbar.classList.add("no-transition");
    const navbarElements = navbar.querySelectorAll("*");
    for (let i = 0; i < navbarElements.length; i++) {
      navbarElements[i].classList.add("no-transition");
    }
  }
});


/*
  document.addEventListener('keydown', function(event) {
    if (event.keyCode === 37) { // 37 correspond au code de la touche de gauche
      var fenetre = document.querySelector('.display_none');
      fenetre.style.display = 'block';
    }
  });
*/

let inputString = '';
const requiredString = 'aurelienservant';

document.addEventListener('keydown', (event) => {
  const keyPressed = event.key.toLowerCase();
  const nextChar = requiredString.charAt(inputString.length);
  if (keyPressed === nextChar) {
    inputString += keyPressed;
    if (inputString === requiredString) {
      document.getElementById('myDiv').style.display = 'block';
      document.getElementById('new_body').style.display = 'block';
      document.getElementById('myDiv').style.opacity = "1";
      document.getElementById('myDiv').style.zIndex = "9999";
      inputString = '';
    }
  }
});

document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    document.querySelector('.display_none').style.display = 'none';
    document.getElementById('new_body').style.display = 'none';
  }
});