<?php
require_once '../model/orders.php';

if (isset($_GET['action']) && ($_GET['action'] != "")) {

    switch ($_GET['action']) {
        // case 'addOrder':
        //     if (isset($_POST['themdonhang'])) {
        //         // Thêm đơn hàng vào cơ sở dữ liệu


        //         // Thêm chi tiết sản phẩm vào đơn hàng


        //         // Sau khi thêm xong, chuyển hướng về trang danh sách đơn hàng
        //         header('Location: index.php?page=orders');
        //         exit();
        //     }

        //     // Lấy danh sách đơn hàng để hiển thị lên form (nếu cần)
        //     $order = order_select_all();
        //     require_once 'views/don-hang/addOrder.php';
        //     break;

        // case 'update':

        //         $order_id = $_POST['order_id'];
        //         $order_status_new = $_POST['ordertStatus'];

        //         $donhang = order_selectone($order_id);
        //         $order_status_current = $donhang['order_status'];

        //         $errors = [];
        //         if ($order_status_current == 4) {

        //             if ($order_status_new != 4 && $order_status_new != 3) {
        //                 $errors[] = "Đơn hàng đã hoàn thành. Không thể chuyển sang trạng thái khác.";
        //             }
        //         } elseif ($order_status_new < $order_status_current) {

        //             $errors[] = "Không thể quay lại trạng thái trước đó.";
        //         }


        //         if (empty($errors)) {
        //             order_updete($order_id, $order_status_new);
        //             header('Location: index.php?page=orders');
        //             exit;
        //         }


        //     if (isset($_GET['maDonHang']) && ($_GET['maDonHang'] > 0)) {
        //         $donhang = order_selectone($_GET['maDonHang']);
        //     }

        //     require_once './views/don-hang/editorder.php';
        //     break;



        // case 'deleteOrder':
        //     // Xóa đơn hàng
        //     if (isset($_GET['order_id'])) {
        //         order_delete($_GET['order_id']);
        //         header('Location: index.php?action=oders');
        //     }
        //     break;

        case 'viewOrder':
            if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
                $order_id = (int) $_GET['order_id']; // Chuyển đổi sang kiểu int
                $order_details = order_details_all($order_id);
                require_once './views/don-hang/viewOrder.php'; // Gọi file view
            } else {
                echo "Mã đơn hàng không hợp lệ."; // Kiểm tra nếu không có order_id
            }
            break;

        case 'hidedonhang':
            if (isset($_GET['action']) && ($_GET['action'] == 'hidedonhang')) {
                $order_id = $_POST['order_id'] ?? null; // Lấy order_id từ POST

                if ($order_id) {
                    hideOrder($order_id); // Gọi hàm hideOrder
                    $_SESSION['message'] = "Đơn hàng đã được ẩn thành công!";
                    header("Location: index.php?page=orders"); // Chuyển hướng
                    exit();
                } else {
                    echo "<p style='color: red;'>Không thể ẩn đơn hàng. ID không hợp lệ.</p>";
                }
            }
            break;
        case 'showdonhang':
            if (isset($_GET['action']) && ($_GET['action'] == 'showdonhang')) {
                $order_id = $_POST['order_id'] ?? null;
                // Cập nhật trạng thái đơn hàng thành trạng thái hiển thị (ví dụ: 1 là trạng thái hiển thị)
                showOrder($order_id); // Gọi hàm hideOrder
                $_SESSION['message'] = "Đơn hàng đã được hiển thị thành công!";
                header("Location: index.php?page=orders"); // Chuyển hướng

                // Redirect về trang quản lý đơn hàng

                exit();
            }
            break;
        case 'huydonhang':
            if (isset($_GET['action']) && ($_GET['action'] == 'huydonhang')) {
                $order_id = $_POST['order_id'] ?? null;
                // Cập nhật trạng thái đơn hàng thành trạng thái hiển thị (ví dụ: 1 là trạng thái hiển thị)
                hienOrder($order_id); // Gọi hàm hideOrder
                $_SESSION['message'] = "Đơn hàng đã được hiển thị thành công!";
                header("Location: index.php?page=orders"); // Chuyển hướng

                // Redirect về trang quản lý đơn hàng

                exit();
            }
            break;
        case 'search':
            if (isset($_GET['action']) && $_GET['action'] == 'search') {
                $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                if ($keyword) {
                    $orders = orders_search($keyword);  // Perform the search query
                } else {
                    $orders = [];  // Empty result if no keyword is provided
                }
                require_once './views/don-hang/orders_search.php';  // Show search results
            } else {
                // Default case for displaying all products with pagination
                $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
                $limit = 9;
                $start = ($page - 1) * $limit;
                $orders = order_select_all($start, $limit);  // Display paginated products
                $soluongdh = count_orders();
                $sotrang = ceil($soluongdh / $limit);
                require_once 'views/don-hang/orders.php';  // Show product list view
            }
            break;
        default:
            $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
            $limit = 9;  // Số sản phẩm mỗi trang

            // Tính toán vị trí bắt đầu (offset) cho truy vấn SQL
            $start = ($page - 1) * $limit;

            $orders = order_select_all($start, $limit);
            $soluongdh = count_orders();
            $sotrang = ceil($soluongdh / $limit);
            require_once 'views/don-hang/orders.php';
            break;
    }
} else {
    $page = isset($_GET['pagedh']) && is_numeric($_GET['pagedh']) ? (int) $_GET['pagedh'] : 1;
    $limit = 9;  // Số sản phẩm mỗi trang

    // Tính toán vị trí bắt đầu (offset) cho truy vấn SQL
    $start = ($page - 1) * $limit;

    $orders = order_select_all($start, $limit);
    $soluongdh = count_orders();
    $sotrang = ceil($soluongdh / $limit);
    require_once 'views/don-hang/orders.php';

}

?>