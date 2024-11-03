/******/ (() => { // webpackBootstrap
/*!***********************************!*\
  !*** ./resources/scripts/main.js ***!
  \***********************************/
window.addEventListener("load", function (event) {
  // Function to close the mobile menu
  function closeMobileMenu() {
    var navLinks = document.querySelectorAll('.site-menu.active .nav-item');
    if (navLinks.length > 0) {
      document.querySelector('#hamburger').click();
    }
  }

  // Toggle menu and hamburger animation
  document.querySelector("#hamburger").addEventListener("click", function () {
    document.querySelectorAll(".bar").forEach(function (bar) {
      return bar.classList.toggle("animate");
    });
    document.querySelector(".site-menu").classList.toggle("active");
    this.classList.toggle("active");
  });

  // Add smooth scroll and close menu for specific navigation
  function addScrollListener(selector, targetId) {
    var elements = document.querySelectorAll(selector);
    if (elements.length > 0) {
      elements.forEach(function (el) {
        el.addEventListener("click", function (event) {
          event.preventDefault();
          document.querySelector(targetId).scrollIntoView({
            behavior: "smooth"
          });
          closeMobileMenu();
        });
      });
    }
  }

  // Apply smooth scroll behavior for community and story links
  addScrollListener('[rel="joincommunity"]', '#join-community');
  addScrollListener('[rel="story"]', '[data-id="story"]');

  // Close mobile menu when any nav-item is clicked
  document.querySelectorAll('.nav-item').forEach(function (item) {
    item.addEventListener("click", closeMobileMenu);
  });
  var joincommunity = document.getElementById("joincommunity");
  if (!!joincommunity !== false) {
    joincommunity.addEventListener("submit", function (event) {
      event.preventDefault();
      document.querySelectorAll(".error").forEach(function (el) {
        el.classList.remove("error");
      });
      var hasError = false;
      var name = document.getElementById("user_name").value.trim();
      var age = document.getElementById("child_age").value.trim();
      var phone = document.getElementById("user_phone").value.trim();

      // Simple client-side validation
      if (name === "") {
        document.getElementById("user_name").classList.add("error");
        hasError = true;
      }
      if (age === "") {
        document.getElementById("child_age").classList.add("error");
        hasError = true;
      }
      if (phone === "" || !/^\d{10}$/.test(phone)) {
        document.getElementById("user_phone").classList.add("error");
        hasError = true;
      }
      if (hasError) {
        return;
      }

      // Submit the form using AJAX
      var formData = new FormData();
      formData.append("action", "join_community");
      formData.append("security", webwp.security);
      formData.append("name", name);
      formData.append("age", age);
      formData.append("phone", phone);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", webwp.ajaxurl, true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          document.getElementById("joincommunity").reset();
        }
        var output = JSON.parse(xhr.response);
        if (output.status == "success") {
          document.getElementById("status_success").classList.add("active");
        } else {
          document.getElementById("status_error").classList.add("active");
        }
      };
      xhr.send(formData);
    });
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var bioBlocks = document.querySelectorAll('.advisor-block');
  bioBlocks.forEach(function (block) {
    var bioBtn = block.querySelector('.bio-btn');
    var bioClose = block.querySelector('.bio-close');
    var profileBio = block.querySelector('.profile-bio');
    if (bioBtn) {
      bioBtn.addEventListener('click', function () {
        profileBio.classList.add('active');
      });
    }
    if (bioClose) {
      bioClose.addEventListener('click', function () {
        profileBio.classList.remove('active');
      });
    }
  });
});
/******/ })()
;
//# sourceMappingURL=app.js.map