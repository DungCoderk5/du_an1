//! CSS
function addCSS(href) {
  var link = document.createElement("link");

  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = href;

  var head = document.getElementsByTagName("head")[0];

  head.appendChild(link);
}
addCSS("./views/assets/css/detail.css");
window.addEventListener("DOMContentLoaded", () => {
  const priceElement = document.querySelector(".product-price");
  const producdecrp = document.querySelector(".product-description");
  priceElement.classList.add("visible");
  producdecrp.classList.add("visible");
});

$(document).ready(function () {
  // Chuyển hình ảnh chính khi nhấp vào ảnh thu nhỏ
  $(".thumbnail-images img").click(function () {
    let newSrc = $(this).attr("src"); // Lấy src của ảnh thu nhỏ
    $(".main-image img").attr("src", newSrc); // Đổi ảnh chính
  });

  // Xử lý khi nhấn nút "Thêm vào giỏ hàng"
  $(".add-to-cart").click(function () {
    const size = $(".size-options select").val();
    const quantity = $(".quantity input").val();

    // Kiểm tra nếu size và quantity hợp lệ trước khi thêm vào giỏ hàng
    if (size === "Chọn kích thước") {
      alert("Vui lòng chọn kích thước sản phẩm.");
      return;
    }

    if (quantity < 1) {
      alert("Số lượng phải lớn hơn hoặc bằng 1.");
      return;
    }

    // Lấy thông tin sản phẩm và hiển thị thông báo
    alert(
      `Sản phẩm đã được thêm vào giỏ hàng:\nKích thước: ${size}\nSố lượng: ${quantity}`
    );
  });

  // Lightbox hiệu ứng (phóng to ảnh khi click vào ảnh chính)
  $(".main-image img").click(function () {
    const lightbox = $("<div class='lightbox'></div>");
    lightbox.append(
      `<img src="${$(this).attr("src")}" alt="Sản phẩm phóng to">`
    );
    $("body").append(lightbox);

    // Đóng Lightbox khi click ra ngoài ảnh
    lightbox.click(function () {
      lightbox.remove();
    });
  });
});
// Danh sách các slide (đường dẫn ảnh)
// Danh sách các slide (đường dẫn ảnh)
const slides = [
  "../images/product/default/home-1/default-2.jpg",
  "../images/product/default/home-1/default-3.jpg",
  "../images/product/default/home-1/default-4.jpg",
  "../images/product/default/home-1/default-5.jpg",
  "../images/product/default/home-1/default-6.jpg",
  "../images/product/default/home-1/default-7.jpg",
];

// Khởi tạo biến cho chỉ số hiện tại và ảnh chính
let currentIndex = 0;
const mainImage = document.getElementById("main-image");

// Chuyển đến slide được chọn và cập nhật ảnh chính
function goToSlide(index) {
  const newImageSrc = slides[index];

  // Thêm hiệu ứng trượt vào ảnh chính
  if (index > currentIndex) {
    // Nếu là ảnh kế tiếp, trượt sang trái
    mainImage.classList.add("slide-left");
  } else {
    // Nếu là ảnh trước đó, trượt sang phải
    mainImage.classList.add("slide-right");
  }

  // Đợi cho hiệu ứng trượt kết thúc trước khi thay đổi ảnh
  setTimeout(() => {
    mainImage.src = newImageSrc; // Thay đổi ảnh chính sau khi hiệu ứng trượt hoàn thành
    mainImage.classList.remove("slide-left", "slide-right");
  }, 500); // Thời gian trễ này phải khớp với thời gian trong CSS (0.5s)

  // Cập nhật trạng thái của các thumbnail
  currentIndex = index;
  moveThumbnails();

  // Xóa lớp 'active' khỏi tất cả các ảnh nhỏ
  const thumbnails = document.querySelectorAll(".thumbnail");
  thumbnails.forEach((thumbnail) => thumbnail.classList.remove("active"));

  // Thêm lớp 'active' cho ảnh nhỏ được chọn
  thumbnails[currentIndex].classList.add("active");
}

// Thêm hiệu ứng phóng to khi di chuột vào ảnh chính
mainImage.addEventListener("mouseover", () => {
  mainImage.style.transform = "scale(1.5)";
});
mainImage.addEventListener("mouseout", () => {
  mainImage.style.transform = "scale(1)";
});

// Di chuyển các ảnh thumbnail
function moveThumbnails() {
  const thumbnailsContainer = document.querySelector(".thumbnail-images");
  const thumbnailWidth = document.querySelector(".thumbnail").offsetWidth + 10;
  const visibleThumbnails = Math.floor(
    thumbnailsContainer.offsetWidth / thumbnailWidth
  );

  let offset =
    (currentIndex - Math.floor(visibleThumbnails / 2)) * thumbnailWidth;

  const maxOffset =
    slides.length * thumbnailWidth - thumbnailsContainer.offsetWidth;
  if (offset < 0) offset = 0;
  if (offset > maxOffset) offset = maxOffset;

  thumbnailsContainer.style.transform = `translateX(-${offset}px)`;
}

// Chuyển sang slide trước
function prevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  goToSlide(currentIndex);
}

// Chuyển sang slide tiếp theo
function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  goToSlide(currentIndex);
}
const colorSwatches = document.querySelectorAll(".color-swatch");

// Thêm sự kiện click cho từng ô màu
colorSwatches.forEach((swatch) => {
  swatch.addEventListener("click", () => {
    // Xóa lớp 'active' và ẩn dấu tích trong tất cả các ô màu
    colorSwatches.forEach((s) => {
      s.classList.remove("active");
      s.querySelector("i").style.display = "none";
    });

    // Thêm lớp 'active' và hiển thị dấu tích cho ô màu được chọn
    swatch.classList.add("active");
    swatch.querySelector("i").style.display = "inline";
  });
});
function toggleContent(contentType) {
  var description = document.getElementById("description");
  var review = document.getElementById("review");
  var prototype = document.getElementById("prototype");

  // Kiểm tra và hiển thị phần tương ứng
  if (contentType === "description") {
    description.style.display =
      description.style.display === "block" ? "none" : "block";
    review.style.display = "none"; // Ẩn phần đánh giá
    prototype.style.display = "none"; // Ẩn phần đặc điểm
  } else if (contentType === "review") {
    review.style.display = review.style.display === "block" ? "none" : "block";
    description.style.display = "none"; // Ẩn phần mô tả
    prototype.style.display = "none"; // Ẩn phần đặc điểm
  } else if (contentType === "prototype") {
    prototype.style.display =
      prototype.style.display === "block" ? "none" : "block";
    review.style.display = "none"; // Ẩn phần đánh giá
    description.style.display = "none"; // Ẩn phần mô tả
  }
}
function toggleContent(contentId) {
  // Ẩn tất cả các phần nội dung
  const allContents = document.querySelectorAll(".content");
  allContents.forEach((content) => {
    content.classList.add("hidden");
  });

  // Hiển thị phần nội dung được chọn
  const content = document.getElementById(contentId);
  content.classList.remove("hidden");

  // Thêm class "active" vào button đã nhấn và bỏ đi cho các button khác
  const buttons = document.querySelectorAll(".mota-details .button");
  buttons.forEach((button) => {
    button.classList.remove("active");
  });

  // Thêm class "active" cho button đang được nhấn
  const activeButton = document.getElementById("toggle-" + contentId);
  activeButton.classList.add("active");
}
