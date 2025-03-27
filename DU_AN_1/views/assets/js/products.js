console.log(1);
document.querySelectorAll(".pagination-btn").forEach((button) => {
  button.addEventListener("click", (e) => {
    const page = e.target.dataset.page;
    const form = document.querySelector("form");
    const formData = new FormData(form);
    formData.set("page", page); // Thêm thông tin page vào FormData

    fetch("index.php?page=Product", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.querySelector(".products-page").innerHTML = data;
        window.scrollTo(0, 0); // Cuộn lên đầu trang khi chuyển trang
      });
  });
});
//! CSS
function addCSS(href) {
  var link = document.createElement("link");

  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = href;

  var head = document.getElementsByTagName("head")[0];

  head.appendChild(link);
}
addCSS("./views/assets/css/products.css");

//! Bar-Drop
document
  .getElementById("bar-icon-product")
  .addEventListener("click", function (event) {
    event.preventDefault();
    var dropdownMenu = document.getElementById("bar-drop-product");
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "block";
    }
  });

window.onclick = function (event) {
  if (
    !event.target.matches("#bar-icon-product") &&
    !event.target.closest("#bar-drop-product")
  ) {
    var dropdowns = document.getElementsByClassName("bar-drop");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};
