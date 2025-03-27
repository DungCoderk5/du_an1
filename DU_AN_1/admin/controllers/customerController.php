<?php
require_once '../model/customer.php';
if (isset($_GET['action']) && ($_GET['action'] != "")) {
  switch ($_GET['action']) {
    case 'adduser':
      if (isset($_POST['themnguoidung'])) {
        $errors = []; // Mảng để lưu lỗi nếu có

        // Lấy dữ liệu từ form




        $username = trim($_POST['customerName']);
        $email = trim($_POST['customerEmail']);
        $password = trim($_POST['customerPassword']);
        $address = trim($_POST['customerAddress']);
        $phone = trim($_POST['customerPhone']);
        $role = (int) $_POST['customerRole'];
        $avatar = $_FILES['customerAvatar']['name'];
        move_uploaded_file($_FILES['customerAvatar']['tmp_name'], "../public/upload/" . $avatar);

        // Kiểm tra dữ liệu
        if (empty($username)) {
          $errors[] = 'Tên khách hàng không được để trống.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = 'Email không hợp lệ.';
        }
        if (strlen($password) < 6) {
          $errors[] = 'Mật khẩu phải có ít nhất 6 ký tự.';
        }
        if (empty($address)) {
          $errors[] = 'Địa chỉ không được để trống.';
        }
        if (!preg_match('/^\d{10,11}$/', $phone)) {
          $errors[] = 'Số điện thoại không hợp lệ.';
        }

        // Kiểm tra giá trị của customerRole
        if (!in_array($role, [0, 1])) {
          $errors[] = 'Vai trò không hợp lệ.';
        }
        $result = nguoidung_insert($username, $email, $password, $address, $phone, 1, $role, $avatar);

        if (!$result) {
          $errors[] = 'Thêm người dùng không thành công.';
        }

        // Nếu không có lỗi, thực hiện thêm người dùng
        if (empty($errors)) {
          nguoidung_insert($username, $email, $password, $address, $phone, 1, $role, $avatar);
          header('Location: index.php?page=customer');
          exit;
        }
      }

      // Nếu có lỗi hoặc truy cập lần đầu, hiển thị form
      require_once 'views/nguoi-dung/adduser.php';
      break;


    case 'update':
      if (isset($_POST['capnhatnguoidung'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['customerName'];
        $email = $_POST['customerEmail'];
        $password = $_POST['customerPassword'];
        $address = $_POST['customerAddress'];
        $phone = $_POST['customerPhone'];
        $role = $_POST['customerRole'];
        $account_status = $_POST['account_status'];
        $avatar = $_FILES['customerAvatar']['name'];
        if ($avatar != "") {
          move_uploaded_file($_FILES['customerAvatar']['name'], "../public/upload/" . $avatar);
        }
        // Cập nhật người dùng
        nguoidung_update($user_id, $username, $email, $password, $address, $phone, $account_status, $role, $avatar);
        header('Location: index.php?page=customer');
      }

      // Lấy thông tin người dùng để hiển thị lên form update
      if (isset($_GET['maKhachHang']) && ($_GET['maKhachHang'] > 0)) {
        $nguoidung = nguoidung_selectone($_GET['maKhachHang']);
      }
      require_once 'views/nguoi-dung/edituser.php';
      break;

    case 'hidenguoidung':
      if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
        $user_id = $_GET['user_id'];
        nguoidung_hide($user_id); // Cập nhật trạng thái ẩn
        header("Location: index.php?page=customer");
      } else {
        echo "<p style='color: red;'>Không thể ẩn người dùng. ID không hợp lệ.</p>";
      }
      break;
    case 'shownguoidung':
        if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
          $user_id = $_GET['user_id'];
          nguoidung_show($user_id); // Cập nhật trạng thái ẩn
          header("Location: index.php?page=customer");
        } else {
          echo "<p style='color: red;'>Không thể ẩn người dùng. ID không hợp lệ.</p>";
        }
        break;
    case 'search':
      if (isset($_GET['action']) && $_GET['action'] == 'search') {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword) {
          $users= nguoidung_search($keyword);  // Perform the search query
        } else {
          $users = [];  // Empty result if no keyword is provided
        }
        require_once './views/nguoi-dung/usersearch.php';  // Show search results
      } else {
        // Default case for displaying all products with pagination
        $page = isset($_GET['pageus']) && is_numeric($_GET['pageus']) ? (int) $_GET['pageus'] : 1;
        $limit = 5;
        $start = ($page - 1) * $limit;
        $users = nguoidung_selectall($start, $limit);
         $soluongnd = count_users();
        $sotrang = ceil($soluongnd / $limit);
        require_once 'views/nguoi-dung/usersearch.php';  // Show product list view
      }
      break;
    default:
      // In your controller or main logic:

      $page = isset($_GET['pageus']) && is_numeric($_GET['pageus']) ? (int) $_GET['pageus'] : 1;
      $limit = 5;  // Define the number of users per page
      $start = ($page - 1) * $limit;  // Calculate the starting point for the query
      $users = nguoidung_selectall($start, $limit);
      // Perform the search query with pagination
// Calculate the total number of users
      $soluongnd = count_users();

      // Calculate total pages for pagination
      $sotrang = ceil($soluongnd / $limit);

      require_once 'views/nguoi-dung/user.php';
      break;
  }
} else {
  // In your controller or main logic:

  $page = isset($_GET['pageus']) && is_numeric($_GET['pageus']) ? (int) $_GET['pageus'] : 1;
  $limit = 5;  // Define the number of users per page
  $start = ($page - 1) * $limit;  // Calculate the starting point for the query
  $users = nguoidung_selectall($start, $limit);
  // Perform the search query with pagination
// Calculate the total number of users
  $soluongnd = count_users();

  // Calculate total pages for pagination
  $sotrang = ceil($soluongnd / $limit);

  require_once 'views/nguoi-dung/user.php';
}
?>