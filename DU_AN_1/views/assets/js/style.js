//! User
document
  .getElementById("user-icon")
  .addEventListener("click", function (event) {
    event.preventDefault();
    var dropdownMenu = document.getElementById("dropdown-menu");
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "block";
    }
  });

window.onclick = function (event) {
  if (
    !event.target.matches("#user-icon") &&
    !event.target.closest("#dropdown-menu")
  ) {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};

//! Cart
document
  .getElementById("cart-icon")
  .addEventListener("click", function (event) {
    event.preventDefault();
    var dropdownMenu = document.getElementById("cart-container");
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "block";
    }
  });

window.onclick = function (event) {
  if (
    !event.target.matches("#cart-icon") &&
    !event.target.closest("#cart-container")
  ) {
    var dropdowns = document.getElementsByClassName("cart-container");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};

//! Nav-Bars
document.getElementById("bar-icon").addEventListener("click", function (event) {
  event.preventDefault();
  var dropdownMenu = document.getElementById("drop-bar");
  if (dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
  } else {
    dropdownMenu.style.display = "block";
  }
});

window.onclick = function (event) {
  if (
    !event.target.matches("#bar-icon") &&
    !event.target.closest("#drop-bar")
  ) {
    var dropdowns = document.getElementsByClassName("drop-bart");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};

//! Button Read
// $("#button-read-more").on("click", function (event) {
//   event.preventDefault();
//   var dropdownMenu = $("#button-read-less");
//   if (dropdownMenu.css("display") === "block") {
//     dropdownMenu.css("display", "none");
//   } else {
//     dropdownMenu.css("display", "block");
//   }
// });
