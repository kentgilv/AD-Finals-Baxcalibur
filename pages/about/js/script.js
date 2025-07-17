function toggleMenu() {
  const navbarLinks = document.getElementById("navbarLinks");
  const toggleMenuBtn = document.getElementById("toggleMenuBtn");
  const toggleIcon = document.getElementById("toggleIcon");

  navbarLinks.classList.toggle("open");

  if (navbarLinks.classList.contains("open")) {
    toggleIcon.textContent = "close";
    toggleMenuBtn.setAttribute("title", "Hide Menu");
  } else {
    toggleIcon.textContent = "menu";
    toggleMenuBtn.setAttribute("title", "Show Menu");
  }
}

