// Toggles Menu Icon Button
function toggleMenu() {
  const navbarLinks = document.getElementById("navbarLinks");
  const toggleMenuBtn = document.getElementById("toggleMenuBtn");
  const toggleIcon = document.getElementById("toggleIcon");

  navbarLinks.classList.toggle("active");

  if (navbarLinks.classList.contains("active")) {
    toggleIcon.textContent = "close";
    toggleMenuBtn.setAttribute("title", "Hide Menu");
  } else {
    toggleIcon.textContent = "menu";
    toggleMenuBtn.setAttribute("title", "Show Menu");
  }
}

// Changes Hero Section Background Image
const heroSection = document.getElementById("heroSection");

const images = [
  "url(./assets/img/carousel-hero-image-1.png)",
  "url(./assets/img/carousel-hero-image-2.png)",
  "url(./assets/img/carousel-hero-image-3.png)",
];

let current = 0;

function changeBackground() {
  current = (current + 1) % images.length;
  heroSection.style.backgroundImage = images[current];
}

heroSection.style.backgroundImage = images[0];

setInterval(changeBackground, 4000);
