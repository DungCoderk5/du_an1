<?php
require_once '../model/category.php';
require_once '../model/products.php';

if (isset($_GET['action']) && ($_GET['action'] != "")) {
  switch ($_GET['action']) {
    case 'addsanpham':
      if (isset($_POST['themsp'])) {
        // thêm sản phẩm: lấy dữ liệu trên form insert vào database
        $img = $_FILES['productImage']['name'];
        move_uploaded_file($_FILES['productImage']['tmp_name'], "../public/upload/" . $img);

        // Thêm sản phẩm vào database
        sanpham_insert($_POST['productName'], $_POST['productPrice'], $_POST['productCategory'], $_POST['productQuantity'], $_POST['productDescription'], $_FILES['productImage']['name']);

        // Sau khi thêm xong chuyển về trang ds sản phẩm
        header('Location: index.php?page=product');
      }
      // lấy ds dm để hiện thị lên form add
      $category = danhmuc_selectall();
      require_once 'views/san-pham/addsanpham.php';
      break;

    case 'update':
      // kiểm tra có click vào nút cập nhật sản phẩm không?
      if (isset($_POST['capnhatsp'])) {
        // lấy sản phẩm từ form về
        $product_id = $_POST['product_id'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $productCategory = $_POST['productCategory'];
        $productDescription = $_POST['productDescription'];

        // nếu hình update mới
        // upload hình
        $img = $_FILES['productImage']['name'];
        if ($img != "") {
          $img = $_FILES['productImage']['name'];
          move_uploaded_file($_FILES['productImage']['tmp_name'], "../public/upload/" . $img);
        }

        // update vào database
        sanpham_update($product_id, $productName, $productPrice, $productQuantity, $productCategory, $productDescription, $img);
        header('Location: index.php?page=product');
      }

      // lấy thông tin sản phẩm để hiện thị lên form update
      if (isset($_GET['maSanPham']) && ($_GET['maSanPham'] > 0)) {
        $sanpham = sanpham_selectone($_GET['maSanPham']);

        // lấy ds danh mục để hiện thị lên form update
        $category = danhmuc_selectall();
      }

      require_once './views/san-pham/editsanpham.php';
      break;
    case 'deletesanpham':
      if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        sanpham_delete($product_id); // Delete category
        header("Location: index.php?page=product");
        exit();
      } else {
        echo "<p style='color: red;'>ID danh mục không hợp lệ!</p>";
      }
      break;

    case 'addspimg':
      if (isset($_POST['addspimg'])) {
        // lấy sản phẩm từ form về
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
        $product_name = isset($_POST['productName']) ? $_POST['productName'] : null;
        $product_price = isset($_POST['productPrice']) ? $_POST['productPrice'] : null;
        $product_quantity = isset($_POST['productQuantity']) ? $_POST['productQuantity'] : null;
        $product_category = isset($_POST['productCategory']) ? $_POST['productCategory'] : null;
        $product_description = isset($_POST['productDescription']) ? $_POST['productDescription'] : null;
        $product_image = isset($_FILES['productImage']) ? $_FILES['productImage'] : null;


        // nếu hình update mới
        // upload hình
        $img = $_FILES['productImage']['name'];
        if ($img != "") {
          move_uploaded_file($_FILES['productImage']['tmp_name'], "../public/upload/" . $img);
        }

        // update vào database
        sanpham_update($product_id, $productName, $productPrice, $productQuantity, $productCategory, $productDescription, $img);
        header('Location: index.php?page=product');
      }
      break;
    case 'search':
      if (isset($_GET['action']) && $_GET['action'] == 'search') {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword) {
          $listsanpham = sanpham_search($keyword);  // Perform the search query
        } else {
          $listsanpham = [];  // Empty result if no keyword is provided
        }
        require_once './views/san-pham/sanpham_search.php';  // Show search results
      } else {
        // Default case for displaying all products with pagination
        $page = isset($_GET['pagepr']) && is_numeric($_GET['pagepr']) ? (int) $_GET['pagepr'] : 1;
        $limit = 5;
        $start = ($page - 1) * $limit;
        $listsanpham = sanpham_selectall($start, $limit);
        $spimg = sanphamimg_get();  // Display paginated products
        $soluongsp = count_products();
        $sotrang = ceil($soluongsp / $limit);
        require_once 'views/san-pham/sanpham.php';  // Show product list view
      }
      break;
    default:
      // giới hạn 1 trang 4 sản phẩm
      $page = isset($_GET['pagepr']) && is_numeric($_GET['pagepr']) ? (int) $_GET['pagepr'] : 1;
      $limit = 5;  // Số sản phẩm mỗi trang

      // Tính toán vị trí bắt đầu (offset) cho truy vấn SQL
      $start = ($page - 1) * $limit;

      // Lấy danh sách sản phẩm với phân trang
      $listsanpham = sanpham_selectall($start, $limit);
      $spimg = sanphamimg_get();
      // Lấy số lượng sản phẩm và tính tổng số trang
      $soluongsp = count_products();  // Lấy số lượng sản phẩm
      $sotrang = ceil($soluongsp / $limit);  // Tính tổng số trang

      // Hiển thị danh sách sản phẩm và phân trang
      require_once 'views/san-pham/sanpham.php';
      break;
  }
} else {
  // Default case: no action specified
  $page = isset($_GET['pagepr']) && is_numeric($_GET['pagepr']) ? (int) $_GET['pagepr'] : 1;
  $limit = 5;

  $start = ($page - 1) * $limit;
  $listsanpham = sanpham_selectall($start, $limit);
  $spimg = sanphamimg_get();
  $soluongsp = count_products();
  $sotrang = ceil($soluongsp / $limit);

  require_once 'views/san-pham/sanpham.php';
}
?>