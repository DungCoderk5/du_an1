<?php
require_once '../model/voucher.php';
if (isset($_GET['action']) && ($_GET['action'] != "")) {
  switch ($_GET['action']) {
    case 'addvoucher':
      if (isset($_POST['themvoucher'])) {
        // thêm voucher vào database 
        // lấy dữ liệu trên form insert vào database
        // gọi hàm voucher_insert để thêm vào database
        voucher_insert($_POST['code'], $_POST['discount'], $_POST['expiration_date']);
        // sau khi thêm xong thì quay về
        header('Location: index.php?page=voucher');
      }
      require_once 'views/ma-giam-gia/addvoucher.php';
      break;
    case 'editvoucher':
      // kiểm tra có click vào nút cập nhật sản phẩm không?
      if (isset($_POST['capnhatsale'])) {
        // lấy voucher từ form về
        $voucher_id = $_POST['voucher_id'];
        $code = $_POST['code'];
        $discount = $_POST['discount'];
        $expiration_date = $_POST['expiration_date'];
        // gọi hàm voucher_update để cập nhật vào database
        voucher_update($voucher_id, $code, $discount, $expiration_date);
        // sau khi cập nhật xong thì quay về
        header('Location: index.php?page=voucher');

      }
      // lấy thông tin sản phẩm để hiện thị lên form update
      if (isset($_GET['voucher_id']) && ($_GET['voucher_id'] > 0)) {
        $voucher = voucher_selectone($_GET['voucher_id']);
      }

      require_once 'views/ma-giam-gia/editvoucher.php';
      break;
    case 'deletevoucher':
      if (isset($_GET['voucher_id']) && $_GET['voucher_id'] > 0) {
        $voucher_id = $_GET['voucher_id'];
        // Gọi hàm voucher_delete để xóa voucher
        voucher_delete($voucher_id);
        // Sau khi xóa, chuyển hướng về trang danh sách voucher
        header('Location: index.php?page=voucher');
      }
      break;
     case 'search':
      if (isset($_GET['action']) && $_GET['action'] == 'search') {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword) {
          $voucher = voucher_search($keyword);  // Perform the search query
        } else {
          $voucher = [];  // Empty result if no keyword is provided
       }
        require_once './views/ma-giam-gia/voucher_search.php';  // Show search results
      } else {
        // Default case for displaying all products with pagination
        $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
        $limit = 9;
        $start = ($page - 1) * $limit;
        $voucher = magiamgia_selectall($start, $limit);  // Display paginated products
        $soluongdh = count_voucher();
        $sotrang = ceil($soluongdh / $limit);
        require_once 'views/ma-giam-gia/voucher.php';  // Show product list view
      }
break;
    default:
      $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
      $limit = 9;

      $start = ($page - 1) * $limit;
      $voucher = magiamgia_selectall($start, $limit);
      $soluongdh = count_voucher();
      $sotrang = ceil($soluongdh / $limit);
      require_once 'views/ma-giam-gia/voucher.php';
      break;

  }


} else {
  // Default case: no action specified
  $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
  $limit = 9 ;

  $start = ($page - 1) * $limit;
  $voucher = magiamgia_selectall($start, $limit);
  $soluongdh = count_voucher();
  $sotrang = ceil($soluongdh / $limit);
  require_once 'views/ma-giam-gia/voucher.php';
}
?>