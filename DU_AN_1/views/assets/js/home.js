//! Slider
var hinh = [
  "./public/upload/imgs/Banner_Logo/1.png",
  "./public/upload/imgs/Banner_Logo/4.png",
  "./public/upload/imgs/Banner_Logo/5.png",
];

var index = 0;
var x;

function slider() {
  index++;
  if (index == hinh.length) index = 0;
  document.getElementById("slider").src = hinh[index];
  // lightbuttonbanner(index);
}

x = setInterval(slider, 5000);

//! CSS
function addCSS(href) {
  var link = document.createElement("link");

  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = href;

  var head = document.getElementsByTagName("head")[0];

  head.appendChild(link);
}
addCSS("./views/assets/css/home.css");

//! Chuyển trang
function Blog() {
  window.location.href = "index.php?page=Blog";
}

//! Đến trang chi tiết
function home_Detail(element) {
  var productId = element.getAttribute("data-product-id");
  window.location.href = "index.php?page=Detail&action=detail&id=" + productId;
}

//! Yêu thích
function addWishList() {
  alert("Đã thêm vào yêu thích").then(alert("???"));
}
