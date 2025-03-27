<?php
// Thêm đơn hàng mới
// function order_insert($user_id, $voucher_id, $total_amount, $order_status) {
//     $sql = "INSERT INTO orders (user_id, voucher_id, total_amount, order_status, order_date) 
//             VALUES (?, ?, ?, ?, NOW())";
//     return pdo_execute($sql, $user_id, $voucher_id, $total_amount, $order_status);
// }

// Thêm chi tiết đơn hàng


// Lấy tất cả đơn hàng
function order_select_all($start = 0, $limit = 0)
{
    $sql = "
        SELECT 
            o.order_id, 
            o.order_status, 
            o.method,
            od.quantity,
            v.voucher_id,
            v.discount, 
            SUM(od.quantity) AS total_products,  
            SUM(od.quantity * p.price) * (1 - COALESCE(v.discount, 0) / 100) AS total_price 
        FROM orders o
        LEFT JOIN order_detail od ON o.order_id = od.order_id
        LEFT JOIN product p ON od.product_id = p.product_id
        LEFT JOIN voucher v ON o.voucher_id = v.voucher_id
        Group by o.order_id
        Order by o.order_id DESC
    ";
     if ($limit!=0){
                $sql .= " LIMIT ".$start.",".$limit;
            }
    return pdo_query($sql);
}


// Tính tổng sản phẩm và tổng tiền cho đơn hàng


function order_details_all($order_id)
{
    $sql = "SELECT o.order_id, o.total_price, o.order_status, o.method,o.order_date, 
       od.order_detail_id, od.order_id, od.product_id, 
       u.username, u.phone, u.address,
       v.voucher_id, v.discount,
       p.name_pro, SUM(od.quantity) AS quantity, p.price, 
       SUM(od.quantity * p.price) AS total_item_price
       FROM orders o
       JOIN users u ON o.user_id = u.user_id
       JOIN order_detail od ON o.order_id = od.order_id
       JOIN product p ON od.product_id = p.product_id
       LEFT JOIN voucher v ON o.voucher_id = v.voucher_id
       WHERE o.order_id = ?
       GROUP BY o.order_id, od.product_id, od.order_detail_id, u.username, u.phone, u.address, p.name_pro, p.price, v.voucher_id, v.discount";

    return pdo_query($sql, [$order_id]);
}

function update_total(){
    $sql="UPDATE orders o
    SET o.total_price = (
    SELECT 
        SUM(od.quantity * p.price * (1 - COALESCE(v.discount, 0) / 100))
    FROM order_detail od
    JOIN product p ON od.product_id = p.product_id
    LEFT JOIN voucher v ON o.voucher_id = v.voucher_id
    WHERE od.order_id = o.order_id
    )
    WHERE o.order_id IN (
    SELECT DISTINCT order_id
    FROM order_detail
)";
return pdo_query($sql);
}

// Lấy chi tiết đơn hàng theo ID

//cập nhật
function order_updete($order_id, $order_status_new)
{
    $sql = "UPDATE orders SET order_status = :order_status_new WHERE order_id = :order_id";
    return pdo_execute($sql,$order_status_new, $order_id);
}

// Xóa đơn hàng

function order_selectone($order_id) {
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    return pdo_query_one($sql, $order_id);
}



function hideOrder($order_id)
{
    $sql = "UPDATE orders SET order_status = 4 WHERE order_id = ?";
    $result = pdo_execute($sql, $order_id);
    if ($result === false) {
        echo "<p style='color: red;'>Không thể cập nhật trạng thái đơn hàng. Vui lòng thử lại!</p>";
    } elseif ($result === 0) {
        echo "<p style='color: orange;'>Không tìm thấy đơn hàng nào để cập nhật.</p>";
    } else {
        echo "<p style='color: green;'>Đơn hàng đã được ẩn thành công!</p>";
    }
    return $result;
}
function showOrder($order_id)
{
    $sql = "UPDATE orders SET order_status = 6 WHERE order_id = ?";
    $result = pdo_execute($sql, $order_id);
    if ($result === false) {
        echo "<p style='color: red;'>Không thể cập nhật trạng thái đơn hàng. Vui lòng thử lại!</p>";
    } elseif ($result === 0) {
        echo "<p style='color: orange;'>Không tìm thấy đơn hàng nào để cập nhật.</p>";
    } else {
        echo "<p style='color: green;'>Đơn hàng đã được ẩn thành công!</p>";
    }
    return $result;
}
function hienOrder($order_id)
{
    $sql = "UPDATE orders SET order_status = 5 WHERE order_id = ?";
    $result = pdo_execute($sql, $order_id);
    if ($result === false) {
        echo "<p style='color: red;'>Không thể cập nhật trạng thái đơn hàng. Vui lòng thử lại!</p>";
    } elseif ($result === 0) {
        echo "<p style='color: orange;'>Không tìm thấy đơn hàng nào để cập nhật.</p>";
    } else {
        echo "<p style='color: green;'>Đơn hàng đã được ẩn thành công!</p>";
    }
    return $result;
}
function count_orders() {
    $sql = "SELECT COUNT(*) as soluong FROM orders";
     $result = pdo_query($sql);  // Trả về mảng chứa kết quả
    return $result[0]['soluong'];  // Trả về số lượng sản phẩm từ mảng
}
function orders_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT 
                o.order_id, 
                o.order_status, 
                o.method, 
                o.order_date, 
                u.username, 
                u.phone, 
                u.address, 
                v.voucher_id, 
                v.discount, 
                SUM(od.quantity) AS total_products,  
                SUM(od.quantity * p.price) * (1 - COALESCE(v.discount, 0) / 100) AS total_price
            FROM orders o
            LEFT JOIN order_detail od ON o.order_id = od.order_id
            LEFT JOIN product p ON od.product_id = p.product_id
            LEFT JOIN voucher v ON o.voucher_id = v.voucher_id
            LEFT JOIN users u ON o.user_id = u.user_id
            WHERE o.order_id LIKE ? OR u.username LIKE ? 
            GROUP BY o.order_id
            ORDER BY o.order_id DESC";
    
    // Check if pagination limit is provided
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%"]);
    }
}





?>