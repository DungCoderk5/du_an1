<?php
require_once '../model/comment.php';
require_once '../model/products.php'; // Gọi model cho sản phẩm
require_once '../model/customer.php'; // gọi model cho user

if (isset($_GET['action']) && ($_GET['action'] != "")) {
  switch ($_GET['action']) {
    case 'hide':
      if (isset($_GET['cid']) && $_GET['cid'] > 0) {
        $comment_id = $_GET['cid'];
        $status = $_GET['st'];
        $product_id = $_GET['pid'];
        comment_update($status, $product_id, $comment_id);
      }
      $user = nguoidung_selectall();  // Lấy tất cả user
      $comment = comment_selectall();
      $product = sanpham_selectall();
      break;

    case 'delete':
      if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
        $comment_id = $_GET['comment_id'];
        comment_delete($comment_id);
      }
      $user = nguoidung_selectall();  // Lấy tất cả user
      $comment = comment_selectall();
      $product = sanpham_selectall();
      break;

    case 'search':
      if (isset($_GET['action']) && $_GET['action'] == 'search') {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword) {
          // Perform the search query for comments
          $comment = comment_search($keyword);
        } else {
          $comment = [];  // Empty result if no keyword is provided
        }
        require_once './views/danh-gia/danhgia_search.php';  // Show search results
      } else {
        $page = isset($_GET['pagedg']) && is_numeric($_GET['pagedg']) ? (int) $_GET['pagedg'] : 1;
        $limit = 9;
        $start = ($page - 1) * $limit;

        $user = nguoidung_selectall($start, $limit);  // Lấy tất cả user
        $comment = comment_selectall($start, $limit);
        $product = sanpham_selectall($start, $limit);

        // Lấy số lượng sản phẩm và tính tổng số trang
        $soluongdg = count_comment();  // Lấy số lượng sản phẩm
        $sotrang = ceil($soluongdg / $limit);  // Tính tổng số trang
        require_once 'views/danh-gia/danhgia.php';
      }
      break;

    default:
      $page = isset($_GET['pagedg']) && is_numeric($_GET['pagedg']) ? (int) $_GET['pagedg'] : 1;
      $limit = 9;  // Số sản phẩm mỗi trang

      // Tính toán vị trí bắt đầu (offset) cho truy vấn SQL
      $start = ($page - 1) * $limit;

      // Lấy toàn bộ danh sách bình luận, bao gồm tên người dùng và sản phẩm
      $user = nguoidung_selectall($start, $limit);  // Lấy tất cả user
      $comment = comment_selectall($start, $limit);
      $product = sanpham_selectall($start, $limit);

      // Lấy số lượng sản phẩm và tính tổng số trang
      $soluongdg = count_comment();  // Lấy số lượng sản phẩm
      $sotrang = ceil($soluongdg / $limit);  // Tính tổng số trang
      require_once 'views/danh-gia/danhgia.php';
      break;
  }
} else {
  $page = isset($_GET['pagedg']) && is_numeric($_GET['pagedg']) ? (int) $_GET['pagedg'] : 1;
  $limit = 9;  // Số sản phẩm mỗi trang

  // Tính toán vị trí bắt đầu (offset) cho truy vấn SQL
  $start = ($page - 1) * $limit;

  $user = nguoidung_selectall($start, $limit);  // Lấy tất cả user
  $comment = comment_selectall($start, $limit);
  $product = sanpham_selectall($start, $limit);

  // Lấy số lượng sản phẩm và tính tổng số trang
  $soluongdg = count_comment();  // Lấy số lượng sản phẩm
  $sotrang = ceil($soluongdg / $limit);  // Tính tổng số trang
  require_once 'views/danh-gia/danhgia.php';
}
?>