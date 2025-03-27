<?php
require_once '../model/home_admin.php';

if (isset($_GET['action']) && ($_GET['action'] != "")) {
    switch ($_GET['action']) {
        default:
            // Get data for the dashboard
            $dashboard_data = home_tong();
            $recent_users = get_recent_users();
            $low_stock_products = total_low_stock();  // Get low stock products
            $recent_orders = get_recent_orders();  // Lấy đơn hàng gần đây
      

            require_once 'views/blocks/layout.php';
            break;
    }
} else {
    // Get data for the dashboard
    $dashboard_data = home_tong();
    $recent_users = get_recent_users();
    $low_stock_products = total_low_stock();  // Get low stock products
    $recent_orders = get_recent_orders();  // Lấy đơn hàng gần đây
 
    require_once 'views/blocks/layout.php';
}
?>