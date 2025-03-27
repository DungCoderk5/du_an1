<?php
// Kiểm tra nếu yêu cầu là POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ POST request
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Kết nối đến cơ sở dữ liệu
    require_once './../../model/../../model/connectdb.php'; 

    try {
        // Cập nhật trạng thái đơn hàng sử dụng PDO
        $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
        $conn = pdo_get_connection(); // Lấy kết nối PDO
        $stmt = $conn->prepare($sql);
        $stmt->execute([$order_status, $order_id]); // Truyền tham số vào

        // Kiểm tra số dòng bị ảnh hưởng và trả về kết quả
        if ($stmt->rowCount() > 0) {
            // Nếu thành công, trả về success = true
            echo json_encode(['success' => true]);
        } else {
            // Nếu không có dòng nào bị ảnh hưởng (có thể do order_id không tồn tại), trả về success = false
            echo json_encode(['success' => false]);
        }
    } catch (PDOException $e) {
        // Nếu có lỗi trong quá trình truy vấn, trả về lỗi
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        // Đóng kết nối
        $conn = null;
    }
}
?>
