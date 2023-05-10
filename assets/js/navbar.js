

document.addEventListener("DOMContentLoaded", function() {
    // votre code JavaScript ici
    const navbar = document.querySelector("nav");

window.addEventListener("scroll", function() {
  if (window.pageYOffset > 0) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});
  });