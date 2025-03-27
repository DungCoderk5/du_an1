<?php
function home_tong()
{
    $sql = "
        SELECT 
            (SELECT COUNT(*) FROM product) AS total_products,
            (SELECT COUNT(*) FROM users) AS total_users,
            (SELECT COUNT(*) FROM comment) AS total_comments,
            (SELECT COUNT(*) FROM category) AS total_categories
    ";
    return pdo_query_one($sql);
}
function get_recent_users()
{
    $sql = "
        SELECT user_id, username, address, avatar 
        FROM users 
        LIMIT 7
    "; // Lấy 5 người dùng gần đây nhất (có thể thay đổi tùy ý)
    return pdo_query($sql);
}
function total_proce()
{
    $sql = "SELECT o.order_id, 
                   od.order_detail_id, od.order_id, od.product_id, 
                   u.username, u.phone, u.address,
                   v.voucher_id, v.discount,
                   p.name_pro, od.quantity, p.price, 
                   SUM(od.quantity * p.price) AS total_item_price
            FROM orders o
            JOIN users u ON o.user_id = u.user_id
            JOIN order_detail od ON o.order_id = od.order_id
            JOIN product p ON od.product_id = p.product_id
            LEFT JOIN voucher v ON o.voucher_id = v.voucher_id
            GROUP BY o.order_id, od.product_id, od.order_detail_id, u.username, u.phone, u.address, p.name_pro, p.quantity, p.price, v.voucher_id, v.discount";

    $stmt = pdo_query($sql);  // Truyền tham số vào câu lệnh SQL
    return $stmt;
}
function total_month() {
    $sql = "SELECT 
        MONTH(o.order_date) AS order_month,
        YEAR(o.order_date) AS order_year,
        SUM(
            (od.quantity * p.price) * (1 - COALESCE(v.discount, 0) / 100) 
        ) AS total_revenue
    FROM 
        orders o
    JOIN 
        users u ON o.user_id = u.user_id
    JOIN 
        order_detail od ON o.order_id = od.order_id
    JOIN 
        product p ON od.product_id = p.product_id
    LEFT JOIN 
        voucher v ON o.voucher_id = v.voucher_id
    WHERE 
        YEAR(o.order_date) = YEAR(CURDATE()) -- Lọc năm hiện tại
        AND MONTH(o.order_date) = MONTH(CURDATE()) -- Lọc tháng hiện tại
    GROUP BY 
        YEAR(o.order_date), MONTH(o.order_date)
    ORDER BY 
        order_year, order_month";

    $stmt = pdo_query($sql);  // Truyền tham số vào câu lệnh SQL
    return $stmt;
}

function fetchRevenuePerMonth()
{
    $sql = "SELECT 
    MONTH(o.order_date) AS order_month,
    YEAR(o.order_date) AS order_year,
    SUM(
        (od.quantity * p.price) * (1 - COALESCE(v.discount, 0) / 100) 
    ) AS total_revenue
FROM 
    orders o
JOIN 
    users u ON o.user_id = u.user_id
JOIN 
    order_detail od ON o.order_id = od.order_id
JOIN 
    product p ON od.product_id = p.product_id
LEFT JOIN 
    voucher v ON o.voucher_id = v.voucher_id
WHERE 
    YEAR(o.order_date) = YEAR(CURDATE())  -- Lọc năm hiện tại
GROUP BY 
    YEAR(o.order_date), MONTH(o.order_date)
ORDER BY 
    order_year, order_month;
";

    $stmt = pdo_query($sql);  // Truyền tham số vào câu lệnh SQL
    return $stmt;
}
function total_low_stock() {
    $threshold = 5; // Define the threshold for low stock products

    $sql = "SELECT p.product_id, p.name_pro, p.quantity
            FROM product p
            WHERE p.quantity < :threshold";  // Filter products with stock below threshold

    // Prepare and execute the query
    $stmt = pdo_query($sql, [':threshold' => $threshold]);

    return $stmt;
}
function get_recent_orders()
{
    $sql = "
        SELECT 
            o.order_id, 
            od.product_id, 
            p.name_pro, 
            od.quantity, 
            p.price, 
            o.order_date, 
            u.username,
            o.order_status  -- Thêm cột order_status
        FROM orders o
        JOIN order_detail od ON o.order_id = od.order_id
        JOIN product p ON od.product_id = p.product_id
        JOIN users u ON o.user_id = u.user_id
        ORDER BY o.order_date DESC
        LIMIT 10;  -- Lấy 10 đơn hàng gần đây nhất
    ";
    return pdo_query($sql);  // Thực thi truy vấn
}


?>