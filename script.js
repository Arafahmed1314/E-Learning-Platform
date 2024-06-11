var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    720: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});
const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu?.querySelector(".close-btn");

if (hamburgerBtn) {
  hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
  });
}

if (hideMenuBtn) {
  hideMenuBtn.addEventListener("click", () => {
    navbarMenu.classList.remove("show-menu");
  });
}

const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup?.querySelector(".close-btn");

if (showPopupBtn) {
  showPopupBtn.addEventListener("click", () => {
    document.body.classList.toggle("show-popup");
  });
}

if (hidePopupBtn) {
  hidePopupBtn.addEventListener("click", () => {
    document.body.classList.remove("show-popup");
  });
}

const signupLoginLinks = formPopup?.querySelectorAll(".bottom-link a");

if (signupLoginLinks) {
  signupLoginLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      formPopup.classList.toggle("show-signup", link.id === "signup-link");
    });
  });
}

const profileBtn = document.querySelector(".profile-btn");
const profilePopup = document.querySelector(".profile-popup-container");

if (profileBtn && profilePopup) {
  profileBtn.addEventListener("mouseover", () => {
    profilePopup.classList.add("active");
  });

  // profilePopup.addEventListener("mouseenter", () => {
  //   profilePopup.classList.add("active");
  // });

  profilePopup.addEventListener("mouseleave", () => {
    profilePopup.classList.remove("active");
  });
}
const themeToggle = document.querySelector(".theme-toggle");

themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("light-mode");
  document.body.classList.toggle("dark-mode");
});
