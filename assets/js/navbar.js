document.addEventListener("DOMContentLoaded", function() {
  // Sélection de la navbar
  const navbar = document.querySelector("nav");

  // Vérification de la condition pour appliquer la classe 'big'
  if (window.location.pathname.includes("index.php") || window.location.pathname.includes("/pages/accueil.php"))  {
    // Ajout d'un écouteur d'événement de scroll à la fenêtre
    window.addEventListener("scroll", function() {
      // Vérification du défilement de la page
      if (window.pageYOffset > 0) {
        // Si la page est défilée, supprimer la classe 'big' et ajouter la classe 'scrolled' à la navbar
        navbar.classList.remove("big");
        navbar.classList.remove("no-transition");
        navbar.classList.add("scrolled");
      } else {
        // Si la page est en haut, supprimer la classe 'scrolled' et ajouter la classe 'big' à la navbar
        navbar.classList.remove("scrolled");
        navbar.classList.remove("no-transition");
        navbar.classList.add("big");
      }
    });
  } else {
    // Pour les autres pages que 'index.php' et '/pages/accueil.php'
    // Ajouter la classe 'scrolled' et 'no-transition' à la navbar
    navbar.classList.add("scrolled");
    navbar.classList.add("no-transition");
    // Sélection de tous les éléments de la navbar
    const navbarElements = navbar.querySelectorAll("*");
    // Ajout de la classe 'no-transition' à tous les éléments de la navbar
    for (let i = 0; i < navbarElements.length; i++) {
      navbarElements[i].classList.add("no-transition");
    }
  }
});

// Vérification de la séquence de touches pour afficher le contenu caché
let inputString = '';
const requiredString = 'aurelienservant';

document.addEventListener('keydown', (event) => {
  const keyPressed = event.key.toLowerCase();
  const nextChar = requiredString.charAt(inputString.length);
  if (keyPressed === nextChar) {
    inputString += keyPressed;
    if (inputString === requiredString) {
      // Affichage du contenu caché lorsque la séquence de touches est correcte
      document.getElementById('myDiv').style.display = 'block';
      document.getElementById('new_body').style.display = 'block';
      document.getElementById('myDiv').style.opacity = "1";
      document.getElementById('myDiv').style.zIndex = "9999";
      inputString = '';
    }
  }
});

// Gestion de la touche Escape pour masquer le contenu caché
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    // Masquage du contenu caché lorsque la touche Escape est enfoncée
    document.querySelector('.display_none').style.display = 'none';
    document.getElementById('new_body').style.display = 'none';
  }
});

function toggleMenu () {  
  const navbar = document.querySelector('nav');
  const burger = document.querySelector('.burger');
  
  burger.addEventListener('click', (e) => {    
    navbar.classList.toggle('show-nav');
  });    
  // bonus
  const navbarLinks = document.querySelectorAll('.navbar a');
  navbarLinks.forEach(link => {
    link.addEventListener('click', (e) => {    
      navbar.classList.toggle('show-nav');
    }); 
  })
   
}
toggleMenu();