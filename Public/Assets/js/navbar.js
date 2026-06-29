const menuToggle = document.getElementById("menu-toggle");
const menuClose = document.getElementById("menu-close");
const mobileMenu = document.getElementById("mobile-menu");
const menuOverlay = document.getElementById("menu-overlay");

function toggleMenu(open) {
  if (open) {
    mobileMenu.classList.remove("-translate-x-full");
    menuOverlay.classList.remove("hidden");
  } else {
    mobileMenu.classList.add("-translate-x-full");
    menuOverlay.classList.add("hidden");
  }
}

menuToggle.addEventListener("click", () => {
  toggleMenu(true);
});

menuClose.addEventListener("click", () => {
  toggleMenu(false);
});

menuOverlay.addEventListener("click", () => {
  toggleMenu(false);
});
