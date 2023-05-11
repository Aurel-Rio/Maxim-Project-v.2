document.addEventListener("DOMContentLoaded", function() {
  const navbar = document.querySelector("nav");
  
  if (window.location.pathname.includes("index.php")) {
    window.addEventListener("scroll", function() {
      if (window.pageYOffset > 0) {
        navbar.classList.remove("big");
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
        navbar.classList.add("big");
      }
    });
  } else {
    navbar.classList.add("no-transition");
    navbar.classList.add("scrolled");
  }
});



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