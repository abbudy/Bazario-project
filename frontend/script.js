document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.getElementById("login-btn");
    const signupBtn = document.getElementById("signup-btn");
    const loginModal = document.getElementById("login-modal");
    const signupModal = document.getElementById("signup-modal");
    const closeLogin = document.getElementById("close-login");
    const closeSignup = document.getElementById("close-signup");
    const openSignupLink = document.getElementById("open-signup");
    const shopNowBtn = document.getElementById("shop-now-btn");
  
    function showModal(modal) {
      modal.style.display = "block";
    }
    function hideModal(modal) {
      modal.style.display = "none";
    }
  
    loginBtn.addEventListener("click", function (e) {
      e.preventDefault();
      showModal(loginModal);
    });
  
    signupBtn.addEventListener("click", function (e) {
      e.preventDefault();
      showModal(signupModal);
    });
  
    closeLogin.addEventListener("click", function () {
      hideModal(loginModal);
    });
  
    closeSignup.addEventListener("click", function () {
      hideModal(signupModal);
    });
  
    if (openSignupLink) {
      openSignupLink.addEventListener("click", function (e) {
        e.preventDefault();
        hideModal(loginModal);
        showModal(signupModal);
      });
    }
  
    shopNowBtn.addEventListener("click", function () {
      const productsSection = document.getElementById("products");
      if (productsSection) {
        productsSection.scrollIntoView({ behavior: "smooth" });
      }
    });
  
    window.addEventListener("click", function (event) {
      if (event.target === loginModal) {
        hideModal(loginModal);
      }
      if (event.target === signupModal) {
        hideModal(signupModal);
      }
    });
  
    const loginForm = document.getElementById("login-form");
    if (loginForm) {
      loginForm.addEventListener("submit", function (e) {
        e.preventDefault();
        console.log("Login submitted with:", {
          email: document.getElementById("login-email").value,
          password: document.getElementById("login-password").value,
        });
        hideModal(loginModal);
      });
    }
  
    const signupForm = document.getElementById("signup-form");
    if (signupForm) {
      signupForm.addEventListener("submit", function (e) {
        e.preventDefault();
        console.log("Signup submitted with:", {
          name: document.getElementById("signup-name").value,
          email: document.getElementById("signup-email").value,
          password: document.getElementById("signup-password").value,
        });
        hideModal(signupModal);
      });
    }
  
    const dashboardMenuButtons = document.querySelectorAll(".dashboard-menu button");
    dashboardMenuButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        const action = this.textContent.trim().toLowerCase();
        console.log("Dashboard action selected:", action);
      });
    });
  
    
  });
  