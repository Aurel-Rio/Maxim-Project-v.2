window.onload = function() {
  // votre code JavaScript ici
  const navbar = document.querySelector("nav");
  
  if (window.location.pathname.includes("pages/accueil.php")) { // Vérifie si la page actuelle est la page d'accueil
    window.addEventListener("scroll", function() {
      const navbar = document.querySelector("nav");
      if (window.scrollY > 0) {
        navbar.classList.remove("big");
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
        navbar.classList.add("big");
      }
    });
  }
};




/*
window.addEventListener("scroll", function() {
  const navbar = document.querySelector("nav");
  if (window.scrollY > 0) {
    navbar.classList.remove("big");
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
    navbar.classList.add("big");
  }
});
*/