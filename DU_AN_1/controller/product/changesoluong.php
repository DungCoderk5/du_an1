<?php
session_start();
if (isset($_POST['soluong']) && isset($_POST['key'])) {
    $soluong = $_POST['soluong'];
    $key = $_POST['key'];
    if (isset($_SESSION['giohang'][$key])) {
        $_SESSION['giohang'][$key]['soluong'] = $soluong;
        $item = $_SESSION['giohang'][$key];
        $saleoff = isset($item['saleoff']) ? $item['saleoff'] : 0;
        $total_price = $saleoff * $soluong;
     
        echo json_encode([
            'total_price' => $total_price
        ]);
    }
}
?>